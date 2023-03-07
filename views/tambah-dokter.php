<?php
include 'config.php';
session_start();


$id = '';
$nama = '';
$spesialis = '';
$sub_spesialis = '';
$jadwal = '';
$jam = '';
$id_spesialis;
$id_sub_spesialis;

if (isset($_GET['ubah2'])) {
    $id = $_GET['ubah2'];
    $query = "SELECT * FROM tambah_dokter JOIN sub_spesialis ON (sub_spesialis.id=tambah_dokter.id_sub) JOIN spesialis ON (spesialis.id_spesialis=sub_spesialis.id_spesialis) WHERE id_dokter ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nama'];
    $spesialis = $result['nama_spesialis'];
    $sub_spesialis = $result['nama_sub'];
    $jadwal = $result['jadwal'];
    $jam = $result['jam'];
    $id_spesialis = $result['id_spesialis'];
    $id_sub_spesialis = $result['id_sub'];
}
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
                                        <?php
                                        if (isset($_GET['ubah2'])) {
                                        ?>
                                            <h4 class="title ">Edit Data Dokter</h4>
                                        <?php
                                        } else {
                                        ?>
                                            <h4 class="title ">Tambah Dokter</h4>
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
                                                            <label>Nama Dokter</label>
                                                            <input type="text" class="form-control" name="nama" placeholder="Masukan nama" value="<?php echo $nama; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Spesialis</label>
                                                            <select class="form-control" name="spesialis" id="id_spesialis" aria-label="Default select example" required>
                                                                <?php if (!$spesialis) {
                                                                     echo "<option selected> --Pilih Spesialis-- </option>";
                                                                } else {
                                                                    echo "<option value='$id_spesialis' selected> $spesialis </option> ";
                                                                } ?>
                                                                <!-- mengambil data di database -->
                                                                <?php
                                                                $sql = mysqli_query($conn, "SELECT * FROM spesialis ORDER BY nama_spesialis ASC") or die(mysqli_error($conn));
                                                                while ($dt = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                <?php if ($dt['id_spesialis'] != $id_spesialis) : ?>
                                                                    <option value="<?php echo $dt['id_spesialis']?>"><?php 
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
                                                            <label>Sub Spesialis</label>
                                                            <select class="form-control" name="id_sub" id="id_sub" aria-label="Default select example" >
                                                      
                                                                <?php if ($sub_spesialis) {
                                                                    echo "<option value='$id_sub_spesialis' selected> $sub_spesialis </option> ";
                                                                } else {
                                                                    echo "<option selected> --Pilih Sub Spesialis-- </option>";
                                                                } ?>
                                                                <?php
                                                                $sql = mysqli_query($conn, "SELECT * FROM sub_spesialis WHERE id_spesialis = '$id_spesialis' ORDER BY nama_sub ASC") or die(mysqli_error($conn));
                                                                while ($dt = mysqli_fetch_array($sql)) {
                                                                ?>
?>
                                                                <?php if ($dt['id'] != $id_sub_spesialis) : ?>
                                                                    <option value="<?php echo $dt['id']?>"><?php 
                                                                        echo $dt['nama_sub'];
                                                                    ?> 
                                                                </option><?php endif; ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Jadwal Praktek</label>
                                                            <select class="form-control" name="jadwal" aria-label="Default select example" required>

                                                                <option <?php if ($jadwal == 'Senin sd Jumat') {
                                                                            echo "selected";
                                                                        } ?> value="Senin sd Jumat">Senin sd Jumat</option>
                                                                <option <?php if ($jadwal == 'Selasa') {
                                                                            echo "selected";
                                                                        } ?> value="Selasa">Selasa</option>
                                                                <option <?php if ($jadwal == 'Senin dan Rabu') {
                                                                            echo "selected";
                                                                        } ?> value="Senin dan Rabu">Senin dan Rabu</option>
                                                                <option <?php if ($jadwal == 'Senin, Rabu dan Jumat') {
                                                                            echo "selected";
                                                                        } ?> value="Senin, Rabu dan Jumat">Senin, Rabu dan Jumat</option>
                                                                <option <?php if ($jadwal == 'Selasa dan Rabu') {
                                                                            echo "selected";
                                                                        } ?> value="Selasa dan Rabu">Selasa dan Rabu</option>
                                                                <option <?php if ($jadwal == 'Rabu dan Kamis') {
                                                                            echo "selected";
                                                                        } ?> value="Rabu dan Kamis">Rabu dan Kamis</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Jam Praktek</label>
                                                            <select class="form-control" name="jam" aria-label="Default select example" required>

                                                                <option <?php if ($jam == '08.00 sd 12.00') {
                                                                            echo "selected";
                                                                        } ?> value="08.00 sd 12.00">08.00 sd 12.00</option>
                                                                <option <?php if ($jam == '09.00 sd 14.00') {
                                                                            echo "selected";
                                                                        } ?> value="09.00 sd 14.00">09.00 sd 14.00</option>
                                                                <option <?php if ($jam == '10.00 sd 13.00') {
                                                                            echo "selected";
                                                                        } ?> value="10.00 sd 13.00">10.00 sd 13.00</option>
                                                                <option <?php if ($jam == '12.00 sd 14.00') {
                                                                            echo "selected";
                                                                        } ?> value="12.00 sd 14.00">12.00 sd 14.00</option>
                                                                <option <?php if ($jam == '08.00 sd 10.00') {
                                                                            echo "selected";
                                                                        } ?> value="08.00 sd 10.00">08.00 sd 10.00</option>
                                                                <option <?php if ($jam == '18.00 sd 21.00') {
                                                                            echo "selected";
                                                                        } ?> value="18.00 sd 21.00">18.00 sd 21.00</option>
                                                                <option <?php if ($jam == '20.00 sd 24.00') {
                                                                            echo "selected";
                                                                        } ?> value="20.00 sd 24.00">20.00 sd 24.00</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Foto Dokter</label>
                                                            <input <?php if (!isset($_GET['ubah2'])) {
                                                                        echo "required";
                                                                    } ?> class="form-control" name="foto" type="file" id="foto" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                if (isset($_GET['ubah2'])) {
                                                ?>
                                                    <input type="hidden" name="id_dokter" value="<?= $id ?>">
                                                    <button type="submit" name="aksi3" value="edit3" class="btn btn-primary btn-fill pull-right float-right ms-2" style="float:right;" href="proses.php">Simpan Perubahan</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button type="submit" name="aksi3" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;" value="add3" href="proses.php">Tambahkan</button>
                                                <?php
                                                }
                                                ?>
                                                <a href="dokter.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>

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