<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="admin.css">

    <title>Rumah Sakit ARS</title>
  </head>
  <body>
   <!-- Header-->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#" color="white">SELAMAT DATANG DI | <b>RUMAH SAKIT ARS</b></a>
         
            <form class="form-inline my-2 my-lg-0 ml-auto">
              
            </form>
            <div class="icon ml-3">
              <h4><i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Pesan Masuk"></i>
              <i class="fas fa-bell mr-3" data-toggle="tooltip" title="Notifikasi"></i>
              <i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></i>
            </h4>
            </div>
          </div>
        </nav>

        <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
        unset($_SESSION['info']);
    endif;
    ?>

        <!--Akhir Header-->