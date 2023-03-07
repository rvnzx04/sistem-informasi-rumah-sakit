
<?php 
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM tambah_pb JOIN kamar ON(kamar.id_kamar = tambah_pb.id_inap) JOIN rawat_inap ON(rawat_inap.id_ri = kamar.kelas)");
$array = mysqli_fetch_array($query);

$tgl1 = new DateTime($array['tanggal']);
$tgl2 = new DateTime($array['tanggal_pb']);
$jarak = $tgl2->diff($tgl1);


$jumlah = number_format($jarak->d * $array['harga_kamar']);
echo $jumlah;


?>

