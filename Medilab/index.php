<?php session_start();
include 'config.php';
$date = date('Y-m-d');
date_default_timezone_set("Asia/Jakarta");
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
    
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
<img src="images/logo4.png" class="" alt="" width="75px">
      <h1 class="logo me-auto"><a href="index.html" class="ms-2">RUMAH SAKIT PEDULI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
         
          <li><a class="nav-link  <?= $active == 'jadwal' ? 'active' : '' ?> scrollto" href="jadwal.php">Cek jadwal</a></li>
        


          <!-- <li><a class="nav-link  <?= $active == 'history' ? 'active' : '' ?> scrollto" href="riwayat.php">History</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->


      <a href="logout_proses.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Logout</a>
      <a href="berobat.php"  class="appointment-btn scrollto" style="background-color: green;">Ingin Berobat?</a>

    </div>

  </header><!-- End Header -->



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">

      <h1>Selamat datang <?=  $_SESSION['user']; ?></h1>
      <h1>di website rumah sakit</h1>
      <h1>peduli</h1>
      <h2>kesehatan anda adalah prioritas kami</h2>
      <a href="#about" class="btn-get-started scrollto">Jelajahi</a>
    </div>
  </section><!-- End Hero -->


  <br> <br> <br> <br> <br> <br>
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
          <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h3>Kesehatan Anda Prioritas kami</h3>
          <p>Rumah sakit Peduli memiliki banyak beragam fasilitas yang nyaman dan berkualitas dengan harga terjangkau.</p>

          <div class="icon-box">
            <div class="icon"><i class="bx ri-nurse-fill"></i></div>
            <h4 class="title"><a href="">Pelayanan Medis</a></h4>
            <p class="description">Mulai dari fasilitas kesehatan mendasar hingga unit-unit perawatan khusus, RS Santo Borromeus dikenal sebagai pusat medis aneka guna yang terus tumbuh untuk memenuhi tuntutan zaman</p>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx ri-hospital-line"></i></div>
            <h4 class="title"><a href="">Rawat Inap</a></h4>
            <p class="description">Kami berupaya memberikan pelayanan keperawatan yang menyeluruh yaitu bio-psiko sosio kultural dan spiritual sesuai kebutuhan pasien berdasarkan visi, misi dan falsafah keperawatan serta tanpa melupakan kode etik keperawatan</p>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Penunjang Medis</a></h4>
            <p class="description">Kami menyediakan ruang-ruang khusus kepada para pasien untuk menjalankan berbagai kenyamanan dan senantiasa menyediakan kebutuhan yang senantiasa menjaga performa mereka.</p>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="fas fa-user-md"></i>
            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
            <p>Doctors</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="far fa-hospital"></i>
            <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
            <p>Departments</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="fas fa-flask"></i>
            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
            <p>Research Labs</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="fas fa-award"></i>
            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
            <p>Awards</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>Beberapa fitur yang bisa dilihat</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="ri-customer-service-2-fill"></i></div>
            <h4><a href="">24 Jam</a></h4>
            <p>kami buka sepanjang hari untuk melayani anda</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-pills"></i></div>
            <h4><a href="">Cek Jadwal</a></h4>
            <p>Cek Jam Praktek Dokter Spesialis Anda yang tersedia</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <a href="#appointment">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="#appointment">Pendaftaran Online</a></h4>
              <p>Lakukan Pendaftaran Online Sekarang Tanpa Harus mengantri</p>
            </div>
        </div>
        </a>


      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment section-bg">
    <div class="container">
      <?php if (isset($_SESSION['eksekusi'])) :
      ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <a>Pendaftaran Berhasil </a> <strong><?php echo $_SESSION['eksekusi']; ?></strong>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


      <?php
        unset($_SESSION['eksekusi']);
      endif;
      ?>


      <div class="section-title">
    
        <h2>Pendaftaran Online</h2>
    
        
        <p>Lakukan Pendaftaran Online Sekarang Tanpa Harus mengantri, Silahkan Tunggu Konfirmasi Apabila Sudah Mendaftar!</p>
      </div>

      <form method="post" action="">
        <div class="row">
          <div class="col-md-6 mt-2">
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">Nik</label>
              <input type="number" class="form-control" name="nik" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="exampleInputPassword1" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mt-2">
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tgl" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="exampleInputEmail1 ">Jenis Kelamin</label>
              <select class="form-control" name="jk" aria-label="Default select example" required>
                <option value=""> --Pilih Jenis Kelamin-- </option>
                <option value="Laki Laki">Laki Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mt-3">
          <label for="exampleInputEmail1">No. Telp/HP</label>
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1">+62</span>
              <input type="number" class="form-control" placeholder="8XXXXXXXX" name="tlp" required>
            </div>

          </div>
          <div class="col-md-12 mt-2">
            <label for="exampleInputPassword1" class="form-label">Tanggal</label>
            <input type="date-local" class="form-control" name="tanggal" id="exampleInputPassword1" value="<?= $date; ?>" readonly>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 ms-3" style="float: right;" name="daftar">DAFTAR SEKARANG</button>
       
      </form>
    </div>
  </section><!-- End Appointment Section -->

  

 

  

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Location</h2>
        <p>Rumah Sakit Ini Berada di Jl. Siliwangi No.50, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431 Untuk Lebih lengkapnya bisa melihat Maps dibawah ini</p>
      </div>
    </div>

    <div>
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9564720422163!2d106.8229932153391!3d-6.399610664373771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebe73955c329%3A0x4f2bdf277a20025e!2sRSU%20Hermina%20Depok!5e0!3m2!1sid!2sid!4v1677501866397!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
    </div>

   

      </div>

    </div>
  </section><!-- End Contact Section -->



  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container">

      <div class="section-title">
        <h2>Gallery</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row g-0">

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
              <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Gallery Section -->

  <section id="departments" class="departments">
    <div class="container">

      <div class="section-title">
        <h2>About Us</h2>
        
      </div>
      <h2>TENTANG RUMAH SAKIT</h2>
      <p class="fs-6">Rumah Sakit Peduli merupakan Rumah Sakit Pendidikan Swasta pertama di Indonesia yang mempunyai konsep dan rancang bangun fisik dengan Konsep Hijau (Green Hospital Concept) yang ramah lingkungan dan berorientasi sepenuhnya pada keselamatan pasien. Bangunan seluas 82.074 meter persegi yang berdiri di atas lahan seluas 106.100 meter persegi ini berlokasi di kompleks area Gedung Ilmu Rumpun Kesehatan (RIK), Berbeda dengan rumah sakit lain, fitur keselamatan pasien dan kenyamanan bagi semua orang yang beraktivitas di dalam bangunan dengan kapasitas 300 tempat tidur ini sudah lebih terencana, termasuk di dalamnya antara lain :
        - Bangunan utama rumah sakit yang memiliki bantalan anti gempa untuk menahan guncangan dengan aman hingga 9.0 Skala Ritcher
        - Setiap lantai memiliki kompartemen tahan api dan bebas asap sebagai area aman tempat berkumpul untuk memudahkan evaluasi pada musibah kebakaran
        - Ruang rawat inap dirancang dan ditata agar dapat memperoleh sinar ultra violet matahari sebanyak-banyaknya sebagai program pengendalian infeksi rumah sakit
        - Bangunan untuk mesin generator listrik dan mesin penghembus udara sejuk terpisah dari bangunan, sehingga pasien dan seluruh staf pemberi layanan di RSUI dapat bekerja produktif, bebas dari getaran dan kebisingan</p>
        <h2>VISI & MISI</h2>
        <p>
VISI :
Rumah Sakit ARS menjadi rumah sakit pendidikan berkelas dunia pada tahun 2023.
<br>
MISI :
1. Menyelenggarakan pelayanan kesehatan yang mengutamakan keselamatan pasien dan kualitas pelayanan, berbasis bukti, paripurna, holistik, terintegrasi, melalui pendekatan keluarga dan komunitas, dengan menggunakan teknologi unggulan terkini.
<br>
2. Menyelenggarakan pendidikan interprofesional bidang kesehatan yang unggul untuk menghasilkan lulusan berkualitas, menjadi pelopor pembaruan, memiliki rasa kemanusiaan, dan berjiwa penolong.
<br>
3. Mengembangkan pusat pendidikan dan pelatihan bidang kesehatan berfokus pada masalah kesehatan nasional.
<br>
4. Mengembangkan pusat riset bidang kesehatan terintegrasi, unggul, dan bermanfaat untuk pengembangan pelayanan kesehatan.
<br>
5. Menyelenggarakan manajemen yang professional dan akuntabel, serta mampu mencapai kemandirian finansial.
<br>
6. Menjadi bagian dari academic health system UI.
</p>
        
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Departments Section -->

 

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Medilab</h3>
            <p>
            Jl. Siliwangi<br>
            No.50, Depok, Kec. Pancoran Mas<br>
            Kota Depok, Jawa Barat 16431 <br><br>
              <strong>Phone:</strong> +62895385309904<br>
              <strong>Email:</strong> rspeduli@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="jadwal.php">Cek Jadwal dokter</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Daftar Online</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">lokasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#departments">About Us</a></li>
           
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>TERIMAKASIH TELAH MENGUNJUNGI RUMAH SAKIT KAMI</h4>
            <p>Rumah Sakit Kami Siap Melayani Anda 24 Jam, Kapanpun Dan Dimanapun <i class="bi bi-emoji-smile"></i></p>
           
          </div>

        </div>
      </div>
    </div>

   

    <div class="container d-md-flex py-4">

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
       
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



  <?php
  if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $id_user =  $_SESSION['id_user'];
    $jk = $_POST['jk'];
    $tlp = $_POST['tlp'];
    $tanggal = $_POST['tanggal'];
    $query = mysqli_query($conn, "INSERT INTO tbl_pendaftaran VALUES(NULL, '$id_user', '$nik', '$nama', '$tgl', '$jk', '62$tlp', '$tanggal', 'pending')");
    if ($query) {
      $_SESSION['eksekusi'] = "Silahkan Tunggu Konfirmasi!";
      echo "<script>document.location.href = 'index.php';</script>";
    }
  }
  ?>

</body>

</html>