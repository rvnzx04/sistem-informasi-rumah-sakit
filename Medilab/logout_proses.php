<?php
session_start();
session_destroy();
echo "<script>window.location='../tampilan_user/index.php'</script>";