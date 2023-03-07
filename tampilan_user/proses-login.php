<?php
session_start();

require_once "../apps/koneksi.php";


$email = mysqli_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string(
    $conn,
    $_POST['password']
);

$cek_user = mysqli_query($conn, "SELECT * FROM tbl_registrasi WHERE email ='$email'");

$user_valid = mysqli_fetch_array($cek_user);

if($user_valid){

if (mysqli_num_rows($cek_user) == 1) {

    if ($password == $user_valid['password']) {

        $_SESSION['id_user'] = $user_valid['id_registrasi'];
        $_SESSION['user'] = $user_valid['nama'];
        $_SESSION['info'] = "login berhasil";
        header("Location:../Medilab/");
      
        } else {
            $_SESSION['error'] = "Password anda Salah!";
            header('location:index.php');
        }
    }
        } else{
            $_SESSION['error'] = "Username dan password anda salah!";
            header('location:index.php');
}

    
