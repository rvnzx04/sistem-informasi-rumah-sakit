<?php
require 'functions.php';

$id = $_GET["id"];

if (hapusdokter($id)>0) {
    echo"
        <script>

            alert('data telah dihapus!');
            document.location.href = 'admindokter.php';



        </script>
    ";
}
else {
    echo"
    <script>

        alert('data gagal dihapus!');
        document.location.href = 'admindokter.php';



    </script>
";
}

?>