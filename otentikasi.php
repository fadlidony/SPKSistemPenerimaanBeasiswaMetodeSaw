<?php
include 'inc/koneksi.php';
session_start();

//tangkap data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


$loginadmin = mysqli_query($mysqli,"select * from admin where username='$username' and password='$password'");
$q=mysqli_fetch_array($loginadmin);

if (mysqli_num_rows($loginadmin) == 1) {
	//kalau user dan password sudah terdaftar di database
	//buat session dengan username dengan isi nama user yang login
	$_SESSION['username'] = $q['username'];
	$_SESSION['password'] = $q['password'];
	$_SESSION['nama']	  = $q['nama'];

	//redirect ke halaman index
	header('location:admin/index.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:index.php?error=4');
}
?>
