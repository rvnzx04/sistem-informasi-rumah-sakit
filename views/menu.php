<?php

require_once "../apps/koneksi.php";
include('navbar.php');

?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <!-- Content Pasien -->
    <div class="row">

        <?php
        $select_rows = mysqli_query($conn, "SELECT * FROM `tambah_pasien`") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);
        ?>

        <!-- count dokter -->
        <?php

        $select_rows2 = mysqli_query($conn, "SELECT * FROM `tambah_dokter`") or die('query failed');
        $row_count2 = mysqli_num_rows($select_rows2);

        ?>

        <!-- count obat -->
        <?php

        $select_rows3 = mysqli_query($conn, "SELECT * FROM `tambah_obat`") or die('query failed');
        $row_count3 = mysqli_num_rows($select_rows3);

        ?>
        <?php

        $select_rows4 = mysqli_query($conn, "SELECT * FROM `transaksi`") or die('query failed');
        $row_count4 = mysqli_num_rows($select_rows4);

        ?>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="pasien.php">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Pasien</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_count ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-fill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="dokter.php">
                <div class="card border-left-warning shadow h-100 py-2">

                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Dokter</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_count2 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-workspace fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="obat.php">
                <div class="card border-left-success shadow h-100 py-2">

                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Obat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_count3 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-capsule fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="laporan.php">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Transaksi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_count4 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-currency-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="data-berobat.php">
                <div class="card border-left-success shadow h-100 py-2">

                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Pasien Berobat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row_count3 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-lines-fill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/script/jquery.js"></script>

    <script src="../assets/script/sweetalert.js"></script>

    <script src="../assets/script/alert.js"></script>