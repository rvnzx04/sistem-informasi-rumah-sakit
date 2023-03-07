<?php
include '../view/config.php';
session_start();
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- My CSS  -->
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="style.css">
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">


	<title>Reservasi Online</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light mt-3">
    <div class="container">

      <a class="navbar-brand" href="#"> <img src="../images/logo4.png" width="100px" height="100px"></a>
      <a class="navbar-brand" href="#">
        Rumah Sakit Peduli </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a href="../index.php" class="nav-item nav-link active">Home <span class="sr-only">(current)</span></a>
          <a href="../view/riwayat.php" class="nav-item nav-link" href="">History</a>
          <a href="../view/logout_proses.php" class="nav-item btn btn-danger tombol" onclick="return confirm('Apakah anda yakin ingin keluar???')"><label style="color: white; padding-top: 2px;">Logout</label></a>
        </div>
      </div>
    </div>
  </nav>


	<!-- navbar -->


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
	<!-- akhir info -->
	<div class="container">

		<i>
			<h2>Dokter Spesialis Bedah</h2>
		</i>
		<table class="table table-bordered">

			<thead class="thead-dark">
				<tr>
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

	<div class="container">
		<br> <i>
			<h2>Dokter Spesialis Saraf</h2>
		</i>
		<table class="table table-bordered">

			<thead class="thead-dark">
				<tr>
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

	<div class="container">
		<br> <i>
			<h2>Dokter Spesialis Penyakit Dalam</h2>
		</i>
		<table class="table table-bordered">

			<thead class="thead-dark">
				<tr>
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

	<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
		<div class="container text-center">
			<small>Copyright &copy; Kelompok 2</small>
		</div>
	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>



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
        echo "<script>document.location.href = 'tabel.php';</script>";
      }
    }
    ?>
</html>