<?php


require 'functions.php';
require 'view/header.php';
 


?>



        <!-- Registrasi form -->

        <div class="container">
            <div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                        20% Complete
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="tengah">
                <div class="row">
                    <?php

                    // $conn = mysqli_connect("localhost","root","","rumahsakit");
                        //cek apakah tombol sudah ditekan apa belum
                        if (isset($_POST["submit"])) {
                            //mengambil data
                            
                           

                            $nama = $_POST["nama"];
                            $alamat = $_POST["alamat"];
                            $namaayah = $_POST["namaayah"];
                            $namaibu = $_POST["namaibu"];
                            $namaistrisuami = $_POST["namaistrisuami"];
                            $jeniskel = $_POST["jeniskel"];
                            $tglahir = $_POST["tglahir"];
                            $nohp = $_POST["nohp"];
                            $email = $_POST["email"];
                            $nik = $_POST["nik"];
                            $kodepos = $_POST["kodepos"];
                            $tgldaftar = $_POST["tgldaftar"];


                            //query insert data
                            $query = "INSERT INTO registrasi
                                        VALUES
                                        ('','$nama','$alamat','$namaayah','$namaibu','$namaistrisuami','$jeniskel','$tglahir','$nohp','$email',
                                        '$nik','$kodepos','$tgldaftar')
                                        
                                         ";


                            mysqli_query($conn,$query);


                        }

                    ?>
                    <div>
                        <h1 class="well">Registration Form</h1>
                        <div class="col-lg-12">
                            <div class="row">
                                <form method="post" action="">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" placeholder="Masukan Nama Lengkap" name="nama"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Lengkap (*Wajib Diisi)</label>
                                            <textarea placeholder="Masukan Alamat" rows="3"
                                                class="form-control" name="alamat"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>Nama Ayah</label>
                                                <input type="text" placeholder="Masukan Nama Ayah" class="form-control"
                                                name="namaayah">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label>Nama Ibu</label>
                                                <input type="text" placeholder="Masukan Nama Ibu" class="form-control"
                                                name="namaibu">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label>Nama Istri/Suami</label>
                                                <input type="text" placeholder="Masukan Nama Istri/Suami"
                                                    class="form-control" name="namaistrisuami">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Jenis Kelamin</label> <br>
                                                <div class="form-check radio">
                                                    <input class="form-check-input" type="radio" name="jeniskel"
                                                        id="pilihan1" value="Laki-laki" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                                <div class="form-check radio">
                                                    <input class="form-check-input" type="radio" ame="jeniskel"
                                                        id="pilihan2" value="Perempuan">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tglahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Number Handphone</label>
                                            <input type="text" placeholder="+6285719281321" class="form-control" name="nohp">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input type="text" placeholder="Masukan Alamat Email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" placeholder="Masukan no NIK" class="form-control" name="nik">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode POS</label>
                                            <input type="text" placeholder="Masukan Kode POS" class="form-control" name="kodepos">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Daftar</label>
                                            <input type="text" readonly placeholder="Masukan Kode POS" class="form-control" name="tgldaftar" value="
                                            <?= date('Y-m-d') ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <button type="submit"
                                                    class="btn btn-lg btn-info" id="myButton" name="submit">Submit</button>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="button" onclick="location.href='reservasilogin.php';"
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


    <!-- akhir registrasi -->
  <?php
    require 'view/footer.php';
  ?>