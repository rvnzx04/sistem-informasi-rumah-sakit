<?php

session_start();


require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: reservasilogin.php");
    exit;
}

?>

<?php

    require 'view/header.php';

?>

        <div class="container">
            <div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        100% Complete
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="tengah col-lg-10">
                    <div class="btnprint">
                        <div class="">
                        <a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print Halaman Ini</a>
                        </div>
                     </div>
                    <div class="btnprint">
                        <div class="">
                        <a class="btn btn-primary" href="sesion_unset.php"><i class="fa fa-print"></i> Tutup Jika Selesai</a>
                        </div>
                     </div>


                <div class="bungkusdftr">

                <center>
                    <div class="headerbukti">
                        
                    <img src="../images/logofix.png" height=80px width=80px alt="">
                    <h3>Bukti Reservasi Online</h3>
                    <h4>Rumah Sakit ARS</h4>
                    <h6>Antapani, Jl. Terusan Sekolah No.1-2, Cicaheum, Kec. Kiaracondong, 
                        Kota Bandung, Jawa Barat 40282</h6>
                    
                    </div>
                    <table class="table table-striped" cellpadding=10>

                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><?=$_SESSION["nama"];?></td>
                        </tr>
                        <tr>
                            <td>Kode pendaftaran</td>
                            <td>:</td>
                            <?php

                            if ($_SESSION["klinik"]=="poli bedah") {
                                $kode="pbars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli dalam") {
                                $kode="pdars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli anak") {
                                $kode="paars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli obstetri dan ginekologi") {
                                $kode="podgars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli syaraf") {
                                $kode="psars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli mata") {
                                $kode="pmars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli THT-KL") {
                                $kode="pthtklars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli bedah mulut") {
                                $kode="pbdmars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli kulit dan kelamin") {
                                $kode="pkdkars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli kesehatan jiwa") {
                                $kode="pkjars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli poliradiologi") {
                                $kode="prdars00";
                            }
                            elseif ($_SESSION["klinik"]=="poli ginjal dan hipertensi") {
                                $kode="pgdhars00";
                            }



                            ?>
                            <td><?=$kode;?><?=$_SESSION["id"];?></td>
                        </tr>

                        <tr>
                            <td>Tujuan Klinik</td>
                            <td>:</td>
                            <td><?=$_SESSION["klinik"]?>;</td>
                        </tr>
                        <tr>
                            <td>Jaminan yang dipilih</td>
                            <td>:</td>
                            <td><?= $_SESSION["jaminan"];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal berkunjung</td>
                            <td>:</td>
                            <td><?= $_SESSION["tglkunjung"];?></td>
                        </tr>
                    </table>
                    <img src="images/kodeqr.jpg" alt=""> <br>
                    Scan For more Information about Register Card
                </center>
                </div>
            </div>
        </div>
  
        <?php
         require 'view/footer.php';
        ?>