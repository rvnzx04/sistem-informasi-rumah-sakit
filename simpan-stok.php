<?php

require 'config.php';
$stat = $_GET['stat'];
$id = $_POST['id'];
$stok =  $_POST['stok'];
$qty =  $_POST['qty'];


if ($stat == 'tambah') {
    $stok_new = $stok + $qty;
} elseif ($stat == 'kurang') {
    $stok_new = $stok - $qty;
}
if (isset($stok_new)) {

    $sql = mysqli_query($conn, "UPDATE rawat_inap SET stok = '" . $stok_new . "' WHERE id_ri =  " . $id);
}
header("Location: kamar.php");
