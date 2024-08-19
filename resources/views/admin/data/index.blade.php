@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="jumbotron">
            @if(session('msg'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <br><br><br>
            <h1 class="display-6">Data Smartprint</h1>
            <hr class="my-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">File</th>
                        <th scope="col">Status</th>
                        <th scope="col">Page || Mode</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $num => $data)
                        <tr>
                            <td style="text-transform: capitalize;">{{ $num + 1 }}</td>
                            <td style="text-transform: capitalize;">{{ $data->user ? $data->user->name : 'Guest' }}</td> 
                            <td style="text-transform: capitalize;">{{ $data->user ? $data->user->email : 'Null' }}</td>
                            <td style="text-transform: capitalize;">{{ preg_replace('/^(.*?)_/', '', pathinfo($data->file, PATHINFO_FILENAME)) }}</td>
                            @if($data->paymentStatus === 'Unpaid')
                                <td style="text-transform: capitalize;"><button type="button" class="badgehps badge btn-danger mb-1" disabled>Unpaid</button>  
                            @else
                                <td style="text-transform: capitalize;"><button type="button" class="badgehps badge btn-success mb-1" disabled>Paid</button>
                            @endif
                            <td style="text-transform: capitalize;">{{ $data->page }} || {{ $data->mode }}</td>
                            <td style="text-transform: capitalize;">Rp.{{ $data->amount }}</td>
                            <td style="text-transform: capitalize;">
                            <button type="button" class="badge btn-danger mb-1 preview-btn" data-toggle="modal" data-target="#exampleModal{{$num + 1}}">Lihat</button>
                            </td>
                            <td>
                            <a href="{{ url('admin/data/'.$data->id) }}" ><button type="submit" class="badge btn-primary mb-1">Edit</button></a>  
                                <form method="post" action="{{ url('admin/data/'.$data->id) }}"> 
                                    @csrf 
                                    {{ method_field('delete') }} 
                                    <button type="submit" class="badgehps badge btn-warning mb-1 " >Hapus</button> </form>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for each iteration -->
                        <div class="modal fade" id="exampleModal{{$num + 1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <br><br><br><br>
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ preg_replace('/^(.*?)_/', '', pathinfo($data->file, PATHINFO_FILENAME)) }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('/uploads/' . $data->file) }}" style="width:100%; height:500px;" frameborder="0">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.preview-btn').click(function(){
                    var targetModal = $(this).data('target');
                    $(targetModal).modal('show');
                });

                $('.badgehps').click(function(e){
                    var result = confirm("Yakin Hapus?");
                    if (result) {

                    } else {
                        e.preventDefault();
                    }
                });
            });
        </script>
    </div>
@endsection
