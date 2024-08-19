@extends('admin.layout')
@section('content')
<div class="container">
<div class="jumbotron">
@if(session('msg'))
<div class="alert alert-success alert-dismissible fade show mt-2" 
            role="alert">
{{session('msg')}}
<button type="button" class="close" data-dismiss="alert" 
                aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<br><br><br>
<h1 class="display-6">Data User</h1>
<hr class="my-4">     
<a href="/admin/user/create" class="btn btn-primary mb-1">Tambah User</a>
<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">No</th>
<th scope="col">Nama</th>
<th scope="col">EMail</th>
<th scope="col">Role</th>
<th scope="col">SignUp</th>
<th scope="col">Action</th>
<th></th>
</tr>
</thead>
<tbody>
    <?php
    $num = 1;
    ?>
@foreach ($user as $user)
<tr>
<td style="text-transform: capitalize; ">{{ $num++ }}</td>
<td style="text-transform: capitalize; ">{{ $user->name }}</td>
<td style="text-transform: capitalize; ">{{ $user->email }}</td>
@if($user->roleId === '2')
    <td style="text-transform: capitalize; ">Client</td>  
@else
    <td style="text-transform: capitalize; ">Admin</td> 
@endif
<td style="text-transform: capitalize; ">{{ $user->created_at }}</td>
<td>
<a href="{{ url('admin/user/'.$user->id) }}" ><button type="submit" class="badge btn-primary mb-1">Edit</button></a>  
<form method="post" action="{{ url('admin/user/'.$user->id) }}"> 
    @csrf 
    {{ method_field('delete') }} 
    <button type="submit" class="badgehps badge btn-warning mb-1 " >Hapus</button> </form>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.badgehps').click(function(e){
              var result = confirm("Yakin Hapus?");
              if (result) {
                      
              }else{
                    e.preventDefault();
              }
        })
    })
</script>
</div>
@endsection