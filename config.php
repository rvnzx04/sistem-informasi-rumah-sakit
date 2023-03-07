<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'hospital2';

$conn = mysqli_connect($host, $user, $pass, $db) or die('connection failed');

mysqli_select_db($conn, $db);
 

 ?>