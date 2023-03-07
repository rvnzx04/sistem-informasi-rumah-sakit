<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <meta name="generator" content="Hugo 0.101.0">
  <title>Admin | Login</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/floating-labels/">
  <link rel="stylesheet" href="css/style.css">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
</head>

<body>
 <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
         unset($_SESSION['info']);
    endif;
    ?> 



  <form class="form-signin" method="POST" action="cek-login.php">
    <div class="text-center mb-4">
      <img class="mb-4" src="images/welcome.png" alt="" width="350">
      <h1 class="h3 mb-3 font-weight-normal">Form Login</h1>
      <p>Masukkan Username dan Password anda dengan benar!</p>
    </div>

    <div class="form-label-group">
      <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" required autofocus>
      <label>Masukkan username anda!</label>
    </div>

    <div class="form-label-group">
      <input type="password" name="password" class="form-control" placeholder="Masukkan Password anda!" required>
      <label>Masukkan Password anda!</label>
    </div>

    <div class="form-label-group">
      <select class="form-control" name="level">
        <option value="Admin">Admin</option>
        <option value="Dokter">Dokter</option>
        <option value="Farmasih">Farmasih</option>
      </select>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block float-right" type="submit">Login</button>
    </div>
    </div>
    </div>
  </form>


  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/script/jquery.js"></script>

    <script src="sweetalert.js"></script>

    <script src="alert.js"></script>

</body>

</html>