<?php

//fetch.php;


$connect = new PDO("mysql:host=localhost; dbname=hospital2", "root", "");

if (isset($_POST['query'])) {
    $query = "
 SELECT DISTINCT nik FROM tambah_berobat JOIN spesialis ON (spesialis.id_spesialis = tambah_berobat.spesialis) 
 WHERE nik LIKE '%" . trim($_POST["query"]) . "%'
 ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '';

    foreach ($result as $row) {
        $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">' . $row["nik"] . '</a>
  </li>
  ';
    }

    echo $output;
}

if (isset($_POST['nik'])) {
    $query = "
 SELECT * FROM tambah_berobat JOIN spesialis ON (spesialis.id_spesialis = tambah_berobat.spesialis) 
 WHERE nik = '" . trim($_POST["nik"]) . "' 
 LIMIT 1
 ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '
    <div class="card py-4 ">
    <div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered shadow-sm" id="dataTable" width="100%" cellspacing="0">
            <tr style="background-color:black; color:white;" class="text-center">
           
            <th>Nama</th>
            <th>Tujuan Dokter Berobat</th>
           
            <th>Tanggal Berobat</th>
            </tr>
 ';


    foreach ($result as $row) {
        $output .= '
       <form method="post">
        <tr class="text-black">
        

        <input type="hidden" name="nama" value=' . $row['nama'] . '>
        <td>' . $row["nama"] . '</td>

        <input type="hidden" name="nama" value=' . $row['nama_spesialis'] . '>
        <td>' . $row["nama_spesialis"] . '</td>
        
        <input type="hidden" name="tanggal" value=' . $row['tanggal'] . '>
        <td>' . $row["tanggal"] . '</td>
        </tr>
        </div>
        </div>
        </div> 
        </table> 
        <a href="fetch2.php?id=' . $row['id_berobat'] . '" class="btn btn-primary">Pilih Pasien</a>
        </div>
        </form>
        ';
    }




    echo $output;
}
if (isset($_POST['query'])) {
    $query = "
 SELECT DISTINCT nik FROM tambah_berobat2 JOIN spesialis ON (spesialis.id_spesialis = tambah_berobat2.spesialis) 
 WHERE nik LIKE '%" . trim($_POST["query"]) . "%'
 ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '';

    foreach ($result as $row) {
        $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">' . $row["nik"] . '</a>
  </li>
  ';
    }

    echo $output;
}

if (isset($_POST['nik'])) {
    $query = "
 SELECT * FROM tambah_berobat2 JOIN spesialis ON (spesialis.id_spesialis = tambah_berobat2.spesialis) 
 WHERE nik = '" . trim($_POST["nik"]) . "' 
 LIMIT 1
 ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '
    <div class="card py-4 ">
    <div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered shadow-sm" id="dataTable" width="100%" cellspacing="0">
            <tr style="background-color:black; color:white;" class="text-center">
           
 ';





    echo $output;
}




