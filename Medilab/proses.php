<?php
session_start();
include 'config.php';


  if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $id_user =  $_SESSION['id_user'];
    $jk = $_POST['jk'];
    $tlp = $_POST['tlp'];
    $tanggal = $_POST['tanggal'];
    $query = mysqli_query($conn, "INSERT INTO tbl_pendaftaran VALUES(NULL, '$id_user', '$nik', '$nama', '$tgl', '$jk', '$tlp', '$tanggal', 'pending')");
    if ($query) {
      $_SESSION['eksekusi'] = "Silahkan Tunggu Konfirmasi!";
     header('index.php#appointment');
    }
  }


  if (isset($_POST['tambah'])) {


        $id_user = $_POST['id_user'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $kode_pasien = $_POST['kode_pasien'];
        $tlp = $_POST['tlp'];

        $query = "INSERT INTO tambah_berobat2 VALUES(null, '$id_user', '$kode_pasien', '$nik', '$nama', '$spesialis', '$tanggal', '$keterangan', 'pending', '62$tlp')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $_SESSION['eksekusi'] = "Data Berhasil ditambahkan";
            header('location:index.php');
        } else {
            echo $query;
        }
    }




  ?>