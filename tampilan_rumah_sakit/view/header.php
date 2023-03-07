<?php session_start();
include '../config.php';
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="view/font.css">
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

      <a class="navbar-brand" href="#"> <img src="images/logo4.png" width="100px" height="100px"></a>
      <a class="navbar-brand" href="#">
        Rumah Sakit Peduli </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a href="index.php" class="nav-item nav-link active">Home <span class="sr-only">(current)</span></a>
          <a href="view/riwayat.php" class="nav-item nav-link" href="">History</a>
          <a href="view/logout_proses.php" class="nav-item btn btn-danger tombol" onclick="return confirm('Apakah anda yakin ingin keluar???')"><label style="color: white; padding-top: 2px;">Logout</label></a>
        </div>
      </div>
    </div>
  </nav>

  <!-- akhir navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="jumbo1">
      <div class="container">
        <h1 class="display-4" style="text-transform: uppercase;">SELAMAT DATANG  <?= $_SESSION['user']; ?> DI <br> WEBSITE RUMAH SAKIT peduli</h1>
        <p class="lead">Kesehatan anda adalah prioritas kami </p>
      </div>
    </div>
  </div>

  <!-- Akhir Jumbotron -->

  <!-- Container -->
  <div class="container">

    <!-- Info Panel -->
    <div class="row justify-content-center">
      <div class="col -10 info-panel">
        <?php if (isset($_SESSION['eksekusi'])) :
        ?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <a>Pendaftaran Berhasil </a> <strong><?php echo $_SESSION['eksekusi']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        <?php
          unset($_SESSION['eksekusi']);
        endif;
        ?>

        <div class="row">

          <div class="col-lg">

            <img src="images/employee.png" class="img100 float-left" alt="employee">
            <h4>24 Hours</h4>
            <P>Hubungi Call Center</P>
          </div>
          <div class="col-lg">
            <img src="images/Schedule.png" class="img100 float-left" alt="Schedule">
            <a href="table/tabel.php">
              <h4>Cek Jadwal</h4>
            </a>
            <P>Cek Jam Praktek Dokter Spesialis Anda </P>
          </div>
          <div class="col-lg">
            <img src="images/reservasi.png" class="img100 float-left" alt="reservasi">
            <a href="" data-toggle="modal" data-target="#staticBackdrop">
              <h4>pendaftaran online</h4>
            </a>
            <P>Pendaftran tanpa mengantri</P>

          </div>

        </div>

      </div>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <form action="" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pendaftaran online</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="" class="col-form-label">Nik </label>
                  <input type="number" class="form-control" name="nik" id="" placeholder="Masukan Nik" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Nama </label>
                  <input type="text" class="form-control" name="nama" id="" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Tanggal lahir </label>
                  <input type="text" class="form-control" name="tgl" id="" placeholder="Masukan Tangga Lahir" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <select class="form-control" name="jk" aria-label="Default select example" required>
                    <option value=""> --Pilih Jenis Kelamin-- </option>
                    <option value="Laki Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">No. Telp/Hp </label>
                  <input type="number" class="form-control" name="tlp" id="" placeholder="Masukan No.Telp/Hp" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Tanggal </label>
                  <input type="text" class="form-control" name="tanggal" id="" value="<?= $date; ?>" readonly>
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="daftar" class="btn btn-primary">Daftar Sekarang</button>
              </div>
            </div>
        </div>
      </div>
      <!-- akhir modal -->
    </div>
    </form>


    <?php
    if (isset($_POST['daftar'])) {
      $nik = $_POST['nik'];
      $nama = $_POST['nama'];
      $tgl = $_POST['tgl'];
      $id_user =  $_SESSION['id_user'];
      $jk = $_POST['jk'];
      $tlp = $_POST['tlp'];
      $tanggal = $_POST['tanggal'];
      $query = mysqli_query($conn, "INSERT INTO tbl_pendaftaran VALUES(NULL, '$id_user', '$nik', '$nama', '$tgl', '$jk', '$tlp', '$tanggal', 'pending')");
      if ($query) {
        $_SESSION['eksekusi'] = "Silahkan Tunggu Konfirmasi!";
        echo "<script>document.location.href = 'index.php';</script>";
      }
    }
    ?>


