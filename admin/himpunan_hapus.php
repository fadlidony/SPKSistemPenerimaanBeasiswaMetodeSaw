<?php
include '../inc/koneksi.php';

$id_himpunan = $_GET['id_himpunan'];
$query = mysqli_query($mysqli,"delete from himpunan where id_himpunan='$id_himpunan'") or die(mysqli_error($mysqli));
if ($query) {
?>
<script language="JavaScript">
	alert('Himpunan berhasil di hapus');
	document.location='himpunan.php';
</script>
<?php
}
?>
