<?php
include "config.php";
$date = date('Y/m/d');
date_default_timezone_set("Asia/Jakarta");
$active = 'rawat_inap';
include('navbar.php');

$spesialis = mysqli_query($conn, "SELECT * FROM spesialis ORDER BY nama_spesialis ASC") or die(mysqli_error($conn));
?>

<div class="container-fluid">

    <!-- Page Heading -->



    <!-- DataTales Example -->
    <div class="card" style="background-color: white;">
        <div class="card-header py-3" style="background-color: white;">
            <h4 class="text-black">Data Pasien Rawat Inap</h4>

        </div>

        <!-- session alert -->
        <?php if (isset($_SESSION['eksekusi'])) :
        ?>

            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
                <a><?php echo $_SESSION['eksekusi']; ?></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
             unset($_SESSION['eksekusi']);
        endif;

        ?>
        <!-- akhir -->

        <!-- akhir -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Kamar</th>
                            <th>Nama Pasien</th>
                            <th>Kelas Kamar</th>
                            <th>Status</th>
                            <th>Tanggal input</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $query = "SELECT * FROM kamar JOIN rawat_inap ON (rawat_inap.id_ri = kamar.kelas)";
                        $sql = mysqli_query($conn, $query);
                        $no = 1;


                        ?>
                        <?php while ($result = mysqli_fetch_assoc($sql)) {
                            $stok = $result['stok'] + 1;

                        ?>
                            <tr>

                                <td><?= $no++; ?></td>
                                <td><?= $result['kode_kamar']; ?></td>
                                <td><?= $result['nama']; ?></td>
                                <td><?= $result['kelas_kamar']; ?></td>
                                <?php if ($result['status'] == 'pending') { ?>
                                    <td class="text-center">
                                        <span class="badge bg-warning">Menginap</span>
                                    <?php } ?>
                                    <?php if ($result['status'] == 'selesai') { ?>
                                    <td class="text-center">
                                        <span class="badge bg-success">Pulang</span>
                                    <?php } ?>

                                    <td><?= $result['tanggal']; ?></td>

                                    <?php if ($result['status'] == 'pending') { ?>
                                        <td class="text-center">
                                            <a href="proses.php?hapus=<?php echo $no; ?>" type="button" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>" class="btn btn-primary" style=""><i class="bi bi-check-circle"></i></a>
                                        <?php } ?>
                                        <?php if ($result['status'] == 'selesai') { ?>
                                        <td class="text-center">
                                            <span class="border border-1 border-success rounded p-2 text-success fw-bold text-uppercase"></i> Selesai</span>
                                        <?php } ?>
                                        </td>
                                        <!-- Modal edit -->
                                        <div class="modal fade" id="modalEdit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pasien Rawat Inap</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <input type="hidden" name="id_kamar" value="<?= $result['id_kamar']; ?>">
                                                                <input type="hidden" name="id_stok" value="<?= $result['id_ri']; ?>">
                                                                <input type="hidden" name="stok" value="<?= $stok; ?>">
                                                                <label class="form-label">Nomor Kamar</label>
                                                                <input type="text" class="form-control" name="" value="<?= $result['kode_kamar'] ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Pasien</label>
                                                                <input type="Email" class="form-control" name="nama" value="<?= $result['nama'] ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Kelas Kamar</label>
                                                                <input type="text" class="form-control" name="kelas" value="<?= $result['kelas_kamar'] ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="form-group">
                                                                    <label>Tujuan Dokter</label>
                                                                    <select class="form-control" name="spesialis" id="id_spesialis" aria-label="Default select example" required>
                                                                        <option value="" selected> --Pilih Tujuan Dokter-- </option>
                                                                        <!-- mengambil data di database -->
                                                                        <?php
                                                                        foreach ($spesialis as $dt) {
                                                                        ?>

                                                                            <option value="<?php echo $dt['id_spesialis'] ?>"><?php
                                                                                                                                echo $dt['nama_spesialis'];
                                                                                                                                ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tanggal Input</label>
                                                                <input type="date-local" class="form-control" name="tanggal" value="<?= $date ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="kirim_data">Kirim Pasien Ke Dokter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php
if (isset($_POST['kirim_data'])) {
    $id_kamar = $_POST['id_kamar'];
    $id_stok = $_POST['id_stok'];
    $stok = $_POST['stok'];
    $nama = $_POST['nama'];
    $spesialis = $_POST['spesialis'];
    $tanggal = $_POST['tanggal'];


    $query = "INSERT INTO tambah_pb VALUES(null,'$id_kamar', '$nama', '$spesialis', '$tanggal', 'menginap', 'pending')";
    $sql = mysqli_query($conn, $query);
    if ($query) {
        $query2 = mysqli_query($conn, "UPDATE rawat_inap SET stok = '$stok' WHERE id_ri =  '$id_stok'");
        $update = mysqli_query($conn, "UPDATE kamar SET status = 'selesai' WHERE id_kamar = '$id_kamar';");

        $_SESSION['eksekusi'] = "Pasien berhasil terkirim ke dokter";

        echo "
        <script>
        document.location.href = 'data-kamar.php';
        </script>
        ";
    } else {
        echo $query;
    }
}

?>

<script src="sweetalert.js"></script>

<script src="alert.js"></script>


</body>

</html>