<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use App\Mail\EmailWithAttachment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function totalPage(Request $request)
    {
        $totalPagesArray = $request->input('totalPages');
        $fileNamesArray = $request->input('fileNames');
        
        //dd($fileNamesArray);
        // Identifikasi idOrder yang ingin Anda update
        $idOrder = session('uniqueValue'); // Gantilah ini sesuai dengan cara Anda mengidentifikasi idOrder
        foreach ($totalPagesArray as $index => $totalPages) {
            $fileName = $fileNamesArray[$index];
            // Cari file berdasarkan idOrder dan nama file
            $document = Document::where('idOrder', $idOrder)->where('file', $fileName)->first();
        
            if ($document) {
                // Jika file ditemukan, update totalPages
                $document->update(['amount' => $totalPages*10]);
            }
            $data = Document::where('file', $fileName)->update(['page' => $totalPages, 'amount' => $totalPages*10]);
    }
    return redirect('/user/payment');
}
    public function payment() {
        $idOrder = session('uniqueValue');
        $idOrderNew = session('uniqueValue') . '_' . time() . '_' . Str::random(5);
        $totalAmount= Document::where('idOrder', $idOrder)->sum('amount');
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('midtrans.is_Sanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
            $params = array(
                'transaction_details' => array(
                    'order_id' => $idOrderNew,
                    'gross_amount' =>$totalAmount,
                    'status' =>'Unpaid',
                ),
                'customer_details' => array(),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $payment = DB::table('documents')->where('idOrder', $idOrder)
            ->select('documents.idOrder','documents.file', 'documents.amount')->get();
                return view('user.payment', compact('payment', 'idOrder', 'snapToken', 'totalAmount'));
    }
    public function callBack(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            // Mengambil bagian pertama dari $request->order_id
            $underscore_position = strpos($request->order_id, '_');
            $idOrder = substr($request->order_id, 0, $underscore_position);
            $paymentStatus = $request->transaction_status;
            if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture' ) {
                // Update paymentStatus to 'Paid' for the corresponding idOrder
                Document::where('idOrder', $idOrder)->update(['paymentStatus' => 'Paid']);
                //return redirect('/email');
            }
        }
    }
        
}
