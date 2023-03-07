<?php
include 'config.php';
$active = 'online';

$no = 1;
?>

<?php include('navbar.php'); ?>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4 class="title">Daftar Online</h4>

        </div>
        <?php if (isset($_SESSION['eksekusi'])) :
        ?>

            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
                <a><?php echo $_SESSION['eksekusi']; ?></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['eksekusi']);
        endif;

        ?>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp/Hp</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM tbl_pendaftaran ORDER BY id_pendaftaran DESC";
                        $sql = mysqli_query($conn, $query);
                        ?>
                        <?php foreach ($sql as $result) { ?>


                            <!-- Button trigger modal -->
                            <?php if ($result['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $result['nik'];    ?></td>
                                    <td><?= $result['nama'];    ?></td>
                                    <td><?= $result['tgl_lahir'];    ?></td>

                                    <td><?= $result['jk'];    ?></td>
                                    <td><?= $result['no_tlp'];    ?></td>
                                    <td><?= $result['tanggal'];    ?></td>

                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum dikonfirmasi</span>

                                    <td class="text-center">
                                        <a href="tambah-ri.php?proses=<?= $no; ?>" type="button" data-toggle="modal" data-target="#staticBackdrop<?= $no; ?>" class="btn btn-primary"><i class="bi bi-box-arrow-in-down-right"></i></a>
                                

                                </tr>
                             <?php } else if ($result['status'] == 'selesai') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $result['nik'];    ?></td>
                                    <td><?= $result['nama'];    ?></td>
                                    <td><?= $result['tgl_lahir'];    ?></td>

                                    <td><?= $result['jk'];    ?></td>
                                    <td><?= $result['no_tlp'];    ?></td>
                                    <td><?= $result['tanggal'];    ?></td>

                                    <td class="text-center">
                                        <span class="badge bg-success">Dikonfirmasi</span>

                                    <td class="text-center">
                                        <a button class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=<?= $result['no_tlp']; ?>&text=Selamat%2C%20Akun Anda Berhasil Di konfirmasi %0D%0A%0D%0ABerikut%20data%20diri%20anda%20%0D%0A1.%20Nama%20%3A%20<?= $result['nama'] ?>%20%0D%0A2.%20tanggal Lahir%20%3A%20<?= $result['tgl_lahir'] ?>%20%0D%0A3.%20Jenis Kelamin%20%3A%20<?= $result['jk'] ?>%20%0D%0A%20%0D%0ATerimakasi Telah mendaftar di Rumah sakit Kami"><i class="bi bi-whatsapp"></i></a>
                                        <?php } ?>
                
           
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop<?= $no; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form action="proses.php" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Pendaftaran online</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_user" value="<?= $result['id_pendaftaran'] ?>">
                                                            <input type="hidden" name="login" value="<?= $result['id_regis'] ?>">

                                                            <label for="" class="col-form-label">Nik </label>
                                                            <input type="number" class="form-control" name="nik" id="" value="<?= $result['nik'] ?>" placeholder="Masukan Nik" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Nama Pasien </label>
                                                            <input type="text" class="form-control" name="nama" id="" value="<?= $result['nama'] ?>" placeholder="Masukan Nama" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Tanggal lahir </label>
                                                            <input type="text" class="form-control" name="tgl" id="" value="<?= $result['tgl_lahir'] ?>" placeholder="Masukan Tangga Lahir" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Jenis Kelamin </label>
                                                            <input type="text" class="form-control" name="jk" id="" value="<?= $result['jk'] ?>" placeholder="Masukan Nama" readonly>
                                                        </div>
                                                      
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">No. Telp/Hp </label>
                                                            <input type="number" class="form-control" name="tlp" id="" value="<?= $result['no_tlp'] ?>" placeholder="Masukan No.Telp/Hp" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Tanggal </label>
                                                            <input type="text" class="form-control" name="tanggal" id="" value="<?= $result['tanggal']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="migrate" class="btn btn-success">Konfirmasi</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- akhir modal -->


                            <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
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
<?php
if (isset($_POST['konfirmasi'])) {
    $id_user = $_POST['acc'];
    $update = mysqli_query($conn, "UPDATE tbl_pendaftaran SET status = 'selesai' WHERE id_pendaftaran = '$id_user';");
}
?>

</html>