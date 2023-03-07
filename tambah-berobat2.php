<?php
include 'config.php';
$active = 'berobat';
$date = date('Y/m/d');
date_default_timezone_set("Asia/Jakarta");


// edit data
$id = '';
$nik = '';
$nama = '';
$id_spesialis;

if (isset($_GET['data'])) {
    $id = $_GET['data'];
    $query = "SELECT * FROM tambah_berobat JOIN spesialis ON (spesialis.id_spesialis = tambah_berobat.spesialis) WHERE id_berobat ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $id = $result['id_berobat'];
    $nik = $result['nik'];
    $nama = $result['nama'];
    $spesialis = $result['nama_spesialis'];
    $id_spesialis = $result['id_spesialis'];
}
// akhir

// mengambil data barang dengan kode paling besar
$query = mysqli_query($conn, "SELECT max(kode_pasien) as kodeTerbesar FROM tambah_berobat");
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


<?php include('navbar.php'); ?>

<!-- end navbar -->

<!-- forms -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-1">
                    <div class="card-header py-3">
                        <?php
                        if (isset($_GET['data'])) {
                        ?>
                            <h4 class="title ">Edit Data Pasien Berobat</h4>
                        <?php
                        } else {
                        ?>
                            <h4 class="title ">Tambah Pasien Berobat</h4>
                        <?php
                        }
                        ?>

                    </div>

                    <div class="card-body">
                        <div class="content">

                            <form method="POST" action="proses.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                                        
                                        <div class="form-group">
                                            <label>Nomor Pasien</label>
                                            <input type="text" name="kode_pasien" class="form-control" placeholder="" value="<?= $kodeBarang ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>NIK/KTP</label>
                                            <input type="text" id="nik" name="nik" class="form-control" onkeyup="autofill()" placeholder="Masukan Nik" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Pasien</label>
                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pasien" readonly>
                                            <input type="hidden" id="id_user" name="id_user" class="form-control" placeholder="Nama Pasien" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" name="keterangan" value="berobat">
                                    <div class="col-md-12">
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

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal input</label>
                                            <input type="date-local" class="form-control" name="tanggal" placeholder="Masukan alamat" value="<?= $date ?>" readonly>
                                        </div>
                                    </div>

                                </div>

                                <!-- form -->

                                <button type="submit" name="aksi" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;" value="tambah2">Tambahkan</button>

                                <a href="data-berobat.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>
                                <!--  -->

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
                <!-- end forms -->

                <!-- End of Footer -->


                <!-- End of Page Wrapper -->

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




                <script src="jquery-1.12.4.min.js"></script>

                <script type="text/javascript">


                    function autofill() {
                        var nik = $("#nik").val();
                        $.ajax({
                            url: 'ajax2.php',
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