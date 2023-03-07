<?php

require 'functions.php';

require 'view/adminheader.php';
require 'view/sidebaradmin.php';

$jumlahpasien  =  mysqli_query ($conn,"SELECT * FROM  registrasi")  ;
$datapasien  =  mysqli_num_rows ($jumlahpasien)  ;

$totalreservasi  =  mysqli_query ($conn,"SELECT * FROM  reservasi")  ;
$datareservasi  =  mysqli_num_rows ($totalreservasi)  ;

$totalreservasi  =  mysqli_query ($conn,"SELECT * FROM  list_dokter")  ;
$datadokter  =  mysqli_num_rows ($totalreservasi)  ;

?>
<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-tachometer-alt mr-2"></i>DASHBOARD</h3>
  <hr>

  <div class="row text-white">
    <div class="card bg-success ml-5" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-user-graduate mr-2"></i>
        </div>
        <h5 class="card-title ">Jumlah Pasien</h5>
        <div class="display-4"><?php
        
        echo $datapasien;
        
        ?></div>
        <a href="adminpasien.php">
          <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
        </a>

      </div>
    </div>

    <div class="card bg-warning ml-5" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-address-card mr-2"></i>
        </div>
        <h5 class="card-title ">Jumlah Reservasi Online Hari ini</h5>
        <div class="display-4">

        <?php
        echo $datareservasi;
        ?>
        </div>
        <a href="">
          <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
        </a>

      </div>
    </div>

    <div class="card bg-danger ml-5" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-users mr-2"></i>
        </div>
        <h5 class="card-title ">JUMLAH DOKTER</h5>
        <div class="display-4"><?php
        
        echo $datadokter;
        
        ?></div>
        <a href="dokter.php">
          <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
        </a>

      </div>
    </div>


  </div>
</div>
</div>


