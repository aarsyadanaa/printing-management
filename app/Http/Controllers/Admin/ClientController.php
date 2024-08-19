<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use auth;

use App\Models\Client;


class ClientController extends Controller


{

public function create()


{


     $client = client::all();


     return view('client.profil.create', compact('client'));


}

public function store(Request $request)


{
     $this->validate($request, [


          'nama_client' => 'required',
          
          
          'alamat'  => 'required',

          'domisili'  => 'required',
          'no_telp'  => 'required',
          
          ]);
          
          $client = new Client;

          $user = auth()->id();
          
          $client->id_users = $user;
          
          $client->nama_client = $request->nama_client;
          
          $client->alamat = $request->alamat;

          $client->domisili = $request->domisili;

          $client->no_telp = $request->no_telp;
          
          $client->save();
          
          
          return redirect('profil')->with('msg','Data Berhasil di Simpan');

}

public function show()
{
$user = Auth()->id();
$pengguna = Client::All();
return view('client.profil.profil', compact('pengguna'));
}

public function update(Request $request,$id){

          $client = Client::where('id',$id)->first();
          
          $client->nama_client = $request->nama_client;
          
          $client->alamat = $request->alamat;

          $client->domisili = $request->domisili;

          $client->no_telp = $request->no_telp;
          
          $client->save();
          return redirect('profil')->with('msg','Data Berhasil di Simpan');
}

public function destroy($id)
     {
          $client = Client::find($id);
          $client->delete();
          return redirect('client.profil.profil')->with('msg','Data Berhasil di Hapus');
     }

public function edit($id)
{
     $client = Client::where('id',$id)->first();
     return view('client.profil.edit',compact('client'));
}
 }
