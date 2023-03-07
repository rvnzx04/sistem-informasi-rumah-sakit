<?php
session_start();
require_once "../apps/koneksi.php";

if (isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tlp = $_POST['tlp'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_registrasi WHERE email = '$email'"));
    if ($cek > 0) {
        $_SESSION['error'] = "Akun telah tersedia, <b>Silahkan Login</b>";
        header('location:registrasi.php');
    } else {
        $query = mysqli_query($conn, "INSERT INTO tbl_registrasi VALUES(NULL, '$nama', '$email', '$tlp', '$alamat', '$password')");
        $_SESSION['eksekusi'] = "Registrasi Berhasil";
        header('location:index.php');
    }
}
