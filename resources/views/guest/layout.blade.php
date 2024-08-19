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
    <link rel="stylesheet" href="css/landingPage.css"/>
    <title>Manxi Group</title>
  </head>
  <body>
    <header>

<!--navbar-->
<br>
<div class="navbar">
        <div class="container">
          <div class="box-navbar">
            <div class="logo">
              <image class="gambar_logo" src="img/logoManxi.jpeg">
                <h1>Manxi Group</h1>
            </div>
            <ul class="menu">
              <li><a href="#home">Home</a></li>
              <li><a href="#services">Layanan</a></li>
              <li class="active"><a href="#pantai">Order</a></li>
              <li class="active"><a href="/login">Login</a></li>
              <li class="active"><a href="/register">Daftar</a></li>
            </ul>
            <i class="fa-solid fa-bars menu-bar"></i>
          </div>
        </div>
      </div>


<!-- Bootstrap CSS -->


<link rel="stylesheet" 


  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<script 


 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">


</script>


<script 


 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">


</script>

<br>
<title>@yield('title')</title>



@yield('content')


<!-- Optional JavaScript -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->


</body>


</html>