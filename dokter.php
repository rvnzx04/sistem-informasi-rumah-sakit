<?php
$active = 'pasien';
include 'config.php';


?>



<?php include('navbar.php'); ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dokter</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="tambah-dokter.php" type="button" class="btn btn-primary">Tambah Dokter</a>
        </div>
        <!-- session alert -->
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
        <!-- akhir -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>Sub Spesialis</th>
                            <th>Jadwal Dokter</th>
                            <th>Jam Dokter</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $query = "SELECT * FROM tambah_dokter JOIN sub_spesialis ON (sub_spesialis.id = tambah_dokter.id_sub) JOIN spesialis ON (spesialis.id_spesialis = tambah_dokter.id_spesialis)";
                        $sql = mysqli_query($conn, $query);
                        $no = 1;

                        // var_dump($sql)

                        ?>
                        <?php while ($result = mysqli_fetch_assoc($sql)) { ?>


                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="images/<?php echo $result['foto']; ?>" width="90px"></td>
                                <td><?= $result['nama'];    ?></td>
                                <td><?= $result['nama_spesialis'] ?></td>
                                <td><?= $result['nama_sub'] ?></td>
                                <td><?= $result['jadwal']; ?></td>
                                <td><?= $result['jam']; ?> </td>

                                <td class="text-center">


                                    <!-- Button trigger modal -->
                                    <a href="tambah-dokter.php?ubah2=<?php echo $result['id_dokter']; ?>" type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></i> Edit</a>
                                    <a href="proses.php?delete3=<?php echo $result['id_dokter']; ?>" type="button" class="btn btn-danger" style="" onclick="return confirm('Apakah anda yakin ingin menghapus???')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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

</html>