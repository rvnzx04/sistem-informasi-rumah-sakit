<?php

$conn = mysqli_connect('localhost', 'root', '', 'hospital2');

function get_total_attend($id_murid, $keterangan)
{
    global $koneksi;
    $Attend = $koneksi->query("SELECT * FROM tambah_berobat WHERE nama = '$id_murid' AND keterangan = '$keterangan'");
    return mysqli_num_rows($Attend);
}
