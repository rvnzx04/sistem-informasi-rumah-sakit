<?php 
include "config.php";

$id = $_POST['id'];
$modul = $_POST['modul'];

if ($modul=='sub') {
    $sql = mysqli_query($conn,"SELECT * FROM sub_spesialis where id_spesialis='$id' order by nama_sub ASC")or die(mysqli_error($con));
    $sub='<option> --Pilih Sub Spesialis-- </option>';
    while ($dt = mysqli_fetch_array($sql)) {
        $sub.='<option value="'.$dt['id'].'">'.$dt['nama_sub'].'</option>';
    }

    echo $sub;

}

?>