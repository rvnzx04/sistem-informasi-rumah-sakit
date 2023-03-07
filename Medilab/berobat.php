<?php session_start();
include 'config.php';
$date = date('Y-m-d');
date_default_timezone_set("Asia/Jakarta");



// mengambil data barang dengan kode paling besar
$query = mysqli_query($conn, "SELECT max(id_berobat) as kodeTerbesar FROM tambah_berobat2");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "P-";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
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

      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top shadow-sm">
    <div class="container d-flex align-items-center">
    <img src="images/logo4.png" class="" alt="" width="75px">
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

  <!-- form -->
  <div class="container">
    <div class="card">

      <div class="card-header bg-success text-white fs-4 "> <img src="images/logo4.png" width="50px" alt="">
        BEROBAT
      </div>


      <div class="card-body py-4 shadow">
        <div class="container">
          <form method="POST" action="proses.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12 mb-2">
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-group">
                  <label>Nomor Pasien</label>

                  <input type="text" name="kode_pasien" class="form-control" placeholder="" value="<?= $kodeBarang ?>" readonly>
                </div>
                <div class="form-group mt-2">
                  <label>NIK/KTP</label>
                  <input type="text" id="nik" name="nik" class="form-control" onkeyup="autofill()" placeholder="Masukan Nik" required>
                </div>
              </div>
      
              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <label>Nama Pasien</label>
                  <input type="text" id="nama" name="nama" class="form-control shadow-sm" placeholder="Nama Pasien" readonly>
                  <input type="hidden" id="id_user" name="id_user" class="form-control" placeholder="Nama Pasien" readonly>
                </div>
              </div>
              <input type="hidden" name="keterangan" value="berobat">
              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <label>Tujuan Berobat</label>
                  <select class="form-control" name="spesialis" id="id_spesialis" aria-label="Default select example" required>
                    <option value="" selected> --Pilih Dokter Spesialis-- </option>
                    <!-- mengambil data di database -->
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM spesialis ORDER BY nama_spesialis ASC") or die(mysqli_error($conn));
                    while ($dt = mysqli_fetch_array($sql)) {
                    ?>
                      <?php if ($dt['id_spesialis'] != $id_spesialis) : ?>
                        <option value="<?php echo $dt['id_spesialis'] ?>"><?php
                                                                          echo $dt['nama_spesialis'];
                                                                          ?>
                        </option>
                      <?php endif; ?>
                    <?php } ?>

                  </select>
                </div>
              </div>

              <div class="col-md-12 mb-2">
          <label for="exampleInputEmail1">No. Telp/HP</label>
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1">+62</span>
              <input type="number" class="form-control" placeholder="8XXXXXXXX" name="tlp" required>
            </div>

              <div class="col-md-12 mt-2">
                <div class="form-group">
                  <label>Tanggal input</label>
                  <input type="date-local" class="form-control" name="tanggal" placeholder="Masukan alamat" value="<?= $date ?>" readonly>
                </div>
              </div>
        

            <!-- form -->

            <button type="submit" name="tambah" class="btn btn-primary ms-3 mt-3 " style="float:right;">Berobat sekarang</button>
            <a href="index.php" type="submit" class="btn btn-danger mt-3" style="float:right;">Batal</a>
            <!--  -->


          </form>
        </div>

      </div>
    </div>

    <!-- akhir form -->



    <script src="../jquery-1.12.4.min.js"></script>

    <script type="text/javascript">
      function autofill() {
        var nik = $("#nik").val();
        $.ajax({
          url: 'ajax.php',
          data: "nik=" + nik,
        }).success(function(data) {
          var json = data,
            obj = JSON.parse(json);

          $('#nama').val(obj.nama);
          $('#id_user').val(obj.id_user);

        });
      }
    </script>

</body>

</html>