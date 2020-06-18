<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "spk_saw";
$mysqli = mysqli_connect($server, $username, $password) or die("Gagal konek ke server MySQL" .mysqli_error($mysqli));
$bukadb = mysqli_select_db($mysqli,$database) or die("Gagal membuka database $database" .mysqli_error($mysqli));
?>
