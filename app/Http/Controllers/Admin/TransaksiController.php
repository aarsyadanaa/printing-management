<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

class TransaksiController extends Controller
{
    public function index(){
        $document = Document::with('user')->orderBy('created_at', 'asc')->get();
        return view('admin.transaksi.index', compact('document'));
    }
    public function destroy($id)
     {
          $trans = Document::find($id);
          $fileName = Document::where('id', $id)->value('file'); // Mengambil nilai langsung
            if ($fileName) {
                $filePath = public_path('uploads/' . $fileName); // Membuat path lengkap
            if (File::exists($filePath)) {
                File::delete($filePath);
                }
            }
          $trans->delete();
          return redirect('admin/transaksi')->with('msg','Data Berhasil di Hapus');
     }
}
