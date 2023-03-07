<?php
$active = 'dashboard';
$title = 'Dashboard | Admin';
include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date('Y-m-d');

$queryAbsensi = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE  tbl_absensi.tanggal = '$today' ORDER BY nama ASC");
?>

<h1 class="text-center mt fw-bold  mt-4">Dashboard Harian Siswa</h1>
<div class="container">
    <h5>Tanggal : <?= $today ?></h5>
    <div class="card mt-3">
        <div class="card-header">
            <h4>Dashboard Harian Siswa</h4>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered  d-md-block d-lg-table overflow-auto text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($queryAbsensi as $absensi) {
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $absensi['nama'] ?></td>
                          <?php if ($absensi['keterangan'] == 'Sakit') :
                                    ?>
                                      <td> 
                                    <span class="btn btn-warning"><?= $absensi['keterangan']; ?></span>
                          <?php elseif ($absensi['keterangan'] == 'Izin') :
                                    ?>
                                      </td>
                                      <td>
                                    <span class="btn btn-primary"><?= $absensi['keterangan']; ?></span>
                          <?php elseif ($absensi['keterangan'] == 'Alpa') :
                                    ?>
                                      </td>
                                      <td>
                                    <span class="btn btn-danger"><?= $absensi['keterangan']; ?></span>
                                </td>
                                <?php endif; ?>
                            <td><?= $absensi['tanggal'] ?></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../layouts/footer.php") ?>