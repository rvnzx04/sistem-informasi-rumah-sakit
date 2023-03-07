<?php $title = 'Registrasi';
include("../layouts/header.php");
?>


<div class="container d-flex justify-content-between">
    <img src="../images/logo4.png" class=" mb-3" style="margin-top: 150px;" alt="" width="500">
    <form action="proses.php" method="POST">

        <h3 style="margin-top: 150px;" class="mb-3">Registrasi Akun</h3>
        <?php if (isset($_SESSION['error'])) :
        ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert" ><i class="bi bi-check2"></i>
                <a><?php echo $_SESSION['error']; ?></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['error']);
        endif;

        ?>
        <div class="col-12 mb-3 mt-2">
            <label for="exampleInputEmail1" class="form-label" style="float: left;">Nama</label>
            <input type="text" class="form-control" name="nama" id="" aria-describedby="emailHelp" placeholder="masukan username" required>
        </div>
        <div class="col-12 mb-3 mt-2">
            <label for="" class="form-label" style="float: left;">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp" placeholder="masukan email" required>
        </div>
        <div class="col-12 mb-3 mt-2">
            <label for="" class="form-label" style="float: left;">No. Telp</label>
            <input type="number" class="form-control" name="tlp" id="" aria-describedby="emailHelp" placeholder="masukan no.telp" required>
        </div>
        <div class="col-12 mb-3 mt-2">
            <label for="" class="form-label" style="float: left;">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="" aria-describedby="emailHelp" placeholder="masukan alamat" required>
        </div>
        <div class="col-12 mb-3">
            <label for="exampleInputPassword1" class="form-label" style="float: left;">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="masukan password" required>
            <button type="submit" class="btn btn-primary w-100 mt-3" name="add" style="float: right;">Registrasi Akun</button>
            <a href="index.php" class="mt-2" style="float: left;">Login Akun</a>
        </div>

    </form>

</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/script/jquery.js"></script>
<?php include_once "../layouts/footer.php" ?>