<?php session_start();
include 'config.php';
$date = date('Y-m-d');
date_default_timezone_set("Asia/Jakarta");
$active = 'jadwal';
$id_user =  $_SESSION['id_user'];
$tampil = mysqli_query($conn, "SELECT * FROM tambah_rm3 WHERE id_user ='$id_user'");
$tampil2 = mysqli_query($conn, "SELECT * FROM tbl_pendaftaran WHERE id_regis ='$id_user'");
$result = mysqli_fetch_array($tampil);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RS PEDULI</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.10.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:fardanseptian2004@gmail.com">fardanseptian2004@gmail.com</a>
        <i class="bi bi-phone"></i> +62 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top shadow-sm">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">RUMAH SAKIT PEDULI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php">About</a></li>
          <li><a class="nav-link scrollto" href="index.php">Services</a></li>
  
          <li><a class="nav-link  <?= $active == 'jadwal' ? 'active' : '' ?> scrollto" href="jadwal.php">Cek Jadwal</a></li>
        
          <li><a class="nav-link <?= $active == 'history' ? 'active' : '' ?> scrollto" href="riwayat.php">History</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->


      <a href="logout_proses.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Logout</a>

    </div>
 <hr>
  </header><br><br><br><br><br><br><br><!-- End Header -->

  <!-- akhir info -->
	<div class="container">
        <center>
        <h1>Kartu Pasien</h1></center>
        <hr>

<br>
<div class="card w-50 py-2">
  <div class="card-body">
    <div class="d-flex justify-content-between">
    <h5 class="card-title">Rumah Sakit Peduli</h5>
    <img src="../images/logo4.png" alt="" width="80px">
    </div>
    
   
    <p class="card-text" style="text-transform: uppercase;">No Antrian : <?= $result['id_rm2']; ?></p>
    <p class="card-text " style="text-transform: uppercase;">Nama Pasien : <?= $result['nama_ps']; ?></p>
    <p class="card-text ">keterangan :</p>
    <p class="card-text ">> Kartu harus selalu dibawa beserta fotocopy ketika datang ke rumah sakit</p>
    <p class="card-text ">> Kehilangan kartu dikenakan denda sebesar Rp.50.000</p>
    
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,154.7C384,181,480,203,576,181.3C672,160,768,96,864,90.7C960,85,1056,139,1152,170.7C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
  </div>
</div>


</body>

</html>