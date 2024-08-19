<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/landingPage.css" />
    <title>Manxi Group</title>
  </head>
  <body>
    <header>

<!--navbar-->

      <div class="navbar">
        <div class="container">
          <div class="box-navbar">
            <div class="logo">
              <image class="gambar_logo" src="../img/logoManxi.jpeg">
                <h1>Manxi Group</h1>
            </div>
            <ul class="menu">
              <li><a href="/user/home">Home</a></li>
              <li><a href="/user/home#layanan">Layanan</a></li>
              <li class="active"><a href="/user/history">History</a></li>
              <li class="active"><a href="/user/uploadDocs">Smartprint</a></li>
              <form action="/logout" method="post" id="lO">
                          @csrf
                          <li class="active"><a href="#" onclick="sbmtFunc()">Logout</a></li>
                      </form>
            </ul>
            <i class="fa-solid fa-bars menu-bar"></i>
          </div>
        </div>
      </div>
    <!-- Services -->
    <br><br><br><br><br>
    <div class="container">
        <div style="background:transparent !important" class="jumbotron">
        <h1 class="display-6">History</h1>
        <hr class="my-4">        
        <table class="table">
        <thead class="thead-dark">
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama File</th>
        <th scope="col">Status</th>
        <th scope="col">Total Harga </th>
        <th scope="col">Preview </th>
        <th></th>
        </tr>
        </thead>
        <tbody>
            @php
            $num = 1;
            @endphp
        @foreach ($data as $data)
        <tr>
        <td style="text-transform: capitalize; ">{{ $num++ }}</td>
        <td style="text-transform: capitalize; ">{{ preg_replace('/^(.*?)_/', '', pathinfo($data->file, PATHINFO_FILENAME)) }}</td>
        <td style="text-transform: capitalize; ">{{ $data->paymentStatus }}</td>
        <td style="text-transform: capitalize; ">Rp.{{ $data->amount }}</td>
        <td style="text-transform: capitalize; "><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$num}}">
        Lihat
        </button></td>
        <div class="modal fade" id="exampleModal{{$num}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <br><br><br><br><br><br><br><br><br><br>
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
      <!-- <iframe style="width: 100%; height: 100%;  " src="{{ url('/uploads/' . $data->file) }}" id="pdfFrame"></iframe> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>

</div>
    <!-- Footer -->
    <div class="footer">
      <div class="container">
        <div class="box-footer">
          <div class="box">
            <h2>Manxi Group</h2>
            <p>Merupakan sebuah Perusahaan yang Bergerak di bidang Digital Printing. Dibuat sebaik mungkin dengan mengutamakan kepuasan pelanggan.</p>
          </div>
          <div class="box">
            <h3>Menu</h3>
            <a href="#home">Home</a>
            <a href="#services">Layanan</a>
            <a href="#pantai">Order</a>
            <a href="#daftar">Daftar</a>
          </div>
          <div class="box">
            <p>&copy; Copyright by <span>TA UNS 2023</span> UNS, Indonesia</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <script>function sbmtFunc(){
      document.getElementById("lO").submit(); 
    }
    </script>
    <script src="../script/landingPage.js"></script>
  </body>
</html>
