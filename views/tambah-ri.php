<?php
include 'config.php';

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



if (isset($_GET['proses'])) {
    $id = $_GET['proses'];
    $query = "SELECT * FROM tambah_rm WHERE id_rm ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nm_pasien'];
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
                      
                            <h4 class="title ">Tambah Rawat Inap</h4>
                       



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
                                            <label>Kelas Kamar</label>
                                            <select class="form-control" name="kelas" id="kelas" class="form-control" onchange='changeValue(this.value)' aria-label="Default select example" required > 
                                                <option value=""> --Pilih Kelas Kamar-- </option>
                                                <?php
                                                 $query = mysqli_query($conn, "SELECT * FROM rawat_inap ORDER BY id_ri ASC") or die(mysqli_error($conn));
                                                 $result = mysqli_query($conn, "SELECT * FROM rawat_inap");  
                                                 $a          = "var harga = new Array();\n;";  
                                                
                                                 while ($row = mysqli_fetch_array($result)) {  
                                                    echo '<option name="kelas" value="' . $row['id_ri'] . '">' . $row['kelas_kamar'] . '</option>';
                                                    $a .= "harga['" . $row['id_ri'] . "'] = {harga:'Rp." . addslashes(number_format($row['harga_kamar'], 0, ',', '.'))."'};\n";  
                                                 
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Harga kamar</label>
                                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Kamar" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jumlah Kamar</label>
                                            <input type="text" class="form-control" name="jumlah_kamar" placeholder="1" value="1" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal input</label>
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

        <script type="text/javascript">   
                          <?php   
                          echo $a;   
                           ?>  
                          function changeValue(id){  
                            document.getElementById('harga').value = harga[id].harga;  
                         
                          };  
                          </script>  

        </body>

        </html>