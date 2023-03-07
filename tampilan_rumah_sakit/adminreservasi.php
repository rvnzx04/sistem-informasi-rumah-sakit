<?php

require 'functions.php';

 require 'view/adminheader.php';
 require 'view/sidebaradmin.php';


$jumlahreservasi  =  mysqli_query ($conn,"SELECT * FROM  reservasi")  ;

$notiftambah = '0';
?>





          <div class="col-md-10 p-5 pt-2">
          <h3><i class="fas fa-user-graduate mr-2"></i></i>History Reservasi Online Pasien Hari Ini</h3><hr>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
    
          <br><br>
          <table class="table table-striped table-bordered">
          <thead>
            <tr>              
              <th scope="col">NO</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">No HP</th>
              <th scope="col">Email</th>
              <th scope="col">Jaminan Kesehatan</th>
              <th scope="col">Tujuan Klinik</th>
              <th scope="col">Tanggal Rencana Mengunjungi</th>

              <th colspan="3" scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            while($row= mysqli_fetch_assoc($jumlahreservasi)) {
              
             echo ' <tr>
              <th scope="row">'.$no.'</th>
              <td>'.$row['nama'].'</td>
              <td>'.$row['alamat'].'</td>
              <td>'.$row['jeniskel'].'</td>
              <td>'.$row['tglahir'].'</td>
              <td>'.$row['nohp'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['jaminan'].'</td>
              <td>'.$row['klinik'].'</td>
              <td>'.$row['tglkunjung'].'</td>
             

              <td><a href="hapusreservasi.php?id='.$row['id'].'"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data- toggle="tooltip" title="Delete"></i></a></td>
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