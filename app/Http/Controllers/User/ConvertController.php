<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use PDF;

class ConvertController extends Controller
{
    public function convertDocToPDF(){
         $domPdfPath = base_path('vendor/dompdf/dompdf');
         \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
         \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF'); 
         $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('your path')); 
         $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
         $PDFWriter->save(public_path('doc-pdf.pdf')); 
         echo 'File has been successfully converted';
    }
}