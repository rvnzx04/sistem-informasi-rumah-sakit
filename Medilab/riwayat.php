<?php session_start();
include 'config.php';
$date = date('Y-m-d');
date_default_timezone_set("Asia/Jakarta");
$active = 'history';
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

      <h1 class="logo me-auto"><a href="index.html">RUMAH SAKIT PEDULI </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php">About</a></li>
          <li><a class="nav-link scrollto" href="index.php">Services</a></li>

          <li><a class="nav-link  scrollto" href="jadwal.php">Cek jadwal</a></li>
        
          <li><a class="nav-link <?= $active == 'history' ? 'active' : '' ?> scrollto" href="riwayat.php">History</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->


      <a href="logout_proses.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Logout</a>
    </div>
<hr>
  </header><br><br><br><br><!-- End Header -->

<!-- data -->
<section id="about" class="about">
<div class="container">
    <center><h1 class="pb-2">Hasil Rekam Medis</h1></center>
    <hr>
    <?php
          $id_user =  $_SESSION['id_user'];
          $tampil = mysqli_query($conn, "SELECT * FROM tambah_rm3 WHERE id_user ='$id_user'");
          $tampil2 = mysqli_query($conn, "SELECT keluhan_ps FROM tambah_rm3 WHERE id_user ='$id_user'");
          $cek = mysqli_num_rows($tampil2);
          $no = 1;
          if (empty($cek)) {
              echo "<script>alert('Hasil rekam medis masi kosong);
                          document.location.href = 'index.php';</script>";
            
          }
          ?>

    <div class="card p-4 shadow-sm mt-4">
        <table border="1" class="table align-middles shadow-sm border-rounded table-stripped table-bordered">
            <tr style="background-color: black; color:white; text-align:center;">
              <td>No</td>
              <td>Keluhan</td>
              <td>Diagnosis</td>
              <td>Jumlah Berobat</td>
              <td>Tanggal Pemeriksaan</td>
              
            </tr>
            
            <?php while ($card = mysqli_fetch_assoc($tampil)) { 
              ?>
                <tr style="text-align:center;">
                    <td><?= $no++; ?></td>
                    <td><?= $card['keluhan_ps']; ?></td>
                    <td><?= $card['diagnosis_ps']; ?></td>
                    <td> <?= get_total_attend($card['id_user'], "berobat"); ?></td>  
                    <td> <?= $card['tanggal']; ?></td>  
                </tr>
                <?php } ?>
            
              </table>
            </div>
<!-- end data -->


</body>

</html>