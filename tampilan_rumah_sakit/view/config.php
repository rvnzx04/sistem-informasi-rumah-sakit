<?php
$conn = mysqli_connect('localhost', 'root', '', 'hospital2');

function get_total_attend($id_user, $keterangan)
{
    global $conn;
    $Attend = $conn->query("SELECT * FROM tambah_berobat2 WHERE id_user = '$id_user' AND keterangan = '$keterangan'");
    return mysqli_num_rows($Attend);
}

