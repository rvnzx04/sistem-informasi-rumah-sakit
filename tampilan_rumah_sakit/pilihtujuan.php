<?php
session_start();


require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: reservasilogin.php");
    exit;
}


$result = mysqli_query($conn,"SELECT * FROM registrasi WHERE
email='$email'");

$row = mysqli_fetch_assoc($result);


require 'view/header.php';


?>


        <div class="container">
            <div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                        60% Complete
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="tengah">
                <div class="welcome">
            <h6>Selamat Datang <?= $_SESSION["nama"];?></h6>
            <h6>               <?= $_SESSION["email"];?></h6> <br> <br>
            </div>
                <div class="row">
                    <?php

// $conn = mysqli_connect("localhost","root","","rumahsakit");
    //cek apakah tombol sudah ditekan apa belum
    if (isset($_POST["submit"])) {
        //mengambil data

        $nama =$_SESSION["nama"];
        $alamat = $_SESSION["alamat"];

        $jeniskel = $_SESSION["jeniskel"];
        $tglahir = $_SESSION["tglahir"];
        $nohp = $_SESSION["nohp"];
        $email = $_SESSION["email"];

        $jaminan = $_POST["jaminan"];
        $klinik = $_POST["klinik"];
        $tglkunjung = $_POST["tglkunjung"];
        $tgldaftar = $_SESSION["tgldaftar"];

        $_SESSION["jaminan"] =$jaminan;
        $_SESSION["klinik"] =$klinik;
        $_SESSION["tglkunjung"] =$tglkunjung;

        $result= '1';
    
       


        //query insert data
        $query = "INSERT INTO reservasi
                    VALUES
                    ('','$nama','$alamat','$jeniskel','$tglahir','$nohp','$email','$jaminan','$klinik','$tglkunjung','$tgldaftar')
                    
                     ";


        mysqli_query($conn,$query);

        
    }

?>
                    <br><b><br></b>
                    <div>
                    <?php

                            if ($result =='1') {
                                echo '<h4 background=green>Berhasil diinput, silahkan klik lanjutkan</h4>';
                            }

                            ?>
                        <h1 class="well title">Tujuan Checkup</h1>
                        <div class="col-lg-12">
                            <div class="row">
                                <form method="POST">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label>Pilih Jaminan</label>
                                                <select name="jaminan" id="jaminan"
                                                    class="custom-select custom-select-sm mb-3">
                                                    <option value="BPJS" selected>BPJS</option>
                                                    <option value="ASKES" >ASKES</option>
                                                    <option value="JAMKESMAS" >JAMKESMAS</option>
                                                    <option value="JAMPERSAL" >JAMPERSAL</option>
                                                    <option value="JASARAHARJA" >JASARAHARJA</option>
                                                    <option value="Umum">Umum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Poli</label>
                                            <select name="klinik" id="klinik"
                                                class="custom-select custom-select-sm mb-3">
                                                <option value="poli bedah" selected>Poli Bedah</option>
                                                <option value="poli dalam" >Poli dalam</option>
                                                <option value="poli anak" >Poli Anak</option>
                                                <option value="poli obstetri dan ginekologi" >Poli Obstetri dan Ginekologi</option>
                                                <option value="poli syaraf" >Poli Syaraf</option>
                                                <option value="poli mata" >Poli Mata</option>
                                                <option value="poli THT-KL" >Poli THT - KL</option>
                                                <option value="poli bedah mulut" >Poli Bedah Mulut</option>
                                                <option value="poli kulit dan kelamin" >Poli Kulit dan Kelamin</option>
                                                <option value="poli kesehatan jiwa" >Poli Kesehatan Jiwa</option>
                                                <option value="poli radiologi" >Radiologi</option>
                                                <option value="poli ginjal dan hipertensi" >Ginjal dan Hipertensi</option>
                                            </select>
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label>Pilih Tanggal kunjung</label> <br>
                                                    <input type="date" class="form-control" name="tglkunjung">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <label>Tanggal Daftar</label>
                                            <input type="text" readonly class="form-control" name="tgldaftar" value="
                                            <?= date('Y-m-d') ?>">
                                        </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-9">
                                                <button type="submit"
                                                    class="btn btn-lg btn-info" id="submit" name="submit">Submit</button>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="button" onclick="location.href='ambilantrian.php';"
                                                    class="btn btn-lg btn-info" id="myButton">Selanjutnya</button>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


<?php

require 'view/footer.php';


?>