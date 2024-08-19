<?php
namespace App\Http\Controllers\Admin;
Use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function index(){
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function create()
     {
          $user = User::all();
          return view('admin.user.create', compact('user'));
     }

     public function store(Request $request)
     {
          $validatedData = $request->validate([
               'name' => 'required|max:255',
               'email' => 'required|unique:users',
               'password' => 'required',
               'roleId' => 'required',
           ]);
    
           $validatedData['password'] = Hash::make($validatedData['password']);
           User::create($validatedData);
           return redirect('/admin/user')->with('success', 'Data anda telah tersimpan!');
     }
    public function destroy($id)
     {
          $client = User::find($id);
          $client->delete();
          return redirect('admin/user')->with('msg','Data Berhasil di Hapus');
     }

     public function edit($id)
     {
          $user = User::where('id',$id)->first();
          return view('admin.user.edit',compact('user'));
     }

     public function update(Request $request,$id){
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roleId = $request->roleId;
        $user->save();
        return redirect('admin/user')->with('msg','Data Berhasil di Simpan');
     }
     
}