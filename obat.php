<?php
$active = 'pasien';
include 'config.php';
?>



<?php include('navbar.php'); ?>
               

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="tambah-obat.php" type="button" class="btn btn-primary">Tambah obat</a>
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
                                            <th>Foto Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Obat</th>
                                            <th>Kegunaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $query = "SELECT * FROM tambah_obat;";
                                        $sql = mysqli_query($conn, $query);
                                        $no = 1;

                                        ?>
                                        <?php while ($result = mysqli_fetch_assoc($sql)) { ?>


                                            <tr>
                                            <td><?= $no++; ?></td>
                                                <td><img src="images/<?php echo $result['foto']; ?>" width="90px"></td>
                                                <td><?= $result['nama']; ?></td>
                                                <td>Rp.<?= number_format($result['harga'], 0, ',', '.'); ?></td>
                                                <td><?= $result['kegunaan']; ?></td>

                                                <td class="text-center">

                                                    <!-- Button trigger modal -->
                                                    <a href="tambah-obat.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></i> Edit</a>
                                                    <a button class="btn btn-delete btn-danger text-white" href="proses.php?delete=<?php echo $result['id']; ?>" type="button" style="" ><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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

