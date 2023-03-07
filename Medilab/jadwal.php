<?php session_start();
include 'config.php';
$date = date('Y-m-d');
date_default_timezone_set("Asia/Jakarta");
$active = 'jadwal';
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
        <h1>JADWAL DOKTER</h1></center>
        <hr>
<i>
    </i>
<br> <i>
    </i>
    <div class="card p-4 shadow-sm mt-4">
    <h2>Dokter Spesialis Bedah </h2>
    <hr>
        <table border="1" class="table align-middles shadow-sm border-rounded table-stripped table-bordered">
            <tr style="background-color: green; color:white; text-align:center;">
            <th scope="col">NAMA DOKTER</th>
            <th scope="col">SPESIALIS</th>
            <th scope="col">ON CALL</th>
            <th scope="col">JAM PRAKTEK</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Ali Sundoro,dr.,SpBP</td>
            <td>Bedah Plastik</td>
            <td>Rabu dan Kamis</td>
            <td>08.00 sd 12.00</td>

        <tr>
            <td>Andrian,dr.,SpBP</td>
            <td>Bedah Digestif</td>
            <td>Selasa</td>
            <td>08.00 sd 10.00</td>

        <tr>
            <td>Almahitta Cintami Puri,dr.,SpB-KBD</td>
            <td>Bedah Plastik</td>
            <td>Selasa dan Rabu</td>
            <td>-</td>

        <tr>
            <td>Bambang Am,s,.dr.,SpB-KBD</td>
            <td>Bedah Digestif</td>
            <td>Senin sd Jumat</td>
            <td>-</td>

        <tr>
            <td>Emiliani Lia,dr.,SpBA</td>
            <td>Bedah anak</td>
            <td>Senin sd Jumat</td>
            <td>09.00 sd 14.00</td>


        <tr>
            <td>Hardisiswo Sampoerna,dr.,SpBP-RE</td>
            <td>Bedah Plastik</td>
            <td>Senin dan Rabu</td>
            <td>12.00 sd 14.00</td>

        <tr>
            <td>Dimiyati Achmad ,dr.,SpBP(K)Onk</td>
            <td>Bedah Onkologi </td>
            <td>Senin, Rabu dan Jumat</td>
            <td>Dibawah jam 11.00</td>

        <tr>
            <td>Dicky Drajat,dr.,SpB,SpBA</td>
            <td>Bedah anak</td>
            <td>Senin dan Rabu</td>
            <td>10.00 sd 13.00</td>
        </tr>
    </tbody>
</table>

</div>
<br> <i>
    </i>
    <div class="card p-4 shadow-sm mt-4">
    <h2>Dokter Spesialis Saraf</h2>
    <hr>
        <table border="1" class="table align-middles shadow-sm border-rounded table-stripped table-bordered">
            <tr style="background-color: green; color:white; text-align:center;">
            <th scope="col">NAMA DOKTER</th>
            <th scope="col">SPESIALIS</th>
            <th scope="col">ON CALL</th>
            <th scope="col">JAM PRAKTEK</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Ali Baba,dr.,SpBP</td>
            <td>Bedah Plastik</td>
            <td>Rabu dan Kamis</td>
            <td>08.00 sd 12.00</td>

        <tr>
            <td>Andriansyah,dr.,SpBP</td>
            <td>Bedah Digestif</td>
            <td>Selasa</td>
            <td>08.00 sd 10.00</td>

        <tr>
            <td>Cintami Puri,dr.,SpB-KBD</td>
            <td>Bedah Plastik</td>
            <td>Selasa dan Rabu</td>
            <td>-</td>

        <tr>
            <td>Kusuma Am,s,.dr.,SpB-KBD</td>
            <td>Bedah Digestif</td>
            <td>Senin sd Jumat</td>
            <td>-</td>

        <tr>
            <td>Emil tio,dr.,SpBA</td>
            <td>Bedah anak</td>
            <td>Senin sd Jumat</td>
            <td>09.00 sd 14.00</td>


        <tr>
            <td>Hardi,dr.,SpBP-RE</td>
            <td>Bedah Plastik</td>
            <td>Senin dan Rabu</td>
            <td>12.00 sd 14.00</td>

        <tr>
            <td>Achmad ,dr.,SpBP(K)Onk</td>
            <td>Bedah Onkologi </td>
            <td>Senin, Rabu dan Jumat</td>
            <td>Dibawah jam 11.00</td>

        <tr>
            <td>Drajat,dr.,SpB,SpBA</td>
            <td>Bedah anak</td>
            <td>Senin dan Rabu</td>
            <td>10.00 sd 13.00</td>

        </tr>
    </tbody>
</table>

</div>


<br> <i>
    </i>
    <div class="card p-4 shadow-sm mt-4">
    <h2>Dokter Spesialis Penyakit Dalam</h2>
    <hr>
        <table border="1" class="table align-middles shadow-sm border-rounded table-stripped table-bordered">
            <tr style="background-color: green; color:white; text-align:center;">
            <th scope="col">NAMA DOKTER</th>
            <th scope="col">SPESIALIS</th>
            <th scope="col">ON CALL</th>
            <th scope="col">JAM PRAKTEK</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Ali Baba,dr.,SpBP</td>
            <td>Bedah Plastik</td>
            <td>Rabu dan Kamis</td>
            <td>08.00 sd 12.00</td>

        <tr>
            <td>Andriansyah,dr.,SpBP</td>
            <td>Bedah Digestif</td>
            <td>Selasa</td>
            <td>08.00 sd 10.00</td>

        <tr>
            <td>Cintami Puri,dr.,SpB-KBD</td>
            <td>Bedah Plastik</td>
            <td>Selasa dan Rabu</td>
            <td>-</td>

        <tr>
            <td>Kusuma Am,s,.dr.,SpB-KBD</td>
            <td>Bedah Digestif</td>
            <td>Senin sd Jumat</td>
            <td>-</td>

        <tr>
            <td>Emil tio,dr.,SpBA</td>
            <td>Bedah anak</td>
            <td>Senin sd Jumat</td>
            <td>09.00 sd 14.00</td>


        <tr>
            <td>Hardi,dr.,SpBP-RE</td>
            <td>Bedah Plastik</td>
            <td>Senin dan Rabu</td>
            <td>12.00 sd 14.00</td>

        <tr>
            <td>Achmad ,dr.,SpBP(K)Onk</td>
            <td>Bedah Onkologi </td>
            <td>Senin, Rabu dan Jumat</td>
            <td>Dibawah jam 11.00</td>

        <tr>
            <td>Drajat,dr.,SpB,SpBA</td>
            <td>Bedah anak</td>
            <td>Senin dan Rabu</td>
            <td>10.00 sd 13.00</td>

        </tr>
    </tbody>
</table>
</div>


</div>


  <!-- ======= Footer ======= -->
  <footer id="footer">

 

    <div class="container d-md-flex py-4 mt-5">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>RUMAH SAKIT PEDULI</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
      
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

 
</body>

</html>