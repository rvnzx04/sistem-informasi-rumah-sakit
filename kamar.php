<?php
$active = 'pasien';
include 'config.php';
?>

<?php include('navbar.php'); ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kamar</h1>
       

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="tambah-dokter.php" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Tambah Kelas kamar</a>
        </div>

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kelas Kamar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="proses.php" method="POST">
                        <div class="modal-body">

                            <div class="col-12">
                                <label class="form-label">Kelas Kamar</label>
                                <input type="text" class="form-control" name="kelas" id="" value="" required>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" id="" value="" required>
                            </div>

                            <div class="col-12 mt-2">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" id="" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir -->


        <?php

        $ambil_data = $conn->query("SELECT * FROM rawat_inap WHERE stok < 1 ");
        while ($alert = mysqli_fetch_array($ambil_data)) {
            $nama = $alert['kelas_kamar'];

        ?>
            <!-- session alert -->

            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;">
                <strong>Perhatian!</strong> Stok kamar <?= $nama; ?> Telah habis
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
        }

        ?>
        <!-- akhir -->
         <!-- session alert -->
         <?php if (isset($_SESSION['eksekusi'])) :
        ?>

            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
                <a><?php echo $_SESSION['eksekusi']; ?></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            session_destroy();
        endif;

        ?>
        <!-- akhir -->


        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas Kamar</th>
                            <th>Harga kamar</th>
                            <th>Stok</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $query = "SELECT * FROM rawat_inap";
                        $sql = mysqli_query($conn, $query);
                        $no = 1;



                        ?>
                        <?php foreach ($sql as $result) {
                            $id = $result['id_ri'];
                            $stok = $result['stok'];
                            $kelas = $result['kelas_kamar'];
                            if ($stok <= 3) {
                            }
                        ?>



                            <tr>
                                <td><?= $no++; ?></td>

                                <td><?= $result['kelas_kamar'];    ?></td>
                                <td>Rp.<?= number_format($result['harga_kamar']) ?></td>
                                <td><?= $result['stok'] ?></td>


                                <td class="text-center">


                                    <!-- Button trigger modal -->
                                    <a href="tambah-dokter.php?ubah2=<?php echo $result['id_ri']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>" type="button" class="btn btn-primary">+</a>
                                    <a href="tambah-dokter.php?ubah2=<?php echo $result['id_ri']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $no ?>" type="button" class="btn btn-warning text-white"> - </a>
                                    <a href="proses.php?destroy2=<?php echo $result['id_ri']; ?>" type="button" class="btn btn-danger" style="" onclick="return confirm('Apakah anda yakin ingin menghapus???')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                </td>
                            </tr>
                            <!-- modal -->
                            <div class="modal fade" id="exampleModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="simpan-stok.php?stat=tambah" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <div class="col-12">
                                                    <label class="form-label">Stok Kamar</label>
                                                    <input type="number" class="form-control" name="stok" id="" value="<?= $stok ?>" readonly>
                                                </div>





                                                <div class="col-12 mt-2">
                                                    <label class="form-label">Tambah stok</label>
                                                    <input type="number" class="form-control" name="qty" id="">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir -->

                            <!-- modal -->
                            <div class="modal fade" id="exampleModal1<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="simpan-stok.php?stat=kurang" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <div class="col-12">
                                                    <label class="form-label">Stok Kamar</label>
                                                    <input type="number" class="form-control" name="stok" id="" value="<?= $stok ?>" readonly>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label class="form-label">Kurang stok</label>
                                                    <input type="number" class="form-control" name="qty" id="">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir -->


                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

