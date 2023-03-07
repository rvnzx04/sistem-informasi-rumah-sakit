<?php
include 'config.php';
 
error_reporting(0);
 
session_start();

$pass = md5($_POST['password']);
$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $pass);
$level = mysqli_escape_string($conn, $_POST['level']);

// cek username terdaftar atau tidak

$cek_user = mysqli_query($conn, "SELECT * FROM admin_login WHERE username ='$username' AND level='$level' ");

$user_valid = mysqli_fetch_array($cek_user);



if ($user_valid) {

    if (mysqli_num_rows($cek_user) == 1) {

        if ($password == $user_valid['password']) {
         
            $_SESSION['id_admin'] = $user_valid['id_admin'];
            $_SESSION['username'] = $user_valid['username'];
            $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
            $_SESSION['level'] = $user_valid['level'];
            // uji level
            if ($level == "Admin") {
                $_SESSION['info'] = 'login berhasil admin';
                header('location:menu.php');
            } elseif ($level == "Dokter") {
                $_SESSION['info'] = 'login berhasil';
                header('location:rekam-medis.php');
            } elseif ($level == "Farmasih") {
                $_SESSION['info'] = 'login berhasil';
                header('location:farmasih.php');
            }
        } else {
            $_SESSION['info'] = "password";
            header('location:index.php');
        }
    }
} else {
    $_SESSION['info'] = "login2";
    header('location:index.php');
}
