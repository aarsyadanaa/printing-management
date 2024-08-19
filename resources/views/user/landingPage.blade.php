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

    <!-- CSS -->
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
              <li><a href="#home">Home</a></li>
              <li><a href="#services">Layanan</a></li>
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

      <div class="hero">
        <div class="container">
          <div class="box-hero">
            <div class="box"  >
              
              <h1>
                Inovasi Baru : <br />
                Print Bisa Menggunakan Online Payment Anti Ribet!!
              </h1>
            
              <p>Sistem Percetakan dengan Integrasi Payment Gateway, Tinggal Upload Dokumen!!</p>
              <button><a href="/user/uploadDocs" style=" text-decoration: none; color: white;">Klik Disini !!</a></button>
              <!-- <button><a href="/uploadDoc" style=" text-decoration: none; color: white;">Coba Sekarang</a></button> -->
            </div>
            <div class="box">
              <img src="../img/layanan.jpg" style="width: 80%; height: 70%; " alt="" />
            </div>
          </div>
        </div>
      </div>
    </header>

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
