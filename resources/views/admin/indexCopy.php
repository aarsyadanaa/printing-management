
<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manxi-SmartPrint</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <!-- Font Awesome Cdn Link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="../img/logoManxi.jpeg" alt="">
          <span class="nav-item">SmartPrint</span>
        </a></li>
        <li>
        <a href="/admin/index">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
        </a>
        </li><li>
        <a href="/admin/user">
            <i class="fas fa-user"></i>
            <span class="nav-item">User</span>
        </a>
        </li>
        <li>
        <a href="/admin/transaction">
            <i class="fas fa-money-bill-wave"></i>
            <span class="nav-item">Transaction</span>
        </a>
        </li>
        <li style="position: relative;">
      <a href="/admin/history">
        <i class="fas fa-book"></i>
        <span class="nav-item">History</span>
      </a>
    </li>
        <form action="/logout" method="post" id="lO">
                          @csrf
                          <li><a class="logout" href="#" onclick="sbmtFunc()"><i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span></a></li>
                      </form></ul>
      </ul>
    </nav>
  <style>
    li {
      display: inline-block;
    }
    a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
    }
    .dropdown {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }
    li:hover .dropdown {
      display: block;
    }
  </style>
    <section class="main">
      <div class="main-top">
        <h1>Dashboard</h1>
        <i class="fas fa-user-cog"></i>
      </div>
        <div class="main-skills">
        <div class="card" style="width: 100%; max-width: 75%  ">
        <canvas id="docChart"></canvas>
        </div>
        <div class="main-skills">
        <div class="card" style="width: 100%; max-width: 75%  ">
        <canvas id="userChart"></canvas>
        </div>
        <br>
      </div>
    </section>
  </div>
</body>
<script>
function sbmtFunc(){
      document.getElementById("lO").submit(); 
    }
    var xValues = {{ Js::from($labels) }};
    var yValues = {{ Js::from($data) }};
    var barColors = ["red", "green", "blue", "orange", "brown", "purple", "yellow", "pink", "teal", "gray", "cyan", "magenta"];
    var userLabels = {{ Js::from($userLabels) }};
    var userData = {{ Js::from($userData) }};
new Chart("docChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Jumlah Dokumen yang Dicetak Selama Tahun 2024"
    }
  }
});

new Chart("userChart", {
  type: "line",
  data: {
    labels: userLabels,
    datasets: [{
      backgroundColor: barColors,
      data: userData
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Jumlah User selama tahun 2024"
    }
  }
});
    </script>
</html></span>