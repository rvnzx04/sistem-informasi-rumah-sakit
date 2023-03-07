<?php


include 'config.php';

//variabel nim yang dikirimkan form.php
$nik = $_GET['nik'];

//mengambil data
$query = mysqli_query($conn, "SELECT * FROM tambah_pasien2 WHERE nik='$nik'");

$userid = mysqli_fetch_array($query);
$data = array(
            'nama' =>  @$userid['nama'],
            'id_user' =>  @$userid['id_user']
        );
           
//tampil data
echo json_encode($data);
?>


