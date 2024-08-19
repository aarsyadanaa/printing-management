<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['email'])){
   header('location:login_form.php');
}
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manxi-SmartPrint</title>
  <link rel="stylesheet" href="css/admin.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="img/logoManxi.jpeg" alt="">
          <span class="nav-item">SmartPrint</span>
        </a></li>
        <li>
        <a href="/admin">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
        </a>
        </li>
        <li style="position: relative;">
      <a href="admin/history">
        <i class="fas fa-book"></i>
        <span class="nav-item">History</span>
      </a>
    </li>
        <li>
        <a href="http://learnmath.kesug.com/wp/" target="_blank">
            <i class="fas fa-blog"></i>
            <span class="nav-item">Blog</span>
        </a>
        </li>
    <li><a href="logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
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
        <h1>Panel</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-dice"></i>
          <h3>Home</h3>
          <p>Home</p>
          <button onclick="window.location.href='admin'">Lihat</button>
        </div>
        <div class="card">
          <i class="fab fa-wordpress"></i>
          <h3>History</h3>
          <p>Riwayat Pencetakan Dokumen</p>
          <button onclick="window.location.href='admin/history'">Lihat</button>
        </div>
        <div class="card">
          <i class="fas fa-palette"></i>
          <h3>Blog</h3>
          <p>Blog Utama Perusahaan</p>
          <button onclick="window.location.href='manxigroup.com'">Lihat</button>
        </div>
      </div>
</div>
    </section>
  </div>
</body>
</html></span>