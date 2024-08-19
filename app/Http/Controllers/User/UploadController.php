<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ilovepdf\Ilovepdf;
use FPDF;
use Exception;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailWithAttachments;
use Illuminate\Support\Facades\Mail;
use Spatie\PdfToImage\Pdf;
use Spatie\Image\Image;
use ZipArchive;

class UploadController extends Controller
{
    public function index(){
        return view('user.upload');
    }
    private $setPage, $setMode, $setCopy, $setFileName ;
    public function store(Request $request)
    {
        $files = $request->file('files');
        //dd($request->all());
        //dd($request->all());
        $request->validate([
            'files.*' => 'required|mimes:pdf,doc,docx,xlsx,ppt,pptx,odt,odp,ods,img,jpeg,gif,jpg,png|max:120048',
        ]);
        $uniqueValue = Str::random(10);
        $request->session()->put('uniqueValue', $uniqueValue);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalFileName = $file->getClientOriginalName();
                //dd($originalFileName);
                $document = new Document;
                if ($file) {
                    $extension = $file->getClientOriginalExtension();
                    if ($extension == "pdf") {
                        $fileName = $uniqueValue . '_' . $originalFileName . '.' . $extension;
                        $file->move('uploads/', $fileName);
                        $document->idUser = Auth()->user()->id;
                        $document->file = $fileName;
                        $document->idOrder = $uniqueValue;
                        $document->paymentStatus = "Unpaid"; 
                        $document->save();
                    } else {
                        $fileName = $uniqueValue . '_' . $originalFileName . '.' . $extension;
                        $fixFileName = $uniqueValue . '_' . $originalFileName . '.' . 'pdf';
                        $file->move('uploads/', $fileName);
                        $publicKey = config('services.ilovepdf.public_key');
                        $secretKey = config('services.ilovepdf.secret_key');
                        $ilovepdf = new Ilovepdf($publicKey, $secretKey);
                        $myTask = $ilovepdf->newTask('officepdf');
                        $file1 = $myTask->addFile('uploads/' . $fileName);
                        $myTask->execute();
                        $resultFile = $myTask->download('uploads/', $originalFileName);
                        $document->idUser = Auth()->user()->id;
                        $document->file = $fixFileName;
                        $document->idOrder = $uniqueValue;
                        $document->paymentStatus = "Unpaid";
                        $document->save();
                        File::delete(public_path('uploads/' . $fileName));
                    }
                }
            }
            return redirect('/user/documents')->with('success', 'Dokumen berhasil diunggah.');
        } else {
            return redirect('/user/documents')->with('error', 'Tidak ada dokumen yang diunggah.');
        }
    }

    private function countPdfPages($path)
    {
        $pdf = File::get($path);
        $number = preg_match_all("/\/Page\W/", $pdf, $dummy);
        return $number;
        $idOrder = session('uniqueValue');
        $document = Document::where('idOrder',$idOrder)->first();
        $document->amount = $number*500;
        $document->save();
    }

    public function printSetting(Request $request){
        $this->setPage = null;
        $this->setCopy = null;
        $this->setFileName = null;
        $this->setMode = null;
        $this->setPage=$request->setPage;
        $this->setCopy=$request->copyCount;
        $this->setMode=$request->colorMode;
        //dd($this->setMode);
        $this->setFileName=$request->fileName;
       
        $idOrder = session('uniqueValue');
        $docs = DB::table('documents')
        ->where('documents.idOrder', $idOrder)
        ->select('documents.file')
        ->get();
        $fileData = [];

        foreach ($docs as $doc) {
        $fileName = $doc->file;
        $fileNames[] = $fileName; 
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $totalPages = null;

    // Periksa apakah file perlu diolah berdasarkan kondisi tertentu
        if ($this->setFileName !== null && $this->setPage !== null) {
            $pdfPath = public_path('uploads/' . $this->setFileName);
            $pdf = new Fpdi();
            $pageCount = $pdf->setSourceFile($pdfPath);
            $existCounter = 0;
            $inputPages = $this->setPage; 
            $pages = [];
            $pageRanges = explode(',', $inputPages);
            foreach ($pageRanges as $pageRange) {
                if (strpos($pageRange, '-') !== false) {
                    list($start, $end) = explode('-', $pageRange);
                    for ($i = (int)$start; $i <= (int)$end; $i++) {
                        $pages[] = $i;
                    }
                } else {
                    $pages[] = (int)$pageRange;
                }
            }
            try {
            foreach ($pages as $pageNumber) {
                $tpl = $pdf->importPage($pageNumber);
                $pdf->getTemplateSize($tpl);
                $pdf->addPage();
                $pdf->useTemplate($tpl, ['adjustPageSize' => true]);
                $existCounter++;
            }
            } catch (Exception $e) {
                return redirect('/user/documents');
            }
            $pdf->Output($pdfPath, "F");
            //$fileNameWithoutExtension = str_replace(' ', '_', $fileNameWithoutExtension);
            $filePath = secure_url('uploads/' . $fileNameWithoutExtension . '.pdf');
            $countFilePath = public_path('uploads/' . $fileNameWithoutExtension . '.pdf');
            $totalPages = $this->countPdfPages($countFilePath);
            //dd($this->setFileName);
            $filePathFix = public_path('uploads/' . $this->setFileName);
            $totalPagesFix = $this->countPdfPages($filePathFix);
            Document::where('file', $this->setFileName)->update(['page' => $totalPagesFix, 'mode' => 'color']);
        } 
        if($this->setFileName !== null && $this->setCopy !== null){
            $pdfPath = public_path('uploads/' . $this->setFileName);
            $copyCount = (int)$this->setCopy; 
            $copyCount = max(1, $copyCount);
            $pdf = new Fpdi();
            $pageCount = $pdf->setSourceFile($pdfPath);
            for ($copy = 0; $copy < $copyCount; $copy++) {
                for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                    $templateId = $pdf->importPage($pageNo);
                    $pdf->addPage();
                    $pdf->useTemplate($templateId);
                }
            }
            $pdf->Output($pdfPath, "F");
            $filePath = secure_url('uploads/' . $fileNameWithoutExtension . '.pdf');
            $countFilePath = public_path('uploads/' . $fileNameWithoutExtension . '.pdf');
            $totalPages = $this->countPdfPages($countFilePath);
                $filePathFix = public_path('uploads/' . $this->setFileName);
                $totalPagesFix = $this->countPdfPages($filePathFix);
                Document::where('file', $this->setFileName)->update(['page' => $totalPagesFix, 'mode' => $this->setMode]);
        }
        if($this->setFileName !== null && $this->setMode !== "color"){
            $pdfPath = public_path('uploads/' . $this->setFileName);
            $publicKey = config('services.ilovepdf.public_key');
            $secretKey = config('services.ilovepdf.secret_key');
            $ilovepdf = new Ilovepdf($publicKey, $secretKey);
            $myTask = $ilovepdf->newTask('pdfjpg');
            $file1 = $myTask->addFile('uploads/' . $this->setFileName);
            $myTask->execute();
            $zipPath = $myTask->download('uploads/convert/', $this->setFileName);
            $zip = new ZipArchive();
            $outputDirectory = public_path('uploads/convert/');
            $zipFilePath = public_path('uploads/convert/output.zip');
            if (file_exists($zipFilePath)) {
                $zip->open('uploads/convert/output.zip');
                $zip->extractTo('uploads/convert/');
                $zip->close();
                File::delete(public_path('uploads/convert/output.zip'));
            }
            else{

            }
            
            //
            $folderPath = public_path('uploads/convert/');
            $files = scandir($folderPath);
            foreach ($files as $file) {
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                    $imagePath = $folderPath . $file;
                    $image = imagecreatefromjpeg($imagePath);
                    if ($image) {
                        imagefilter($image, IMG_FILTER_GRAYSCALE);
                        $outputImagePath = public_path('uploads/res/' . $file);
                        imagejpeg($image, $outputImagePath);
                        imagedestroy($image);
                        $fromPath = public_path('uploads/res/');
                        $files = scandir($fromPath);
                        $pdf = new FPDI();
                        foreach ($files as $file) {
                            if (in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                                $pdf->AddPage();
                                $pdf->Image($fromPath . $file, 0, 0, 210, 297); 
                            }
                        }
                        $pdf->Output($pdfPath, "F");
                    } else {
    
                    }
                }
            }
            $file = new Filesystem;
            $file->cleanDirectory(public_path('uploads/res'));
            $file->cleanDirectory(public_path('uploads/convert'));
            $filePath = secure_url('uploads/' . $fileNameWithoutExtension . '.pdf');
            $countFilePath = public_path('uploads/' . $fileNameWithoutExtension . '.pdf');
            $totalPages = $this->countPdfPages($countFilePath);
                $filePathFix = public_path('uploads/' . $this->setFileName);
                $totalPagesFix = $this->countPdfPages($filePathFix);
                Document::where('file', $this->setFileName)->update(['page' => $totalPagesFix, 'mode' => 'bw']);
            return redirect('/user/documents');
        }
        else {
            $filePath = secure_url('uploads/' . $fileNameWithoutExtension . '.pdf');
            // $filePath = asset('uploads/' . $fileNameWithoutExtension . '.pdf');
            $countFilePath = public_path('uploads/' . $fileNameWithoutExtension . '.pdf');
            $totalPages = $this->countPdfPages($countFilePath);
        }
        //
    $totalPages = $this->countPdfPages($countFilePath);
    $fileData[] = [
        'fileName' => $fileName,
        'fileNameWithoutExtension' => $fileNameWithoutExtension,
        'fileExtension' => $fileExtension,
        'filePath' => $filePath,
        'totalPages' => $totalPages,
    ];
        }
    return view('user.documents', compact('docs', 'totalPages', 'fileData'));
    }

    public function email()
    {
        $idOrder = session('uniqueValue');
        $files = DB::table('documents')
        ->where('documents.idOrder', $idOrder)
        ->where('documents.paymentStatus', 'Paid')
        ->select('documents.file')
        ->get();
    $data = [];

    foreach ($files as $fileData) {
        $fileName = $fileData->file;
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($fileExtension === "pdf") {
            $pdfFileName = $fileNameWithoutExtension . '.pdf';
            $pubPath = public_path('uploads/' . $pdfFileName);
        } else {
            $convFileName = $fileNameWithoutExtension . '.pdf';
            $pubPath = public_path('uploads/convert/' . $convFileName);
        }

        $data[] = [
            'fileName' => $fileName,
            'fileNameWithoutExtension' => $fileNameWithoutExtension,
            'fileExtension' => $fileExtension,
            'filePath' => $pubPath,
        ];
    }
    $path = [];
    $name = [];
    foreach($data as $item){
        $path[] = public_path('uploads/' . $item['fileName']);
        $name[] = $item['fileName'];
    }
    //dd($name);
    $emailTujuan = "fill with your email";
    Mail::to($emailTujuan)->send(new EmailWithAttachments($path, $name));
    return redirect('/user/payment/success');
    }
}