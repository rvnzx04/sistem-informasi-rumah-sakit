<?php


$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");
?>


<?php include('navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 text-gray-800">Data Pasien </h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="tambah-pasien.php" type="button" class="btn btn-success">Tambah Pasien</a>
                        </div>
                        <!-- session alert -->
                       
                        <!-- akhir -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama Pasien</th>
                                            <th>Tanggal lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $query = "SELECT * FROM tambah_pasien;";
                                        $sql = mysqli_query($conn, $query);
                                        $no = 1;

                                        ?>
                                        <?php while ($result = mysqli_fetch_assoc($sql)) { ?>


                                            <tr>
                                                <td><?= $no++;?></td>
                                                <td><?= $result['nik']; ?></td>
                                                <td><?= $result['nama']; ?></td>
                                                <td><?= $result['ttl']; ?></td>
                                                <td><?= $result['jk']; ?></td>
                                                <td><?= $result['tanggal_input']; ?></td>

                                                <td class="text-center">

                                                    <!-- Button trigger modal -->
                                                   
                                                    <a href="tambah-pasien.php?ganti=<?php echo $result['id']; ?>" type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></i> Edit</a>
                                                    <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-delete btn-danger" style=""><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                                </td>
                                            </tr>
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

    <!-- Bootstrap core JavaScript-->
    
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/script/jquery.js"></script>

    <script src="../assets/script/sweetalert1.js"></script>

    <script src="../assets/script/alertsa.js"></script>

</body>

</html>