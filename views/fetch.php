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
            <th>Nik</th>
            <th>Nama</th>
            <th>Tujuan Dokter Berobat</th>
           
            <th>Tanggal Berobat</th>
            </tr>
 ';


    foreach ($result as $row) {
        $output .= '
       <form method="post">
        <tr class="text-black">
        <input type="hidden" name="nik" value=' . $row['nik'] . '>
        <td>' . $row["nik"] . '</td>

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


if (isset($_POST['kirim'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $ttl = $_POST['ttl'];
    $jk = $_POST['jk'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $tlp = $_POST['tlp'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO tambah_pasien VALUES(null, '$nik', '$nama', '$ttl', '$jk', '$pekerjaan', '$kewarganegaraan', '$tlp', '$alamat', '$tanggal')";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Pasien Baru Berhasil Ditambahkan";
        header('location:pasien.php');
    } else {
        echo $query;
    }
}
