<?php
session_start();
include_once("../apps/base_url.php");
include_once("../apps/koneksi.php");

// if (!isset($_SESSION['username'])) {
//     header('location:../index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
     <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title> </title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');



        * {
            font-family: 'Poppins', sans-serif;
        }

        @media print {

            .print,
            .navbar {
                display: none;
            }

            .container {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    
   
     <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
        <?php
        unset($_SESSION['info']);
    endif;
   
    ?>
   