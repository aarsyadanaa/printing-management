@extends('admin.layout')
@section('content')
<div class="container">
<div class="jumbotron">
<h1 class="display-6">Buat User Baru</h1>
<hr class="my-4">     
<form action="/admin/user/create/post" method="POST" enctype="multipart/form-data">
@csrf
<br>
<div class="form-group">
<label for="name">Nama</label>
<input type="text" class="form-control" name="name" 
                    placeholder="Masukan Nama Disini">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" class="form-control" name="email" 
                    placeholder="Masukan Email Aktif">
</div>
<div class="form-group">
<label for="pw">Password</label>
<input type="text" class="form-control" name="password" 
                    placeholder="Password Disini">
</div>
<select class="form-control" name="roleId" onChange="document.getElementById('form_id').submit();">
                    <option value="1">Admin</option>
                    <option value="2">Pengguna</option>
                </select>
				<br><br>
<button type="submit" class="btn btn-primary">Simpan</button>
<br><br><br><br><br><br>
</form>
</div>
@endsection