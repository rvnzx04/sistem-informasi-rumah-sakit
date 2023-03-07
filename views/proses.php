<?php
include 'config.php';
session_start();

// saat klik tombol add otomatis menambahkan data ke database
if (isset($_POST['aksi'])) {
    if ($_POST['aksi']  == "add") {

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
            $_SESSION['info'] = 'simpan';
            header('location:pasien.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_POST['aksi'])) {
    if ($_POST['aksi']  == "edit") {


        // 
        $id = $_POST['id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $pekerjaan = $_POST['pekerjaan'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $tlp = $_POST['tlp'];
        $alamat = $_POST['alamat'];
      


        $query1 = "SELECT * FROM tambah_pasien WHERE id ='$id';";
        $sqlshow = mysqli_query($conn, $query1);
        $result = mysqli_fetch_assoc($sqlshow);

        $query2 = "UPDATE tambah_pasien SET nik='$nik', nama='$nama', ttl='$ttl', jk='$jk', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan', tlp='$tlp', alamat='$alamat' WHERE id='$id';";
        $sql = mysqli_query($conn, $query2);
        if ($query2) {
            $_SESSION['info'] = 'update';
            header('location:pasien.php');
        } else {
            echo $query2;
        }
    }
}


// hapus data id
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query1 = "SELECT * FROM tambah_pasien WHERE id ='$id';";
    $sqlshow = mysqli_query($conn, $query1);
    $result = mysqli_fetch_assoc($sqlshow);

    $query = "DELETE FROM tambah_pasien WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
             header('location:pasien.php');
    }
}


// tambaha data obat
if (isset($_POST['aksi2'])) {
    if ($_POST['aksi2']  == "add2") {

        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $kegunaan = $_POST['kegunaan'];
        $foto = $_FILES['foto']['name'];
        $dir = "pictures/";
        $tmpfile = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmpfile, $dir . $foto);

        $query = "INSERT INTO tambah_obat VALUES(null, '$nama', '$harga', '$kegunaan', '$foto')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $_SESSION['info'] = 'simpan';
            header('location:obat.php');
        } else {
            echo $query;
        }
    }
}

// edit data obat
if (isset($_POST['aksi2'])) {
    if ($_POST['aksi2']  == "edit2") {


        // 
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $kegunaan = $_POST['kegunaan'];
        $foto = $_FILES['foto']['name'];

        $query1 = "SELECT * FROM tambah_obat WHERE id ='$id';";
        $sqlshow = mysqli_query($conn, $query1);
        $result = mysqli_fetch_assoc($sqlshow);

        if ($_FILES['foto']['name'] == "") {
            $foto = $result['foto'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("images/" . $result['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'images/' . $_FILES['foto']['name']);
        }
        $query2 = "UPDATE tambah_obat SET nama='$nama', harga='$harga', kegunaan='$kegunaan', foto='$foto' WHERE id='$id';";
        $sql = mysqli_query($conn, $query2);
        if ($query2) {
            $_SESSION['eksekusi'] = "Data Obat Berhasil Deperbarui";
            header('location:obat.php');
        } else {
            echo $query2;
        }
    }
}

// hapus obat
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query1 = "SELECT * FROM tambah_obat WHERE id ='$id';";
    $sqlshow = mysqli_query($conn, $query1);
    $result = mysqli_fetch_assoc($sqlshow);

    $query = "DELETE FROM tambah_obat WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Obat Berhasil Dihapus";
        header('location:obat.php');
    }
}


// tambah data dokter
if (isset($_POST['aksi3'])) {
    if ($_POST['aksi3']  == "add3") {

        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $sub_spesialis = $_POST['id_sub'];
        $jadwal = $_POST['jadwal'];
        $jam = $_POST['jam'];
        $foto = $_FILES['foto']['name'];
        $dir = "pictures/";
        $tmpfile = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmpfile, $dir . $foto);

        $query = "INSERT INTO tambah_dokter VALUES(null, '$nama', '$spesialis', '$sub_spesialis',  '$jadwal',  '$jam', '$foto')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $_SESSION['eksekusi'] = "Dokter baru berhasil Ditambahkan";
            header('location:dokter.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_POST['aksi3'])) {
    if ($_POST['aksi3']  == "edit3") {


        // 
        $id = $_POST['id_dokter'];
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $sub_spesialis = $_POST['id_sub'];
        $jadwal = $_POST['jadwal'];
        $jam = $_POST['jam'];
        $foto = $_FILES['foto']['name'];

        $query1 = "SELECT * FROM tambah_dokter WHERE id_dokter ='$id';";
        $sqlshow = mysqli_query($conn, $query1);
        $result = mysqli_fetch_assoc($sqlshow);

        if ($_FILES['foto']['name'] == "") {
            $foto = $result['foto'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("images/" . $result['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'images/' . $_FILES['foto']['name']);
        }
        $query2 = "UPDATE tambah_dokter SET nama='$nama', id_spesialis='$spesialis', id_sub='$sub_spesialis', jadwal='$jadwal', jam='$jam', foto='$foto' WHERE id_dokter='$id';";
        $sql = mysqli_query($conn, $query2);
        if ($query2) {
            $_SESSION['eksekusi'] = "Data Dokter Berhasil Diperbarui";
            header('location:dokter.php');
        } else {
            echo $query2;
        }
    }
}

if (isset($_GET['delete3'])) {
    $id = $_GET['delete3'];
   

    $query = "DELETE FROM tambah_dokter WHERE id_dokter = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data Dokter Berhasil Dihapus";
        header('location:dokter.php');
    }
}

// tambah rekam medis
// if (isset($_POST['aksi4'])) {
//     if ($_POST['aksi4']  == "add4") {

//         $nama = $_POST['nama'];
//         $keluhan = $_POST['keluhan'];
//         $diagnosis = $_POST['diagnosis'];
//         $resep = $_POST['resep'];
//         $tindakan = $_POST['tindakan'];
//         $tanggal = $_POST['tanggal'];
//         $query = "INSERT INTO tambah_rm (id_pasien, keluhan, diagnosis, resep, tindakan, tanggal, status) VALUES('$nama', '$keluhan', '$diagnosis', '$resep',  '$tindakan', '$tanggal', 'pending')";
//         $sql = mysqli_query($conn, $query);
//         if ($query) {
//             $_SESSION['eksekusi'] = "Rekam Medis Berhasil Ditambahkan";
//             header('location:rekam-medis.php');
//         } else {
//             echo $query;
//         }
//     }
// }

// edit rm
if (isset($_POST['aksi4'])) {
    if ($_POST['aksi4']  == "edit4") {


        // 
        $id = $_POST['id_rm'];
        $nama = $_POST['nama'];
        $keluhan = $_POST['keluhan'];
        $diagnosis = $_POST['diagnosis'];
        $resep = $_POST['resep'];
        $tindakan = $_POST['tindakan'];
        $tanggal = $_POST['tanggal'];

        $query1 = "SELECT * FROM tambah_rm WHERE id_rm ='$id';";
        $sqlshow = mysqli_query($conn, $query1);
        $result = mysqli_fetch_assoc($sqlshow);
        $query2 = "UPDATE tambah_rm SET id_pasien='$nama', keluhan='$keluhan', diagnosis='$diagnosis', resep='$resep', tindakan='$tindakan' WHERE id_rm='$id';";
        $sql = mysqli_query($conn, $query2);
        if ($query2) {
            $_SESSION['eksekusi'] = "Data Rekam medis Berhasil Diperbarui";
            header('location:rekam-medis.php');
        } else {
            echo $query2;
        }
    }
}

// hapus rm
if (isset($_GET['hapus3'])) {
    $id = $_GET['hapus3'];
    $query = "DELETE FROM tambah_rm WHERE id_rm = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data Rekam Medis Berhasil Dihapus";
        header('location:rekam-medis.php');
    }
}

// hapus data obat farmasih
if (isset($_GET['delete2'])) {
    $id = $_GET['delete2'];
    $query = "DELETE FROM data_obat WHERE id_obat = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Obat Berhasil Dihapus";
        header('location:tambah-farmasih.php');
    }
}

// menambahkan data berobat

if (isset($_POST['aksi'])) {
    if ($_POST['aksi']  == "tambah") {

        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];

        $query = "INSERT INTO tambah_berobat VALUES(null, '$nik', '$nama', '$spesialis', '$tanggal', '$keterangan')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $_SESSION['eksekusi'] = "Pasien Baru Berhasil Ditambahkan";
            header('location:data-berobat.php');
        } else {
            echo $query;
        }
    }
}

// edit data berobat
if (isset($_POST['aksi'])) {
    if ($_POST['aksi']  == "edit4") {


        // 
        $id = $_POST['id_berobat'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $keterangan = $_POST['keterangan'];
       

        $query1 = "SELECT * FROM tambah_berobat WHERE id_berobat ='$id';";
        $sqlshow = mysqli_query($conn, $query1);
        $result = mysqli_fetch_assoc($sqlshow);
        $query2 = "UPDATE tambah_berobat SET nik='$nik', nama='$nama', spesialis='$spesialis' WHERE id_berobat='$id';";
        $sql = mysqli_query($conn, $query2);
        if ($query2) {
            $_SESSION['eksekusi'] = "Data  Berhasil Diperbarui";
            header('location:data-berobat.php');
        } else {
            echo $query2;
        }
    }
}

// tambah data rekam medis
if (isset($_POST['aksi5'])) {
    if ($_POST['aksi5']  == "add5") {

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $keluhan = $_POST['keluhan'];
        $diagnosis = $_POST['diagnosis'];
        $resep = $_POST['resep'];
        $tindakan = $_POST['tindakan'];
        $tanggal = $_POST['tanggal'];
        $query = "INSERT INTO tambah_rm VALUES(null, '$nama', '$keluhan', '$diagnosis', '$resep', '$tindakan', '$tanggal', 'pending')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $update = mysqli_query($conn, "UPDATE tambah_pb SET status = 'selesai' WHERE id_pb = '$id';");
            $_SESSION['eksekusi'] = "Rekam Medis Berhasil Ditambahkan";
            header('location:rekam-medis.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_GET['hapus5'])) {
    $id = $_GET['hapus5'];
    $query = "DELETE FROM tambah_berobat WHERE id_berobat = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data Pasien Berobat Berhasil Dihapus";
        header('location:data-berobat.php');
    }
}