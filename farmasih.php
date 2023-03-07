<?php
require_once "apps/koneksi.php";
$no = 1;
include 'navbar-farmasih.php'; 
$data = mysqli_query($conn, "SELECT * FROM tambah_rm2 ORDER BY id_rm2 DESC");
$data2 = mysqli_query($conn, "SELECT * FROM tambah_rm3");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4 class="title">Data Rekam Medis</h4>

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
                            <th>Nama Pasien</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Keluhan</th>
                            <th>Resep Obat</th>
                            <th>Diagnosis</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM tambah_rm ORDER BY id_rm DESC";
                        $sql = mysqli_query($conn, $query);
                        ?>
                        <?php while ($result = mysqli_fetch_assoc($sql)) { ?>


                            <!-- status rawat jalan-->
                            <?php if ($result['tindakan'] == 'Rawat Jalan' and $result['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $result['nm_pasien'];    ?></td>
                                    <td><?= $result['tanggal_rm'];    ?></td>
                                    <td><?= $result['keluhan'];    ?></td>
                                    <td><?= $result['resep'];    ?></td>
                                    <td><?= $result['diagnosis'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum diproses</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="tambah-farmasih.php?proses=<?php echo $result['id_rm']; ?>" type="button" class="btn btn-primary"><i class="bi bi-box-arrow-in-down-right"></i></a>
                                    </td>

                                    <!-- status pulang -->
                                <?php } else if ($result['tindakan'] == 'Pulang' and $result['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $result['nm_pasien'];    ?></td>
                                    <td><?= $result['tanggal_rm'];    ?></td>
                                    <td><?= $result['keluhan'];    ?></td>
                                    <td><?= $result['resep'];    ?></td>
                                    <td><?= $result['diagnosis'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum diproses</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="tambah-farmasih.php?proses=<?php echo $result['id_rm']; ?>" type="button" class="btn btn-primary"><i class="bi bi-box-arrow-in-down-right"></i></a>
                                    </td>

                                    <!-- status selesai -->
                                <?php } else if ($result['tindakan'] == 'Rawat Jalan' or $result['tindakan'] == 'Pulang' and $result['status'] == 'selesai') { ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $result['nm_pasien'];    ?></td>
                                    <td><?= $result['tanggal_rm'];    ?></td>
                                    <td><?= $result['keluhan'];    ?></td>
                                    <td><?= $result['resep'];    ?></td>
                                    <td><?= $result['diagnosis'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Telah diproses</span>
                                    </td>

                                    <td class="text-center">
                                        <span class="border border-1 border-success rounded p-2 text-success fw-bold text-uppercase"> Selesai</span>
                                    </td>

                                <?php } ?>
                                </tr>
                            <?php } ?>

                            <?php
                            foreach($data2 as $row2){
                            ?>
                             <?php if ($row2['tindakan'] == 'Rawat Jalan' and $row2['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row2['nama_ps'];    ?></td>
                                    <td><?= $row2['tanggal'];    ?></td>
                                    <td><?= $row2['keluhan_ps'];    ?></td>
                                    <td><?= $row2['resep_obat'];    ?></td>
                                    <td><?= $row2['diagnosis_ps'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum diproses</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="tambah-farmasih2.php?proses=<?php echo $row2['id_rm2']; ?>" type="button" class="btn btn-primary"><i class="bi bi-box-arrow-in-down-right"></i></a>
                                    </td>

                                    <!-- status pulang -->
                                <?php } else if ($row2['tindakan'] == 'Pulang' and $row2['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row2['nama_ps'];    ?></td>
                                    <td><?= $row2['tanggal'];    ?></td>
                                    <td><?= $row2['keluhan_ps'];    ?></td>
                                    <td><?= $row2['resep_obat'];    ?></td>
                                    <td><?= $row2['diagnosis_ps'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum diproses</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="tambah-farmasih2.php?proses=<?php echo $row2['id_rm2']; ?>" type="button" class="btn btn-primary"><i class="bi bi-box-arrow-in-down-right"></i></a>
                                    </td>

                                    <!-- status selesai -->
                                <?php } else if ($row2['tindakan'] == 'Rawat Jalan' or $row2['tindakan'] == 'Pulang' and $row2['status'] == 'selesai') { ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row2['nama_ps'];    ?></td>
                                    <td><?= $row2['tanggal'];    ?></td>
                                    <td><?= $row2['keluhan_ps'];    ?></td>
                                    <td><?= $row2['resep_obat'];    ?></td>
                                    <td><?= $row2['diagnosis_ps'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Telah diproses</span>
                                    </td>

                                    <td class="text-center">
                                        <span class="border border-1 border-success rounded p-2 text-success fw-bold text-uppercase"> Selesai</span>
                                    </td>

                                <?php } ?>
                                </tr>


                                <?php
                            foreach($data2 as $row2){
                            ?>
                             <?php if ($row2['tindakan'] == 'Rawat Jalan' and $row2['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row2['nama_ps'];    ?></td>
                                    <td><?= $row2['tanggal'];    ?></td>
                                    <td><?= $row2['keluhan_ps'];    ?></td>
                                    <td><?= $row2['resep_obat'];    ?></td>
                                    <td><?= $row2['diagnosis_ps'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum diproses</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="tambah-farmasih2.php?proses=<?php echo $row2['id_rm2']; ?>" type="button" class="btn btn-primary"><i class="bi bi-box-arrow-in-down-right"></i></a>
                                    </td>

                                    <!-- status pulang -->
                                <?php } else if ($row2['tindakan'] == 'Pulang' and $row2['status'] == 'pending') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row2['nama_ps'];    ?></td>
                                    <td><?= $row2['tanggal'];    ?></td>
                                    <td><?= $row2['keluhan_ps'];    ?></td>
                                    <td><?= $row2['resep_obat'];    ?></td>
                                    <td><?= $row2['diagnosis_ps'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Belum diproses</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="tambah-farmasih2.php?proses=<?php echo $row2['id_rm2']; ?>" type="button" class="btn btn-primary"><i class="bi bi-box-arrow2-in-down-right"></i></a>
                                    </td>

                                    <!-- status selesai -->
                                <?php } else if ($row2['tindakan'] == 'Rawat Jalan' or $row2['tindakan'] == 'Pulang' and $row2['status'] == 'selesai') { ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row2['nama_ps'];    ?></td>
                                    <td><?= $row2['tanggal'];    ?></td>
                                    <td><?= $row2['keluhan_ps'];    ?></td>
                                    <td><?= $row2['resep_obat'];    ?></td>
                                    <td><?= $row2['diagnosis_ps'];    ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Telah diproses</span>
                                    </td>

                                    <td class="text-center">
                                        <span class="border border-1 border-success rounded p-2 text-success fw-bold text-uppercase"> Selesai</span>
                                    </td>

                                <?php } ?>
                                </tr>
                            <?php } }?>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</html>