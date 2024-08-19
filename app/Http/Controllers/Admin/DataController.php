<?php
namespace App\Http\Controllers\Admin;
Use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller{
    public function index(){
        $datas = Document::all();
        return view('admin.data.index', compact('datas'));
    }
    public function destroy($id)
     {
          $data = Document::find($id);
          $data->delete();
          return redirect('admin/data')->with('msg','Data Berhasil di Hapus');
     }

     public function edit($id)
     {
          $data = Document::where('id',$id)->first();
          return view('admin.data.edit',compact('data'));
     }

     public function update(Request $request,$id){
        $data = Document::where('id',$id)->first();
        $data->file = $request->file;
        $data->paymentStatus = $request->paymentStatus;
        $data->amount = $request->amount;
        $data->page = $request->page;
        $data->mode = $request->mode;
        $data->save();
        return redirect('admin/data')->with('msg','Data Berhasil di Simpan');
     }
     
}