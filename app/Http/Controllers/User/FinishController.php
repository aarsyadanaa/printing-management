<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use App\Models\User;
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
        $user = User::where('id', Auth()->user()->id)->select('users.name', 'users.email')->get();
        return view('user.success', compact('data', 'idOrder', 'time', 'user')); 
    }
    public function pending(){
        return view('user.pending');
    }
    public function failed(){
        return view('user.failed');
    }
    public function history(){
        $data = Document::where('idUser', Auth()->user()->id)->select('documents.file', 'documents.paymentStatus', 'documents.amount', 'documents.updated_at')->get();
        return view('user.history', compact('data'));
    }
}