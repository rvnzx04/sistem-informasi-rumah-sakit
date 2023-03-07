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
            $_SESSION['eksekusi'] = "Data berhasil ditambahkan!";
            header('location:pasien.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_POST['aksi'])) {
    if ($_POST['aksi']  == "editt") {


        // 
        $id = $_POST['id_pasien'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $pekerjaan = $_POST['pekerjaan'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $tlp = $_POST['tlp'];
        $alamat = $_POST['alamat'];

        $query1 = "SELECT * FROM tambah_pasien2 WHERE id_pasien ='$id';";
        $sqlshow = mysqli_query($conn, $query1);
        $result = mysqli_fetch_assoc($sqlshow);

        $query2 = "UPDATE tambah_pasien2 SET nik='$nik', nama='$nama', ttl='$ttl', jk='$jk', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan', tlp='$tlp', alamat='$alamat' WHERE id_pasien='$id';";
        $sql = mysqli_query($conn, $query2);
        if ($query2) {
            $_SESSION['eksekusi'] = "Data Berhasil Di Update";
            header('location:pasien.php');
        } else {
            echo $query2;
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
            $_SESSION['eksekusi'] = "Data Berhasil Di Update";
            header('location:pasien.php');
        } else {
            echo $query2;
        }
    }
}


// hapus data id
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM tambah_pasien WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data Berhasil Di Hapus";
        header('location:pasien.php');
    }
}
if (isset($_GET['hapuss'])) {
    $id = $_GET['hapuss'];
    $query = "DELETE FROM tambah_pasien2 WHERE id_pasien = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data Berhasil Di Hapus";
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
            $_SESSION['eksekusi'] = "Data berhasil di tambahkan";
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
            $_SESSION['eksekusi'] = "Data berhasil di Update";
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
        $_SESSION['eksekusi'] = "Data Berhasil dihapus";
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
            $_SESSION['eksekusi'] = "Data berhasil ditambahkan";
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
        $kode_pasien = $_POST['kode_pasien'];

        $query = "INSERT INTO tambah_berobat VALUES(null, '$kode_pasien', '$nik', '$nama', '$spesialis', '$tanggal', '$keterangan')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $_SESSION['eksekusi'] = "Data Berhasil ditambahkan";
            header('location:data-berobat.php');
        } else {
            echo $query;
        }
    }
}
if (isset($_POST['aksi'])) {
    if ($_POST['aksi']  == "tambah2") {

        $id_user = $_POST['id_user'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $kode_pasien = $_POST['kode_pasien'];

        $query = "INSERT INTO tambah_berobat2 VALUES(null, '$id_user', '$kode_pasien', '$nik', '$nama', '$spesialis', '$tanggal', '$keterangan', 'pending')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $_SESSION['eksekusi'] = "Data Berhasil ditambahkan";
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
            $_SESSION['eksekusi'] = "Data  Berhasil Di Update";
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
        $id_pb = $_POST['id_pb'];
        $nama = $_POST['nama'];
        $keluhan = $_POST['keluhan'];
        $diagnosis = $_POST['diagnosis'];
        $resep = $_POST['resep'];
        $tindakan = $_POST['tindakan'];
        $tanggal = $_POST['tanggal'];
        $query = "INSERT INTO tambah_rm2 VALUES(null, '$nama', '$keluhan', '$diagnosis', '$resep', '$tindakan', '$tanggal', 'pending')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $update = mysqli_query($conn, "UPDATE tambah_pb SET status = 'selesai' WHERE id_pb = '$id';");
            $update = mysqli_query($conn, "UPDATE berobat SET status = 'selesai' WHERE id_pasienberobat = '$id_pb';");
            $update = mysqli_query($conn, "UPDATE berobat2 SET status = 'selesai' WHERE id_pasienberobat = '$id_pb';");
            $_SESSION['eksekusi'] = "Data berhasil di tambahkan";
            header('location:rekam-medis.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_POST['proses'])) {
    if ($_POST['proses']  == "add5") {

        $id = $_POST['id'];
        $id_pb = $_POST['id_pb'];
        $id_inap = $_POST['id_inap'];
        $nama = $_POST['nama'];
        $keluhan = $_POST['keluhan'];
        $diagnosis = $_POST['diagnosis'];
        $resep = $_POST['resep'];
        $tindakan = $_POST['tindakan'];
        $tanggal = $_POST['tanggal'];
        $query = "INSERT INTO tambah_rm VALUES(null, '$id_inap', '$nama', '$keluhan', '$diagnosis', '$resep', '$tindakan', '$tanggal', 'pending')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
            $update = mysqli_query($conn, "UPDATE tambah_pb SET status = 'selesai' WHERE id_pb = '$id';");
            $update = mysqli_query($conn, "UPDATE berobat SET status = 'selesai' WHERE id_pasienberobat = '$id_pb';");
            $_SESSION['eksekusi'] = "Data Berhasil ditambahkan";
            header('location:rekam-medis.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_POST['aksi5'])) {
    if ($_POST['aksi5']  == "addd") {

        $id_user = $_POST['id_user'];
        $id = $_POST['id'];
        $id_pb = $_POST['id_pb'];
        $nama = $_POST['nama'];
        $keluhan = $_POST['keluhan'];
        $diagnosis = $_POST['diagnosis'];
        $resep = $_POST['resep'];
        $tindakan = $_POST['tindakan'];
        $tanggal = $_POST['tanggal'];
        $query = "INSERT INTO tambah_rm3 VALUES(null, '$id_user', '$nama', '$keluhan', '$diagnosis', '$resep', '$tindakan', '$tanggal', 'pending')";
        $sql = mysqli_query($conn, $query);
        if ($query) {
    
            $update = mysqli_query($conn, "UPDATE berobat2 SET status = 'selesai' WHERE id_pasienberobat = '$id_pb';");
            $_SESSION['eksekusi'] = "Data berhasil di tambahkan";
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
        $_SESSION['eksekusi'] = "Data berhasil dihapus";
        header('location:data-berobat.php');
    }
}

// tambah ri



if (isset($_GET['destroy'])) {
    $id = $_GET['destroy'];
    $query = "DELETE FROM kamar WHERE id_kamar = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data berhasil dihapus";
        header('location:data-kamar.php');
    }
}


// tambah-kamar
if (isset($_POST['submit'])) {
    $kelas = $_POST['kelas'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kirim = mysqli_query($conn, "INSERT INTO rawat_inap VALUES(null, '$kelas', '$harga', '$stok')");
    $_SESSION['eksekusi'] = "Data berhasil ditambahkan";
    header('location:kamar.php');
}

if (isset($_GET['destroy2'])) {
    $id = $_GET['destroy2'];
    $query = "DELETE FROM rawat_inap WHERE id_ri = '$id';";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data berhasil dihapus";
        
        header('location:kamar.php');
    }
}

// daftar online

if (isset($_POST['migrate'])) {
        $id_user = $_POST['id_user'];
        $login = $_POST['login'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $tgl = $_POST['tgl'];
        $jk = $_POST['jk'];
        $tlp = $_POST['tlp'];
        $tanggal = $_POST['tanggal'];
        $query = "INSERT INTO tambah_pasien2 VALUES(null, '$login', '$nik', '$nama', '$tgl', '$jk', '', '', '$tlp', '', '$tanggal')";
        $sql = mysqli_query($conn, $query);
        if ($query == true) {
            $update = mysqli_query($conn, "UPDATE tbl_pendaftaran SET status = 'selesai' WHERE id_pendaftaran = '$id_user';");
            $_SESSION['eksekusi'] = "Data Berhasil dikonfirmasi";
            header('location:daftar_online.php');
        } else {
            echo $query;
        }
    }

    // konfirmasi berobat


if (isset($_POST['konfirmasi'])) {
    $id_user = $_POST['id_user'];
    $update = mysqli_query($conn, "UPDATE tambah_berobat2 SET status = 'selesai' WHERE id_berobat = '$id_user';");
    if ($update == true) {
    $_SESSION['eksekusi'] = "Data Berhasil dikonfirmasi";
    header('location:konfirmasi_berobat.php');
}
}

