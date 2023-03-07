<?php

require 'functions.php';

 require 'view/adminheader.php';
 require 'view/sidebaradmin.php';


$jumlahpasien  =  mysqli_query ($conn,"SELECT * FROM  registrasi")  ;

$notiftambah = '0';
?>


<?php

// $conn = mysqli_connect("localhost","root","","rumahsakit");
    //cek apakah tombol sudah ditekan apa belum
    if (isset($_POST["submit"])) {
        //mengambil data
        $notiftambah='1';
        
       

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


    }?>




          <div class="col-md-10 p-5 pt-2">
          <h3><i class="fas fa-user-graduate mr-2"></i></i>DAFTAR PASIEN</h3><hr>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
          <?php

          if ($notiftambah=='1') {
            echo"
            <script>
    
                alert('data telah ditambahkan!');
                document.location.href = 'adminpasien.php';
    
    
    
            </script>
        ";
          }
          else {
            echo '';
          }


          ?>
          <br><br>
          <table class="table table-striped table-bordered">
          <thead>
            <tr>              
              <th scope="col">NO</th>
              <th scope="col">NAMA</th>
              <th scope="col">Alamat</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">No HP</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Email</th>
              <th scope="col">NIK</th>
              <th scope="col">Kodepos</th>
              <th scope="col">Tanggal Daftar</th>

              <th colspan="3" scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            while($row= mysqli_fetch_assoc($jumlahpasien)) {
              
             echo ' <tr>
              <th scope="row">'.$no.'</th>
              <td>'.$row['nama'].'</td>
              <td>'.$row['alamat'].'</td>
              <td>'.$row['tglahir'].'</td>
              <td>'.$row['nohp'].'</td>
              <td>'.$row['jeniskel'].'</td>
              <td>'.$row['tglahir'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['nik'].'</td>
              <td>'.$row['kodepos'].'</td>
              <td>'.$row['tgldaftar'].'</td>
              <td><a href="hapuspasien.php?id='.$row['id'].'"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data- toggle="tooltip" title="Delete"></i></a></td>
            </tr>';
            $no++;


            }



            ?>

            
          </tbody>
        </table>
                


        </div>
        </div>
        

         <!--Akhir Sidebar-->




<?php

require 'view/adminfooter.php';

?>