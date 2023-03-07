<?php


$conn = mysqli_connect("localhost", "root", "","rumahsakit");


function query($query) {
    global $conn;
    $result = mysqli_query($conn,$result);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $rows;
    }
    return $rows;
}


function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM registrasi WHERE id =$id");

    return mysqli_affected_rows($conn);
}

function hapusdokter($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM list_dokter WHERE id =$id");

    return mysqli_affected_rows($conn);
}

function hapusreservasi($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM reservasi WHERE id =$id");

    return mysqli_affected_rows($conn);
}



?>