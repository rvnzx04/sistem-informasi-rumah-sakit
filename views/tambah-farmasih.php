<?php
include 'config.php';
session_start();
$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");
$no = 1;




$id = '';
$nama = '';
$keluhan = '';
$diagnosis = '';
$resep = '';
$tindakan = '';
$tanggal = '';
$id_pasien;
$tindakan;



if (isset($_GET['proses'])) {
    $id = $_GET['proses'];
    $query = "SELECT * FROM tambah_rm  WHERE id_rm ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nm_pasien'];
    $keluhan = $result['keluhan'];
    $diagnosis = $result['diagnosis'];
    $resep = $result['resep'];
    $tindakan = $result['tindakan'];
    $tanggal = $result['tanggal'];
    $id_pasien = $result['id_rm'];
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
?>

<?php include 'navbar-farmasih.php'; ?>
<!-- end navbar -->

<!-- forms -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-3 ">
                    <div class="card-header py-3 d-flex justify-content-between text-black">

                        <h4 class="title ">Data Pasien</h4>
                        <a href="farmasih.php" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="card-body text-black">
                        <div class="content">

                            <form method="POST" action="proses.php" enctype="multipart/form-data">
                                <div class="row">


                                    <span>Nama Pasien : <?php echo $nama; ?></span>
                                    <h2></h2>
                                    <span>Keluhan : <?php echo $keluhan; ?></span>
                                    <h2></h2>
                                    <span>Diagnosis : <?php echo $diagnosis; ?></span>
                                    <h2></h2>
                                    <span>Resep Obat : <?php echo $resep; ?></span>
                                    <h2></h2>
                                    <span>Tindakan : <?php echo $tindakan; ?></span>
                                    <h2></h2>


                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3 text-black">

                                <h4 class="title ">DATA OBAT</h4>
                            </div>
                            <div class="card-body text-black">
                                <div class="content">

                                    <!-- <form method="POST" action="proses.php" enctype="multipart/form-data"> -->
                                    <span>PILIH OBAT : </span>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cari Obat <i class="bi bi-search"></i>

                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Data Obat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">

                                                        <!-- Page Heading -->



                                                        <!-- akhir -->

                                                        <div class="card text-black ">
                                                            <div class="table-responsive">
                                                                <table class="table align-middle table-bordered" id="dataTable" width="" cellspacing="0">
                                                                    <thead>
                                                                        <tr class="text-black">
                                                                            <th>No</th>
                                                                            <th>Nama Obat</th>
                                                                            <th>Harga Obat</th>
                                                                            <th>Aksi</th>


                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php

                                                                        $query = "SELECT * FROM tambah_obat;";
                                                                        $sql = mysqli_query($conn, $query);

                                                                        ?>
                                                                        <?php while ($result = mysqli_fetch_assoc($sql)) { ?>


                                                                            <tr class="text-black">
                                                                                <form action="" method="post">
                                                                                    <td><?= $no++; ?></td>
                                                                                    <td><?= $result['nama']; ?></td>
                                                                                    <td><?= $result['harga']; ?></td>

                                                                                    <input type="hidden" name="nama_obat" value="<?php echo $result['nama']; ?>">
                                                                                    <input type="hidden" name="harga_obat" value="<?php echo $result['harga']; ?>">



                                                                                    <td class="text-center">

                                                                                        <!-- Button trigger modal -->


                                                                                        <button type="submit" name="add" class="btn btn-success"><i class="bi bi-plus-square"></i></button>

                                                                                    </td>
                                                                                </form>
                                                                            </tr>
                                                                        <?php } ?>


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div> <br><br><br>


                                    <div class="card ">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-bordered">
                                                <thead>
                                                    <tr class="text-center text-black">
                                                        <th>No.</th>
                                                        <th>Nama Obat</th>
                                                        <th>Harga Obat</th>
                                                        <th>Jumlah</th>
                                                        <th>Aksi</th>
                                                        <th>Subharga</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <!-- menampilkan produk yang di beli berdasarkan id roduk -->
                                                    <?php $query = "SELECT * FROM data_obat;";
                                                    $grand_total = 0;
                                                    $sql = mysqli_query($conn, $query);
                                                    $cek = mysqli_num_rows($sql);
                                                    $num = 1;
                                                    ?>
                                                    <?php while ($result = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                        <?php $sub_total = 0;
                                                        $quantity = 1;

                                                        ?>
                                                        <?php $sub_total = $result['harga_obat'] * $result['quantity'] ?>

                                                        <tr class="text-center text-black">

                                                            <td><?= $num++; ?></td>
                                                            <td><span name="name" id="name"><?php echo $result['nama_obat']; ?></span></td>
                                                            <td>Rp. <span name="harga" id="harga"><?php echo number_format($result['harga_obat'], 0, ',', '.'); ?></span></td>
                                                            <td><b><span name="jumlah" style="font-size:20px;" id="jumlah"><?php echo $result['quantity']; ?></span></b>
                                                            <td class="text-center">

                                                                <form action="" method="post">
                                                                    <input type="hidden" name="update_quantity_id" value="<?php echo $result['id_obat']; ?>">
                                                                    <input type="number" name="update_quantity" min="1" class="col-2">
                                                                    <input type="submit" href="" class="btn btn-success" value="Update" name="update_update_btn">
                                                                </form>
                                                            </td>
                                                            <td>Rp. <span name="subharga" id="subharga"><?php echo number_format($sub_total, 0, ',', '.'); ?></td>
                                                            <td>
                                                                <form action="" method="post">
                                                                    <input type="hidden" name="hapus_id" value="<?php echo $result['id_obat']; ?>">
                                                                    <input type="submit" href="" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus???')" value="Hapus" name="hapus5">

                                                        </tr>
                                                        </td>
                                                        </form>

                                                    <?php
                                                        $grand_total += $result['harga_obat'] * $result['quantity'];
                                                    }; ?>

                                                <tfoot>
                                                    <tr class="text-black">
                                                        <th colspan="4">
                                                        <th class="text-center">Total Harga:</th>
                                                        <th class="text-center">Rp. <span name="total_belanja" id="total_belanja"><?php echo number_format($grand_total, 0, ',', '.'); ?></span></th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">
                                                        <th class="text-center"><a href="transaksi.php?transaksi=<?php echo $id ?>" class="btn btn-primary "><i class="bi bi-check-lg"></i> Selesai</a></th>
                                                    </tr>
                                                </tfoot>
                                                </form>
                                            </table>
                                            </tbody>









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