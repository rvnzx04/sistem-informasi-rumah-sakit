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
$tanggal = '';
$id_pasien;
$tindakan;



if (isset($_GET['tambah'])) {
    $id = $_GET['tambah'];
    $query = "SELECT * FROM tambah_pb WHERE id_pb ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nama_pb'];
}
?>

<?php include('navbar-dokter.php'); ?>

<!-- end navbar -->

<!-- forms -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <?php
                        if (isset($_GET['ganti2'])) {
                        ?>
                            <h4 class="title ">Edit Data Rekam Medis</h4>
                        <?php
                        } else {
                        ?>
                            <h4 class="title ">Tambah Rekam Medis</h4>
                        <?php
                        }
                        ?>



                    </div>
                    <div class="card-body">
                        <div class="content">

                            <form method="POST" action="proses.php" enctype="multipart/form-data">
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
                                            <label>Keluhan</label>
                                            <input type="text" class="form-control" name="keluhan" placeholder="Masukan keluhan" value="" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Diagnosis</label>
                                            <input type="text" class="form-control" name="diagnosis" placeholder="Masukan diagnosis" value="<?php echo $diagnosis; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Resep obat</label>
                                            <input type="text" class="form-control" name="resep" placeholder="Masukan resep obat" value="<?php echo $resep; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tindakan</label>
                                            <select class="form-control" name="tindakan" aria-label="Default select example" value="<?php echo $tindakan; ?>" required>
                                                <?php if (!$tindakan) {
                                                    echo "<option selected> --Pilih tindakan-- </option>";
                                                } else {
                                                    echo "<option value='$tindakan' selected> $tindakan </option> ";
                                                } ?>

                                                <option value="Rawat Inap">Rawat Inap</option>
                                                <option value="Rawat Jalan">Rawat Jalan</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Pemeriksaan</label>
                                            <input type="date-local" class="form-control" name="tanggal" placeholder="Masukan alamat" value="<?= $date ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                if (isset($_GET['ganti2'])) {
                                ?>
                                    <input type="hidden" name="id_rm" value="<?= $id ?>">
                                    <button type="submit" name="aksi4" value="edit4" class="btn btn-primary btn-fill pull-right float-right ms-2" style="float:right;" href="proses.php">Simpan Perubahan</button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" name="aksi5" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;" value="add5">Tambahkan</button>
                                <?php
                                }
                                ?>
                                <a href="rekam-medis.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#id_spesialis').on('change', function() {
                    var id_spesialis = $(this).val();
                    $.ajax({
                        url: 'ambil_data.php',
                        type: "POST",
                        data: {
                            modul: 'sub',
                            id: id_spesialis
                        },
                        success: function(respond) {
                            $("#id_sub").html(respond);
                        },
                        error: function() {
                            alert("Gagal Mengambil Data");
                        }
                    })
                })


            });
        </script>

        </body>

        </html>