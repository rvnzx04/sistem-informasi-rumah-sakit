<?php
session_start();
require'functions.php';
$cek ='0';
$cekuser='0';
$row;



 //lakukan pengecekan form , 
    //apakah ada didalam database?

   


//apakah tombol login sudah ditekan?
if (isset($_POST["login"])) {
    $email= $_POST["email"];
    $tglahir = $_POST["tglahir"];

    $result = mysqli_query($conn,"SELECT * FROM registrasi WHERE
    email='$email'");

    $row = mysqli_fetch_assoc($result);
   
    
 

   
    //cekemail
    if (mysqli_num_rows($result) === 1) 
    {
        //cek tgl lahir

        if ($tglahir == $row['tglahir']) {
            $cek = '1';
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["nama"]= $row["nama"];
            $_SESSION["alamat"]= $row["alamat"];
            $_SESSION["namaayah"] = $row["namaayah"];
            $_SESSION["namaibu"] = $row["namaibu"];
            $_SESSION["namaistrisuami"] = $row["namaistrisuami"];
            $_SESSION["jeniskel"] = $row["jeniskel"];
            $_SESSION["tglahir"] = $row["tglahir"];
            $_SESSION["nohp"] = $row["nohp"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["nik"] = $row["nik"];
            $_SESSION["kodepos"] = $row["kodepos"];
            $_SESSION["tgldaftar"] = $row["tgldaftar"];
            $_SESSION["login"] = true;
            header("Location: pilihtujuan.php");
            exit;
        }
        else {
            $cek= '2';
        }
    }
    else {
        $cekuser= '1';
    }

}




?>


<?php
    require 'view/header.php';
?>

        <div class="container">
            <div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                        20% Complete
                    </div>
                </div>
                <?php
                        //cek user
                    if ($cekuser=='1') {
                        echo 'User tidak ditemukan';
                    }

                        //cektgl
                
                    if ($cek=='1') {
                        $namapasien = $row['nama'];
                        echo 'Pasien ditemukan dengan nama  ';
                        echo $namapasien; 
                    }
                    elseif ($cek=='2') {
                        echo 'tgl lahir salah';
                    }
                    else {
                        echo ' ';
                    }

                ?>
            </div>
            <br>
            <br>
            <div class="tengah">
                <div class="row">
                    <div>
                        <h1 class="well">Validasi Pendaftaran</h1>
                        <div class="col-lg-12">
                            <div class="row">
                                <form method="post">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label>Masukan email</label>
                                                <input type="text" placeholder="Masukan Email" name="email"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Masukan Tanggal Lahir</label>
                                            <input type="date" placeholder="Masukan Alamat" name="tglahir"
                                                class="form-control"></input>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-9">
                                            <button type="submit"
                                                class="btn btn-sm
                                                 btn-info" id="login" name="login">Submit</button>
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


    <!-- akhir registrasi -->
<?php

require 'view/footer.php';

?>