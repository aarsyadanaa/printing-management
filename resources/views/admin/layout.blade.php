<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/adminMain.css') }}"/>

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- Icon -->
    <link rel="icon" href="{{ asset('../img/logoManxi.jpeg') }}" />

    <title>Admin - ManxiPrint</title>
  </head>
  <body>
    <!-- Navbar Section Open -->
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
      <div class="container">
        <a class="navbar-brand">
          <img src="{{ asset('../img/logoManxi.jpeg') }}" alt="brand" class="me-3" 
          style="max-width:20%;"/>
          <span class="text-dark">ManxiPrint</span>
        </a>
        <button
          class="navbar-toggler shadow-none"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/admin/index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/user">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/transaksi">Transaksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/data">Data</a>
            </li>
          </ul>
          <!-- <a href="/profil" class="btn btn-primary">Profil</a> -->
            <form action="/logout" method="post">
            @csrf
            <a><button type="submit" class="btn btn-primary">Logout</button>
            </form></a>
        </div>
      </div>
    </nav>
    <!-- Navbar Section Close -->
   <br><br><br><br><br><br>
    @yield('content')
    <!-- Footer Section Open -->
    <footer class="footer-section" id="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-5">
            <div class="row">
              <div class="col-md-12 col-lg-10">
                <a href="#" class="footer-brand">
                  <img src="{{ asset('../img/logoManxi.jpeg') }}" class="me-3"  alt="brand" style="width:60px;height:80px;"/> 
                  <span class="text-dark">Manxi Group</span>
                  <p class="text-secondary mt-3" style="text-align: justify">
                    Merupakan perusahaan yang bergerak di bidang printer serta desain
                  </p>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-3">
                <div class="footer-content">
                  <span>Services</span>
                  <ul class="footer-link mt-3 list-unstyled">
                    <li><a href="#" class="py-1 d-block">Print</a></li>
                    <li><a href="#" class="py-1 d-block">Sewa</a></li>
                    <li><a href="#" class="py-1 d-block">Service</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="footer-content">
                  <span>Info</span>
                  <ul class="footer-link mt-3 list-unstyled">
                    <li><a href="#" class="py-1 d-block">Promo date</a></li>
                    <li><a href="#" class="py-1 d-block">Event</a></li>
                    <li><a href="#" class="py-1 d-block">Careers</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-5">
                <div class="footer-content">
                  <span>Contact</span>
                  <ul class="footer-link mt-3 list-unstyled">
                    <li>
                      <a href="#" class="py-1 d-block"
                        >Surakarta - Indonesia</a
                      >
                    </li>
                    <li>
                      <a href="#" class="py-1 d-block">Telp : (0271) 728370</a>
                    </li>
                    <li>
                      <a href="#" class="py-1 d-block">email : info@manxiperkasa.com</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <p class="copyright text-secondary text-center">
            Copyright &copy; 2023 All rights reserved | By
            <a href="https://ilmaelfiraa.github.io/" class="text-primary"
              >Nofa Arsyadana</a
            >
          </p>
        </div>
      </div>
    </footer>
    <!-- Footer Section Close -->

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- Add Drop Shadow on Scroll -->
    <script>
      window.addEventListener("scroll", (e) => {
        const nav = document.querySelector(".navbar");
        if (window.pageYOffset > 0) {
          nav.classList.add("drop-shadow");
        } else {
          nav.classList.remove("drop-shadow");
        }
      });
    </script>

    <!-- AOS Animate on Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>
  </body>
</html>
