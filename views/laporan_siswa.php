<?php
$active = 'laporan';
$title = 'Laporan Siswa | Admin';
include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d");


?>

<div class="container">
    <center>
        <h1 class="mt-5">LAPORAN SISWA</h1>
    </center>
    <br>
    <form method="get">
        <div class="d-flex align-items-center">
            <div class="me-2 print">
                <label>Dari Tanggal : </label>
                <input type="date" class="form-control print" name="dari_tgl" required="required">
            </div>
            <div class="me-2 print">
                <label> Sampai Tanggal : </label>
                <input type="date" class="form-control print" name="sampai_tgl" required="required">
            </div>
            <div class="me-2 print">
                <input href="" type="submit" name="filter" value="Filter" class="btn btn-primary btn-fill pull-right mt-4 me-2 print">
            </div>
            <div class="ms-auto mt-5 print">
                <a href="" class="btn btn-success mb-3 print" onclick="window.print()">PRINT LAPORAN</a><br>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>jumlah berobat</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $AttendedStudents = $koneksi->query("SELECT * FROM tambah_pasien ORDER BY nama");
            foreach ($AttendedStudents as $absensi) :
              
            ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $absensi['nama'] ?></td>
                        <td>
                            <?= get_total_attend($absensi['nama'], "berobat"); ?>
                        </td>
                       
                    </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php include("../layouts/footer.php") ?>