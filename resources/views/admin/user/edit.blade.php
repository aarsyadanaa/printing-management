@extends('admin.layout')
@section('content')
<div class="container">
<div class="jumbotron">
<br>
<br><br><br>
<h1 class="display-6">Edit User</h1>
<hr class="my-4">     
                <form role="form" method="post" action="{{ url('admin/user/'.$user->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" placeholder="Name of User" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" placeholder="Email User" name="email" value="{{$user->email}}">
                    </div>
                  </div>
                  <div class="form-floating">
                <label for="status">Role : </label>
                <!-- gunakan event onchange untuk mengirim data secara otomatis  -->
                <br>
                <br>
                <select class="form-control" name="roleId" onChange="document.getElementById('form_id').submit();">
                    @if($user->roleId === 1){
                      <option value="" disabled selected>Admin</option>
                    }
                    @else{
                      <option value="" disabled selected>Client</option>
                    }
                    @endif
                    <option <?php if(!empty($cari)){ echo $user->roleId == '1' ? 'selected':''; } ?> value="1" >Admin</option>
                    <option <?php if(!empty($cari)){ echo $user->roleId == '2' ? 'selected':''; } ?> value="2">Pengguna</option>
                </select>
                </div>
                <br><br><br>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
@endsection