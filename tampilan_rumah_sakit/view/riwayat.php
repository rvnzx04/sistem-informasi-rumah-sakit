<?php session_start();
include 'config.php';
$date = date('Y-m-d');
date_default_timezone_set("Asia/Jakarta");

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- My CSS  -->
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="font.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="dist/jquery.bxslider.css">
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="dist/jquery.bxslider.min.js"></script>
  <title>Rumah Sakit Peduli</title>
</head>

<body>
  <!-- navbar -->

  <nav class="navbar navbar-expand-lg navbar-light mt-3">
    <div class="container">

      <a class="navbar-brand" href="#"> <img src="../images/logo4.png" width="100px" height="100px"></a>
      <a class="navbar-brand" href="#">
        Rumah Sakit ARS </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a href="../index.php" class="nav-item nav-link active">Home <span class="sr-only">(current)</span></a>
          <a href="../view/riwayat.php" class="nav-item nav-link" href="#">History</a>
          <a href="../view/logout_proses.php" class="nav-item btn btn-danger tombol"><label style="color: white; padding-top: 2px;">Logout</label></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="jumbo1">
      <div class="container">
        <h1 class="display-4">Selamat datang <?= $_SESSION['user']; ?> di <br> Website Resmi Rumah Sakit Peduli</h1>
        <p class="lead">Kesehatan anda adalah prioritas kami </p>
      </div>
    </div>
  </div>
  <!-- Akhir Jumbotron -->
  <!-- Container -->




    <div class="container-fluid-py-5">
      <div class="container">
        <h2 class="text-center mb-4 mt-4">DATA REKAM MEDIS</h2>
        <div class="row">
          <?php
          $id_user =  $_SESSION['id_user'];
          $tampil = mysqli_query($conn, "SELECT * FROM tambah_rm3 WHERE id_user ='$id_user'");
          while ($card = mysqli_fetch_array($tampil)) {
          ?>
            <!-- script -->
            <div class="col-4">
              <div class="card mb-4 text-center shadow p-3 mb-5 bg-body rounded rounded-3">
               

                  <center><img src="../images/logo4.png" class="card-img-top mt-2 " style="width:200px; " alt="..."></center>
                  <h2 class=" pb-4 border-bottom shadow-sm"></h2>
                  <div class="card-body">

                    <p class="card-text" style="font-size: large;">Keluhan : <?= $card['keluhan_ps']; ?></p>
                    <p class="card-text" style="font-size: large;">Diagnosis : <?= $card['diagnosis_ps']; ?></p>
                    <p class="card-text" style="font-size: large;">Jumlah Berobat :  <?= get_total_attend($card['id_user'], "berobat"); ?></p>
                  </div>
             
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <br><br><br><br>