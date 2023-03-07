<?php 
include 'config.php';
session_start();

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $id_user =  $_SESSION['id_user'];
    $jk = $_POST['jk'];
    $tlp = $_POST['tlp'];
    $tanggal = $_POST['tanggal'];
    $query = mysqli_query($conn, "INSERT INTO tbl_pendaftaran VALUES(NULL, '$id_user', '$nik', '$nama', '$tgl', '$jk', '$tlp', '$tanggal')");
    echo "<script>alert('anda antrian 1');</script>";
    header('location:../index.php');
   
}

?>