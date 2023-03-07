<?php

require 'functions.php';

require 'view/adminheader.php';
require 'view/sidebaradmin.php';

$jumlahdokter  =  mysqli_query ($conn,"SELECT * FROM  list_dokter")  ;

$notiftambah='0';



?>

<?php

// $conn = mysqli_connect("localhost","root","","rumahsakit");
    //cek apakah tombol sudah ditekan apa belum
    if (isset($_POST["submit"])) {
        //mengambil data
        $notiftambah='1';
        
       

        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $email = $_POST["email"];
        $nohp = $_POST["nohp"];
        $jeniskel = $_POST["jeniskel"];
        $pend_terakhir = $_POST["pend_terakhir"];
        $spesialis = $_POST["spesialis"];
        $tglahir = $_POST["tglahir"];
        $nik = $_POST["nik"];
        $kodepos = $_POST["kodepos"];



        //query insert data
        $query = "INSERT INTO list_dokter
                    VALUES
                    ('','$nama','$alamat','$email','$nohp','$jeniskel','$pend_terakhir','$spesialis','$tglahir','$nik','$kodepos')
                    
                     ";


        mysqli_query($conn,$query);


    }?>


          <div class="col-md-10 p-5 pt-2">
          <h3><i class="fas fa-address-card mr-2"></i></i></i>DAFTAR DOKTER</h3><hr>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>

          <?php


                    if ($notiftambah=='1') {
                        echo"
                        <script>

                            alert('data telah ditambahkan!');
                            document.location.href = 'admindokter.php';



                        </script>
                    ";
                    }
                    else {
                        echo '';
                    }

          ?>




        
          <table class="table table-striped table-bordered">
          <thead>
            <tr>              
              <th scope="col">NO</th>
              <th scope="col">NAMA</th>
              <th scope="col">Spesialis</th>
              <th scope="col">Alamat</th>
              <th scope="col">Email</th>
              <th scope="col">No HP</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Email</th>
              <th scope="col">NIK</th>
              <th scope="col">Kodepos</th>
              <th scope="col">Pendidikan Terakhir</th>


              <th colspan="3" scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            while($row= mysqli_fetch_assoc($jumlahdokter)) {
              
             echo ' <tr>
              <th scope="row">'.$no.'</th>
              <td>'.$row['nama'].'</td>
              <td>'.$row['spesialis'].'</td>
              <td>'.$row['alamat'].'</td>
              <td>'.$row['tglahir'].'</td>
              <td>'.$row['nohp'].'</td>
              <td>'.$row['jeniskel'].'</td>
              <td>'.$row['tglahir'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['nik'].'</td>
              <td>'.$row['kodepos'].'</td>
              <td>'.$row['pend_terakhir'].'</td>
              <td><a href="hapusdokter.php?id='.$row['id'].'"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data- toggle="tooltip" title="Delete"></i></a></td>
            </tr>';
            $no++;


            }



            ?>

            
          </tbody>
        </table>
                


        </div>
        </div>
        

         <!--Akhir Sidebar-->
          <!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
                    <h3> Tambah Dokter</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
        <form method="POST" action="">
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
                                                    <input class="form-check-input" type="radio" name="jeniskel"
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
                                            <label>Email</label>
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
                                            <label>Pendidikan Terakhir</label>
                                            <select name="pend_terakhir" id="pend_terakhir" name="pend_terakhir"
                                                class="custom-select custom-select-sm mb-3">
                                                <option value="S1" selected>S1 Kedokteran</option>
                                                <option value="S2" >S2 Kedokteran</option>
                                                <option value="S3" >S3 Kedokteran</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Daftar</label>
                                            <input type="text" readonly placeholder="" class="form-control" name="tgldaftar" value="
                                            <?= date('Y-m-d') ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <button type="submit"
                                                    class="btn btn-lg btn-info" id="myButton" name="submit">Submit</button>
                                            </div>
                                        </div>


                                    </div>
                                </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>

<?php

require 'view/adminfooter.php';

?>