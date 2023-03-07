<?php
include 'config.php';

$date = date('Y/m/d');
date_default_timezone_set("Asia/Jakarta");



if (isset($_GET['proses'])) {
    $id = $_GET['proses'];
    $query = "SELECT * FROM tambah_rm2 WHERE id_rm2 ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nama_ps'];
}

$ambil_data = $conn->query("SELECT * FROM rawat_inap");

// mengambil data barang dengan kode paling besar
$query = mysqli_query($conn, "SELECT max(kode_kamar) as kodeTerbesar FROM kamar");
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
$huruf = "KMR";
$kodeBarang = $huruf . sprintf("%03s", $urutan);

?>

<?php include('navbar.php'); ?>

<!-- end navbar -->

<!-- forms -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">

                        <h4 class="title ">Tambah Rawat Inap</h4>

                    </div>

               
                    <div class="card-body">
                        <div class="content">

                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="row">
                                    

                                    <div class="col-md-12">
                                        
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <div class="form-group">
                                            <label>Pasien</label>

                                            <input type="text" class="form-control" name="nama" placeholder="" value="<?= $nama; ?>" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Nomor Kamar</label>
                                            <input type="text" class="form-control" name="nomor_kamar" placeholder="" value="<?= $kodeBarang ?>" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kelas Kamar</label>

                                            <select class="form-control" name="kelas" id="kelas" class="form-control" onchange='changeValue(this.value)' aria-label="Default select example" required>
                                                <option value=""> --Pilih Kelas Kamar-- </option>
                                                <?php
                                                $a          = "var harga = new Array();\n;";
                                                $b          = "var stok = new Array();\n;";
                                                $b          = "var stok2 = new Array();\n;";

                                                foreach ($ambil_data as $row) {
                                                    $id_stok = $row['id_ri'];
                                                    $stok = $row['stok'];
                                                    $nama = $alert['kelas_kamar'];
                                                    echo '<option name="kelas" value="' . $row['id_ri'] . '">' . $row['kelas_kamar'] . '</option>';
                                                    $a .= "harga['" . $row['id_ri'] . "'] = {harga:'Rp." . addslashes(number_format($row['harga_kamar'], 0, ',', '.')) . "'};\n";
                                                    $b .= "stok['" . $row['id_ri'] . "'] = {stok:'" . addslashes($row['stok'] - 1) . "'};\n";
                                                    $c .= "stok2['" . $row['id_ri'] . "'] = {stok:'" . addslashes($row['stok']) . "'};\n";

                                                ?>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="stok" id="stok" placeholder="Stok Kamar" value="">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Harga kamar</label>
                                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Kamar" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stok Kamar</label>
                                            <input type="text" class="form-control" name="" id="stok2" placeholder="Stok Kamar" value="" readonly>
                                        </div>
                                    </div>


                                    <input type="hidden" class="form-control" name="jumlah_kamar" placeholder="1" value="1" readonly>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal input</label>
                                            <input type="date-local" class="form-control" name="tanggal" placeholder="Masukan alamat" value="<?= $date ?>" readonly>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" name="tambah_ri" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;">Tambahkan</button>

                                <a href="rawat-inap.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>

                            </form>
                        </div>
                    </div>
                </div>


                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
      

                <!-- Page level custom scripts -->
          

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

                <script type="text/javascript">
                    <?php
                    echo $a;
                    echo $b;
                    echo $c;
                    ?>

                    function changeValue(id) {
                        document.getElementById('harga').value = harga[id].harga;
                        document.getElementById('stok').value = stok[id].stok;
                        document.getElementById('stok2').value = stok2[id].stok;

                    };
                </script>

                <?php
                if (isset($_POST['tambah_ri'])) {


                    $id = $_POST['id'];
                    $id_stok = $_POST['kelas'];
                    $nama = $_POST['nama'];
                    $stok =  $_POST['stok'];
                    $nomor_kamar = $_POST['nomor_kamar'];
                    $kelas = $_POST['kelas'];
                    $harga = $_POST['harga'];
                    $jumlah_kamar = $_POST['jumlah_kamar'];
                    $tanggal = $_POST['tanggal'];

                    $ambil_data = mysqli_query($conn, "SELECT * FROM rawat_inap WHERE id_ri =  '$id_stok'");
                    $result = mysqli_fetch_array($ambil_data);
                    $stok_sekarang = $result['stok'];

                    if ($stok_sekarang <= 0) {
                        echo '<script> alert("stok kamar habis");</script>';
                    } else {
                        $query = "INSERT INTO kamar VALUES(null, '$nomor_kamar', '$nama', '$kelas', '$harga', '$jumlah_kamar', '$tanggal', 'pending')";
                        $sql = mysqli_query($conn, $query);
                        $query2 = mysqli_query($conn, "UPDATE rawat_inap SET stok = '$stok' WHERE id_ri =  '$id_stok'");
                        $update = mysqli_query($conn, "UPDATE tambah_rm2 SET status = 'selesai' WHERE id_rm2 = '$id';");
                        $_SESSION['eksekusi'] = "Pasien Baru Berhasil Ditambahkan";

                        echo '<script> window.location.href="rawat-inap.php";</script>';
                    }
                }
                ?>