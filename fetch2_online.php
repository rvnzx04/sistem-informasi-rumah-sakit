<?php
include 'config.php';
$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tambah_berobat2 JOIN spesialis ON (spesialis.id_spesialis = tambah_berobat2.spesialis) WHERE id_berobat = $id");
?>

<?php include('navbar.php'); ?>

<div class="container-fluid">
    <h1 class="text-center text-black">PASIEN BEROBAT</h1>
    <h2 class=" pb-4 border-bottom"></h2>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered shadow-sm mt-4" id="dataTable" width="100%" cellspacing="0">
                <tr style="background-color:black; color:white;" class="text-center">
                    
                    <th>Nama</th>
                    <th>Tujuan Dokter Berobat</th>
                    <th>Tanggal Berobat</th>

                </tr>
                <?php foreach ($query as $row) { ?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <tr class="text-black">
                           
                            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                            <input type="hidden" name="nama" value="<?= $row['nama'] ?>">
                            <td><?= $row['nama'] ?></td>
                            <input type="hidden" name="spesialis" value="<?= $row['id_spesialis'] ?>">
                            <td><?= $row['nama_spesialis'] ?></td>
                            <input type="hidden" name="tanggal" value="<?= $row['tanggal'] ?>">
                            <td><?= $row['tanggal'] ?></td>
                        </tr>
        </div>


    </div>
</div>
</table>
<button type="submit" name="kirim" class="btn btn-success float-right">Kirim Pasien Berobat</button>
</form>
<?php } ?>



<?php
if (isset($_POST['kirim'])) {
 
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $spesialis = $_POST['spesialis'];
    $tanggal = $_POST['tanggal'];
    $query = "INSERT INTO berobat2 VALUES(null, '$id_user', '$nama', '$spesialis', '$tanggal', 'pending')";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $_SESSION['eksekusi'] = "Data  Berhasil Di Tambahkan";

        echo "
        <script>
        document.location.href = 'berobat.php';
        </script>
        ";
    } else {
        echo $query;
    }
}
?>