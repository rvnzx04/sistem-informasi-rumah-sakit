<?php
include 'config.php';



$id = '';
$nama = '';
$harga = '';
$kegunaan = '';

if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];
    $query = "SELECT * FROM tambah_obat WHERE id ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nama'];
    $harga = $result['harga'];
    $kegunaan = $result['kegunaan'];
}
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
                                        if (isset($_GET['ubah'])) {
                                        ?>
                                            <h4 class="title ">Edit Data Obat</h4>
                                        <?php
                                        } else {
                                        ?>
                                            <h4 class="title ">Tambah Obat</h4>
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
                                                        <div class="form-group">
                                                            <label>Nama Obat</label>
                                                            <input type="text" class="form-control" name="nama" placeholder="Masukan nama" value="<?php echo $nama; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Harga Obat</label>
                                                            <input type="number" class="form-control" name="harga" placeholder="Masukan harga" value="<?php echo $harga; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Kegunaan</label>
                                                            <input type="text" class="form-control" name="kegunaan" placeholder="kegunaan" value="<?php echo $kegunaan; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Foto Obat</label>
                                                            <input <?php if (!isset($_GET['ubah'])) {
                                                                        echo "required";
                                                                    } ?> class="form-control" name="foto" type="file" id="foto" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                if (isset($_GET['ubah'])) {
                                                ?>
                                                    <button type="submit" name="aksi2" value="edit2" class="btn btn-primary btn-fill pull-right float-right ms-2" style="float:right;" href="proses.php">Simpan Perubahan</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button type="submit" name="aksi2" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;" value="add2" href="proses.php">Tambahkan</button>
                                                <?php
                                                }
                                                ?>
                                                <a href="obat.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end forms -->

                                <!-- End of Footer -->

                            </div>
                            <!-- End of Content Wrapper -->

                        </div>
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