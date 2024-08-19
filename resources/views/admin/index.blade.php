<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/adminMain.css" />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <!-- Icon -->
    <link rel="icon" href="../img/logoManxi.jpeg" />

    <title>Admin - ManxiPrint</title>
  </head>
  <body>
    <!-- Navbar Section Open -->
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
      <div class="container">
        <a class="navbar-brand" href="/user">
          <img src="../img/logoManxi.jpeg" alt="brand" class="me-3" 
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
              <a class="nav-link active" href="user" aria-current="page" href="#home"
                >Home</a>
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

    <!-- Home Section Open -->
    <section class="home" id="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div
              class="home-content"
              data-aos="fade-up"
              data-aos-duration="1000"
            >
              <p class="badge fs-6 bg-primary-light text-primary">
              <h4>Welcome Back <b style="text-transform: capitalize; ">Admin</b></h4>
              </p>
              <h1 class="text-home-bold fw-bold text-dark mt-1">
                Kelola Semua Data dengan <span>Praktis</span>
              </h1>
              <h4 class="text-home-reguler fw-normal text-secondary">
                Dengan visualisasi data dari database secara simple
              </h4>
              <div class="home-btn mt-5">
                <!-- <a href="/job_pengguna" class="btn btn-primary shadow-none">Visualisasi User</a> -->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div
              class="home-img mt-4"
              data-aos="fade-up"
              data-aos-duration="2000"
            >
                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home Section Close -->

    <!-- Services Section Open -->
    <section class="services text-center">
      <div class="container">
        <span class="text-primary">Features</span>
        <h2 class="fw-bold text-dark mt-3">Our best features for processing data</h2>
        <div class="row">
          <div
            class="col-sm-4 content mt-5"
            data-aos="fade-up"
            data-aos-duration="1000"
          >
            <img src="img/services-1.svg" alt="" />
            <h5 class="services-title text-dark mt-4">Easy Vizualisation</h5>
            <p class="text-secondary mt-3">
              Visualisasi data dengan mudah dan simple
            </p>
          </div>
          <div
            class="col-sm-4 content mt-5"
            data-aos="fade-up"
            data-aos-duration="2000"
          >
            <img src="img/services-2.svg" alt="" />
            <h5 class="services-title text-dark mt-4">Modern Look</h5>
            <p class="text-secondary mt-3">
              Tampilan yang modern dan memudahkan dalam mengelola data
            </p>
          </div>
          <div
            class="col-sm-4 content mt-5"
            data-aos="fade-up"
            data-aos-duration="3000"
          >
            <img src="img/services-3.svg" alt="" />
            <h5 class="services-title text-dark mt-4">Elegant</h5>
            <p class="text-secondary mt-3">
              UI yang elegan dan menyegarkan mata
            </p>
          </div>
        </div>
      </div>
    </section>

   <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Footer Section Open -->
    <footer class="footer-section" id="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-5">
            <div class="row">
              <div class="col-md-12 col-lg-10">
                <a href="#" class="footer-brand">
                  <img src="../img/logoManxi.jpeg" class="me-3"  alt="brand" style="width:60px;height:80px;"/> 
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
      const xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    },{
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Transaction Data in 2024"
    }
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
