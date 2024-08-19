@extends('admin.layout')
@section('content')
<div class="container">
<div class="jumbotron">
<br>
<br><br><br>
<h1 class="display-6">Edit Data Smartprint</h1>
<hr class="my-4">     
                <form role="form" method="post" action="{{ url('admin/data/'.$data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" placeholder="Name of User" name="name" value="{{$data->user? $data->user->name : 'Null'}}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" placeholder="Email User" name="email" value="{{$data->user? $data->user->email : 'Null'}}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">File</label>
                      <input type="text" class="form-control" name="file" value="{{$data->file}} disable">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Payment Status</label>
                      <select class="form-control" name="paymentStatus" onChange="document.getElementById('form_id').submit();">
                          <option value="" disabled selected>{{$data->paymentStatus}}</option>
                          <option value="Paid" >Paid</option>
                          <option value="Unpaid">Unpaid</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Page</label>
                      <input type="number" class="form-control" name="page" value="{{$data->page}}">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mode</label>
                      <select class="form-control" name="mode" onChange="document.getElementById('form_id').submit();">
                          <option value="" disabled selected>{{$data->mode}}</option>
                          <option value="color" >Color</option>
                          <option value="bw">Black White</option>
                      </select>
                    </div>
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