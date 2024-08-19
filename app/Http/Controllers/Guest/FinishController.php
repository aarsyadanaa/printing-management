<?php
namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ilovepdf\Ilovepdf;
use Illuminate\Support\Facades\Session;

class FinishController extends Controller
{
    public function success()
    {
        $idOrder = session('uniqueValue');
        $data = DB::table('documents')
        ->where('documents.idOrder', $idOrder)
        ->where('documents.paymentStatus', 'Paid')
        ->select('documents.file', 'documents.amount', 'documents.updated_at')
        ->get();
        $time = now()->timezone('Asia/Jakarta');
        return view('guest.success', compact('data', 'idOrder', 'time'));
        
    }
    public function pending(){
        return view('guest.pending');
    }
    public function failed(){
        return view('guest.failed');
    }
}