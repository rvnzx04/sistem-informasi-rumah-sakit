<?php
include 'config.php';
session_start();
$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");




$id = '';
$nama = '';
$keluhan = '';
$diagnosis = '';
$resep = '';
$tindakan = '';
$id_pasien;
$tindakan;



if (isset($_GET['transaksi'])) {
    $id = $_GET['transaksi'];
    $query = "SELECT * FROM tambah_rm  WHERE id_rm ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nm_pasien'];
    $keluhan = $result['keluhan'];
    $diagnosis = $result['diagnosis'];
    $resep = $result['resep'];
    $tindakan = $result['tindakan'];
    $id_pasien = $result['id_rm'];
    $dokter = 200000;
}

// update jumlah
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `data_obat` SET quantity = '$update_value' WHERE id_obat = '$update_id'");
    if ($update_quantity_query) {
    };
};

// tambahkan
if (isset($_POST['add'])) {

    $nama_obat = $_POST['nama_obat'];
    $harga_obat = $_POST['harga_obat'];
    $jumlah_obat = 1;
    $query = mysqli_query($conn, "INSERT INTO data_obat (nama_obat, harga_obat, quantity) VALUES('$nama_obat', '$harga_obat', '$jumlah_obat')");
    if ($query) {
    };
};


// hapus data obat
if (isset($_POST['hapus5'])) {
    $id_obat = $_POST['hapus_id'];
    $query = "DELETE FROM data_obat WHERE id_obat = '$id_obat';";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
    };
};

// memasukan data
if (isset($_POST['simpan'])) {

    $data_pasien = $_POST['data_nama'];
    $data_diagnosis = $_POST['data_diagnosis'];
    $data_tindakan = $_POST['data_tindakan'];
    $total_tagihan = $_POST['total_tagihan'];
    $uang_bayar = $_POST['uang_bayar'];
    $tanggal_transaksi = $_POST['tanggal'];
    $cart_query = mysqli_query($conn, "SELECT * FROM `data_obat`");


    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $data_obat[] = $product_item['nama_obat'] . ' (' . $product_item['quantity'] . ') ';
        };
    };
    $total_obat = implode(',', $data_obat);

    $query = mysqli_query($conn, "INSERT INTO transaksi (nama_pasien, diagnosis, tindakan, total_tagihan, total_obat, uang_bayar, tanggal_transaksi) VALUES('$data_pasien', '$data_diagnosis', '$data_tindakan', '$total_tagihan', '$total_obat', '$uang_bayar', '$tanggal_transaksi')");
    if ($query) {
        $update = mysqli_query($conn, "UPDATE tambah_rm SET status = 'selesai' WHERE id_rm = '$id';");
        header('location:transaksi2.php');
    };
};
?>

<?php include 'navbar-farmasih.php'; ?>

                <!-- end navbar -->

                <!-- forms -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">


                                <!-- kembali -->


                                <!-- <a href="tambah-farmasih.php?proses=<?php echo $id ?>" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a> -->
                            </div>

                          
                                <div class="card py-3 shadow-sm text-black">
                                    <form method="POST" action="" enctype="multipart/form-data">

                                        <h2 style="margin-left: 100px;" class="">Data Pasien</h2>
                                        <div class="container" style="margin-left: 100px;">


                                            <span class="mt-2">Nama Pasien : <?php echo $nama; ?></span>
                                            <h2></h2>
                                            <span>Diagnosis : <?php echo $diagnosis; ?></span>
                                            <h2></h2>
                                            <span class="">Tindakan : <?php echo $tindakan; ?></span>
                                            <input type="hidden" name="data_nama" value="<?php echo $nama; ?>">
                                            <input type="hidden" name="data_diagnosis" value="<?php echo $diagnosis; ?>">
                                            <input type="hidden" name="data_tindakan" value="<?php echo $tindakan; ?>">



                                        </div>


                                        <h2 class="mt-4" style="margin-left: 100px;">Data Tagihan</h2>
                                        <div class="container" style="margin-left: 100px;">
                                            <div class="d-flex justify-content-between">
                                                <span class="mt-1">Jenis Tagihan</span>
                                                <span>Biaya Tagihan</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mt-1">Biaya layanan Dokter</span>

                                                <h2></h2>
                                                <span>Rp. <?= number_format($dokter); ?></span>

                                            </div>


                                            <?php
                                            $query = "SELECT * FROM data_obat;";
                                            $sql = mysqli_query($conn, $query);
                                            $tagihan = 0;
                                            $obat = 0;

                                            ?>

                                            <?php while ($tampil = mysqli_fetch_assoc($sql)) {  ?>
                                                <?php
                                                $obat = 0;
                                                $obat = $tampil['harga_obat'] * $tampil['quantity'] ?>
                                                <div class="d-flex justify-content-between">
                                                    <span class="mt-1"><?= $tampil['nama_obat']; ?>
                                                        x<?= $tampil['quantity']; ?></span>
                                                    <span>Rp. <?= number_format($obat); ?></span>
                                                </div>
                                            <?php $tagihan = $dokter += $tampil['harga_obat'] * $tampil['quantity'];
                                            }; ?>

                                            <!-- total tagihan -->
                                            <h2 class=" pb-4 border-bottom"></h2>

                                            <div class="d-flex justify-content-between mb-4">
                                                <span class="fs-5">Total Tagihan</span>
                                                <h2></h2>
                                                <b><span class="fs-5">Rp. <?= number_format($tagihan); ?></span></b>
                                                <input type="hidden" name="total_tagihan" value="<?php echo $tagihan; ?>">

                                            </div>
                                            <div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="fs-5">Uang Bayar</label>
                                                        <input type="number" name="uang_bayar" class="form-control" placeholder="uang bayar" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal Transaksi</label>
                                                        <input type="date-local" class="form-control" name="tanggal" placeholder="Masukan alamat" value="<?= $date ?>" readonly>
                                                    </div>
                                                </div>
                                                <a href="tambah-farmasih.php?proses=<?php echo $id ?>" class="btn btn-danger btn-fill pull-right ms-2"><i class="bi bi-arrow-left-short"></i>Batal</a>

                                                <input type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-fill pull-right ms-2">


                                            </div>
                                    </form>
                                </div>
                            </div>

                        </div>


                    </div>







                    <!--  -->





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

                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>