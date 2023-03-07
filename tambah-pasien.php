<?php
include 'config.php';

$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");


// edit data
$id = '';
$nik = '';
$nama = '';
$ttl = '';
$jk = '';
$pekerjaan = '';
$kewarganegaraan = '';
$tlp = '';
$alamat = '';
$tanggal = '';

if (isset($_GET['ganti'])) {
    $id = $_GET['ganti'];
    $query = "SELECT * FROM tambah_pasien WHERE id ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $id = $result['id'];
    $nik = $result['nik'];
    $nama = $result['nama'];
    $ttl = $result['ttl'];
    $jk = $result['jk'];
    $pekerjaan = $result['pekerjaan'];
    $kewarganegaraan = $result['kewarganegaraan'];
    $tlp = $result['tlp'];
    $alamat = $result['alamat'];
}

if (isset($_GET['ganti2'])) {
    $id = $_GET['ganti2'];
    $query = "SELECT * FROM tambah_pasien2 WHERE id_pasien ='$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $id2 = $result['id_pasien'];
    $nik = $result['nik'];
    $nama = $result['nama'];
    $ttl = $result['ttl'];
    $jk = $result['jk'];
    $pekerjaan = $result['pekerjaan'];
    $kewarganegaraan = $result['kewarganegaraan'];
    $tlp = $result['tlp'];
    $alamat = $result['alamat'];
}

// akhir
?>


<?php include('navbar.php'); ?>

<!-- end navbar -->



<?php
if (isset($_GET['ganti2'])) {
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-1">
                        <div class="card-header py-3">
                            <?php
                            if (isset($_GET['ganti2'])) {
                            ?>
                                <h4 class="title ">Edit Data Pasien</h4>
                            <?php
                            } else {
                            ?>
                                <h4 class="title ">Tambah Pasien</h4>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="card-body">
                            <div class="content">

                                <form method="POST" action="proses.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="<?php echo $id2; ?>" name="id_pasien">
                                            <div class="form-group">
                                                <label>NIK/KTP</label>
                                                <input type="number" name="nik" class="form-control" placeholder="Masukan no. NIK/KTP" value="<?php echo $nik; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Masukan nama" value="<?php echo $nama; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tempat, tanggal Lahir</label>
                                                <input type="text" name="ttl" class="form-control" placeholder="Masukan Tempat, tanggal lahir" value="<?php echo $ttl; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" aria-label="Default select example" required>
                                                    <option <?php if ($jk == 'Laki Laki') {
                                                                echo "selected";
                                                            } ?> value="Laki Laki">Laki Laki</option>
                                                    <option <?php if ($jk == 'Perempuan') {
                                                                echo "selected";
                                                            } ?> value="Perempuan">Perempuan</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pekerjaan</label>
                                                <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" value="<?php echo $pekerjaan; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kewarganegaraan</label>
                                                <select class="form-control" name="kewarganegaraan" aria-label="Default select example" required>

                                                    <option <?php if ($kewarganegaraan == 'WNI') {
                                                                echo "selected";
                                                            } ?> value="WNI">WNI</option>
                                                    <option <?php if ($kewarganegaraan == 'WNA') {
                                                                echo "selected";
                                                            } ?> value="WNA">WNA</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No. Telp/HP</label>
                                                <input type="number" class="form-control" name="tlp" placeholder="Masukan no Telp/HP" value="<?php echo $tlp; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat" value="<?php echo $alamat; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control" name="tanggal" value="<?php echo $date; ?>" readonly>
                                        </div>
                                    </div>
                            </div>

                            <!-- form -->
                            <?php
                            if (isset($_GET['ganti2'])) {
                            ?>
                                <button type="submit" name="aksi" value="editt" class="btn btn-primary btn-fill pull-right float-right ms-2" style="float:right;" href="proses.php">Simpan Perubahan</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" name="aksi" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;" value="add" href="proses.php">Tambahkan</button>
                            <?php
                            }
                            ?>
                            <a href="pasien.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>
                            <!--  -->

                            <div class="clearfix"></div>
                            </form>
                        <?php
                    } else {
                        ?>
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card shadow mb-1">
                                                <div class="card-header py-3">
                                                    <?php
                                                    if (isset($_GET['ganti'])) {
                                                    ?>
                                                        <h4 class="title ">Edit Data Pasien</h4>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <h4 class="title ">Tambah Pasien</h4>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="card-body">
                                                    <div class="content">

                                                        <form method="POST" action="proses.php" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                                                                    <div class="form-group">
                                                                        <label>NIK/KTP</label>
                                                                        <input type="number" name="nik" class="form-control" placeholder="Masukan no. NIK/KTP" value="<?php echo $nik; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Lengkap</label>
                                                                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama" value="<?php echo $nama; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Tempat, tanggal Lahir</label>
                                                                        <input type="text" name="ttl" class="form-control" placeholder="Masukan Tempat, tanggal lahir" value="<?php echo $ttl; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                                                        <select class="form-control" name="jk" aria-label="Default select example" required>
                                                                            <option <?php if ($jk == 'Laki Laki') {
                                                                                        echo "selected";
                                                                                    } ?> value="Laki Laki">Laki Laki</option>
                                                                            <option <?php if ($jk == 'Perempuan') {
                                                                                        echo "selected";
                                                                                    } ?> value="Perempuan">Perempuan</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" value="<?php echo $pekerjaan; ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Kewarganegaraan</label>
                                                                        <select class="form-control" name="kewarganegaraan" aria-label="Default select example" required>

                                                                            <option <?php if ($kewarganegaraan == 'WNI') {
                                                                                        echo "selected";
                                                                                    } ?> value="WNI">WNI</option>
                                                                            <option <?php if ($kewarganegaraan == 'WNA') {
                                                                                        echo "selected";
                                                                                    } ?> value="WNA">WNA</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>No. Telp/HP</label>
                                                                        <input type="number" class="form-control" name="tlp" placeholder="Masukan no Telp/HP" value="<?php echo $tlp; ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat" value="<?php echo $alamat; ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Tanggal</label>
                                                                    <input type="text" class="form-control" name="tanggal" value="<?php echo $date; ?>" readonly>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <!-- form -->
                                                    <?php
                                                    if (isset($_GET['ganti'])) {
                                                    ?>
                                                        <button type="submit" name="aksi" value="edit" class="btn btn-primary btn-fill pull-right float-right ms-2" style="float:right;" href="proses.php">Simpan Perubahan</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button type="submit" name="aksi" class="btn btn-primary btn-fill pull-right float-right ms-2 " style="float:right;" value="add" href="proses.php">Tambahkan</button>
                                                    <?php
                                                    }
                                                    ?>
                                                    <a href="pasien.php" type="submit" class="btn btn-danger btn-fill pull-right float-right ">Batal</a>
                                                    <!--  -->

                                                    <div class="clearfix"></div>
                                                    </form>
                                                <?php
                                            }
                                                ?>
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


                                        </body>

                                        </html>