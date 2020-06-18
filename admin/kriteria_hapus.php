<?php
include '../inc/koneksi.php';

$id_kriteria = $_GET['id_kriteria'];
$query = mysqli_query($mysqli,"delete from kriteria where id_kriteria='$id_kriteria'") or die(mysqli_error($mysqli));
if ($query) {
?>
<script language="JavaScript">
	alert('Kriteria berhasil dihapus');
	document.location='kriteria.php';
</script>
<?php
}
?>
