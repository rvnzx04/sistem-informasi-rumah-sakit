<?php
session_start();
require_once "../apps/koneksi.php";
include_once("../apps/base_url.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pasien</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/style.css">

</head>

<body class="overflow-hidden">
    <!-- Alert -->



    <div class="container">
        <center>
            <img src="../images/Logo3.png" class=" mb-3" style="margin-top: 150px;" alt="" width="250">
            <form action="proses-login.php" method="POST">
                <small style="font-style: italic;">Masukan email dan password dengan benar!</small>

                <div class="col-4 mb-3 mt-2">

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

                    <!-- wrong -->
                    <?php if (isset($_SESSION['error'])) :
                    ?>

                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
                            <a><?php echo $_SESSION['error']; ?></a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                        unset($_SESSION['error']);
                    endif;

                    ?>
                    <label for="exampleInputEmail1" class="form-label" style="float: left;">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan email" required>

                </div>
                <div class="col-4 mb-3">
                    <label for="exampleInputPassword1" class="form-label" style="float: left;">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="masukan password" required>
                    <button type="submit" class="btn btn-primary w-100 mt-3" style="float: right;">Login</button>
                    <a href="registrasi.php" class="mt-2" style="float: right;">Registrasi Akun</a>
                </div>


            </form>
        </center>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/script/jquery.js"></script>


    <?php include_once "../layouts/footer.php" ?>

</body>

</html>