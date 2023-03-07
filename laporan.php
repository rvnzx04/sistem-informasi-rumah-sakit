<?php
include 'config.php';
$active = 'laporan';
$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");
?>

<?php include('navbar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <form method="POST">

                        <div class="card py-4 shadow-sm">
                            <h4 class="text-center">CARI BERDASARKAN TANGGAL</h4>
                            <h2 class=" pb-4 border-bottom"></h2>
                            <tr>
                                <center>
                                    <div class="col-md-2 waktu">
                                        <div class="form-group">
                                            <label>DARI TANGGAL : </label>
                                            <td class="btn"><input type="date" class="form-control" name="dari_tgl" required="required"></td>
                                        </div>
                                    </div>
                                    <div class="col-md-2 waktu ">
                                        <div class="form-group ">
                                            <label> SAMPAI TANGGAL : </label>

                                            <td class="btn"><input type="date" class="form-control" name="sampai_tgl" required="required">
                                            </td>
                                        </div>
                                        <input href="" type="submit" name="filter" value="Filter" class="btn btn-primary btn-fill pull-right mb-4"></input>
                                    </div>
                                </center>

                            </tr>
                        </div>

                    </form>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-3   ">
                        <div class="card-header py-3 mb-2">
                            <h4 class="title">Data Transaksi</h4>
                        </div>

                        <!-- session alert -->

                        <!-- akhir -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Tindakan</th>
                                            <th>Total Obat</th>
                                            <th>Total Biaya</th>
                                            <th>Tanggal Pembayaran</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        $total = 0;

                                        if (isset($_POST['filter'])) {
                                            $dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
                                            $sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
                                            $data_brg = mysqli_query($conn, "SELECT * FROM `transaksi` WHERE tanggal_transaksi BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                                        } else {

                                            $data_brg = mysqli_query($conn, "SELECT * FROM `transaksi`");
                                        }
                                        while ($result = mysqli_fetch_array($data_brg)) {
                                        ?>




                                            <tr>
                                                <td class=""><?= $no++; ?></td>
                                                <td><?= $result['nama_pasien']; ?></td>
                                                <td><?= $result['tindakan']; ?></td>
                                                <td><?= $result['total_obat']; ?></td>
                                                <td>Rp. <?= number_format($result['total_tagihan'], 0, ',', '.'); ?></td>
                                                <td><?= $result['tanggal_transaksi']; ?></td>

                                            </tr>


                                        <?php
                                            $total += $result['total_tagihan'];
                                        } ?>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                            <th style="font-size:large;">Total Pendapatan:</th>
                                            <th>Rp. <span name="total_belanja" id="total_belanja"><?php echo number_format($total, 0, ',', '.'); ?></span></th>
                                        </tr>
                                        </tbody>
                                    </tfoot>
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
                        <span>Copyright &copy; Website By Fardan</span>
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

</html>