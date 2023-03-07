<?php
require 'functions.php';

$id = $_GET["id"];

if (hapus($id)>0) {
    echo"
        <script>

            alert('data telah dihapus!');
            document.location.href = 'adminpasien.php';



        </script>
    ";
}
else {
    echo"
    <script>

        alert('data gagal dihapus!');
        document.location.href = 'adminpasien.php';



    </script>
";
}

?>