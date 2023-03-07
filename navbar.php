<?php
session_start();
require_once "config.php";
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Hospital</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font.css">



    <!-- icon bootsrap -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- jquery -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>

<body id="page-top">

    <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
        unset($_SESSION['info']);
    endif;
    ?>





    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav - sidebar sidebar-dark accordion" style="background-color: #20B2AA; color:white;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <i class="fas fa-stethoscope"></i>
                </div>
                <div class="sidebar-brand-text mx-3 fs-5">Hospital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  <?= $active == 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="menu.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="text-white">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                semua data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item  <?= $active == 'pasien' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Super Admin</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Semua Data</h6>
                        <a class="collapse-item" href="pasien.php">Pasien</a>
                        <a class="collapse-item" href="obat.php">Obat</a>
                        <a class="collapse-item" href="kamar.php">Kamar</a>
                        <a class="collapse-item" href="dokter.php">Dokter</a>

                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                lainnya
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item  <?= $active == 'berobat' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-clinic-medical"></i>
                    <?php
                    $select_rows = mysqli_query($conn, "SELECT * FROM tambah_berobat2 WHERE status ='pending';") or die('query failed');
                    $jumlah = mysqli_num_rows($select_rows);
                    ?>
                    <?php if ($jumlah >= 1) { ?>
                        <span>Berobat <span class="badge badge-danger"><?= $jumlah; ?></span> </span>

                    <?php } else { ?>
                        <span>Berobat </span>
                    <?php   } ?>
                </a>


                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Semua data:</h6>

                        <?php if ($jumlah >= 1) { ?>
                            <a class="collapse-item" href="konfirmasi_berobat.php">Konfirmasi <span class="badge badge-danger"><?= $jumlah; ?></span></a>
                        <?php } else { ?>
                            <a class="collapse-item" href="rawat-inap.php">Konfirmasi <span class="badge badge-danger"></span></a>
                        <?php   } ?>
                        <a class="collapse-item" href="data-berobat.php">Tambah Berobat</a>
                        <a class="collapse-item" href="berobat.php">Berobat</a>
                       

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <?php
            $select_rows = mysqli_query($conn, "SELECT * FROM tbl_pendaftaran WHERE status ='pending';") or die('query failed');
            $row_count99 = mysqli_num_rows($select_rows);
            ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item  <?= $active == 'online' ? 'active' : '' ?>">
                <a class="nav-link" href="daftar_online.php">
                <i class="fas fa-user-alt"></i>
                    <?php if ($row_count99 >= 1) { ?>
                        <span>Pendaftaran Online <span class="badge badge-danger"><?= $row_count99; ?></span> </span>

                    <?php } else { ?>
                        <span>Pendaftaran Online </span>
                    <?php   } ?>
                </a>
            </li>

            <!-- Divider -->

            <?php
            $select_rows = mysqli_query($conn, "SELECT * FROM tambah_rm2 WHERE tindakan='Rawat Inap' AND status ='pending';") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
            ?>




            <li class="nav-item <?= $active == 'rawat_inap' ? 'active' : '' ?> ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-procedures"></i>


                    <?php if ($row_count >= 1) { ?>
                        <span>Rawat Inap <span class="badge badge-danger"><?= $row_count; ?></span> </span>

                    <?php } else { ?>
                        <span>Rawat Inap </span>
                    <?php   } ?>

                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Rawat Inap: </h6>
                        <?php if ($row_count >= 1) { ?>
                            <a class="collapse-item" href="rawat-inap.php">Konfirmasi <span class="badge badge-danger"><?= $row_count; ?></span></a>
                        <?php } else { ?>
                            <a class="collapse-item" href="rawat-inap.php">Konfirmasi <span class="badge badge-danger"></span></a>
                        <?php   } ?>

                        <a class="collapse-item" href="data-kamar.php">Data Kamar Pasien </a>

                    </div>
                </div>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item  <?= $active == 'laporan' ? 'active' : '' ?>">
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan</span> </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">

                            <a href="layouts/proses-logout.php" class="btn btn-logout btn-danger float-right"></i> Logout</a>
                        </li>






                </nav>

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