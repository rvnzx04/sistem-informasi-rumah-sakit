<?php 
 include 'view/header.php';
 include 'config.php';


?>


  <!--jquery-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="images/4.jpg">
      <div class="carousel-caption d-none d-md-block">
    <h4>Ruang Tunggu Rumah Sakit Peduli</h4>
    <p>memberikan pelayanan terbaik</p>
  </div>
    </div>
    <div class="carousel-item" background-color="white">
      <img src="images/5.jpg">
        <div class="carousel-caption d-none d-md-block">
    <h4>Kesehatan anda</h4>
    <p>adalah prioritas kami!</p>
  </div>
    </div>
    <div class="carousel-item">
    <img src="images/0.png">
    <div class="carousel-caption d-none d-md-block">
    <h4>Fasilitas terbaik</h4>
    <p>bisa kalian temukan di Rumah Sakit Peduli</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br><hr>

    <!--akhir jquery-->


     <div class="row pelayanan">
      <div class="col">
        <img src="images/dokter-icon-girl.png" alt="" class="img-fluid">
      </div>
      <div class="col">
        <h3>Pelayanan Medis</h3>
        <p>Mulai dari fasilitas kesehatan mendasar hingga unit-unit perawatan khusus, RS
          Santo Borromeus dikenal sebagai pusat medis aneka guna yang terus tumbuh untuk
          memenuhi tuntutan zaman</p>
      </div>
    </div>

    <div class="row pelayanan">
      <div class="col">
        <img src="images/rawat-inap.png" alt="" class="img-fluid">
      </div>
      <div class="col">
        <h3>Rawat Inap</h3>
        <p>Kami berupaya memberikan pelayanan keperawatan yang
          menyeluruh yaitu bio-psiko sosio kultural dan spiritual sesuai kebutuhan pasien berdasarkan visi, misi dan
          falsafah keperawatan serta tanpa melupakan kode etik keperawatan</p>
      </div>
    </div>

    <div class="row pelayanan">
      <div class="col">
        <img src="images/penunjang-medis.png" alt="" class="img-fluid">
      </div>
      <div class="col">
        <h3>Penunjang Medis</h3>
        <p>Kami menyediakan ruang-ruang khusus kepada para pasien untuk menjalankan berbagai kenyamanan dan senantiasa
          menyediakan kebutuhan yang senantiasa menjaga performa mereka.</p>
      </div>
    </div>



<?php

include 'view/footer.php';

?>
