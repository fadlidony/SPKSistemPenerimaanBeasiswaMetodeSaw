<?php
include '../inc/koneksi.php';

$id_mhs = $_GET['id_mhs'];
$query = mysqli_query($mysqli,"delete from calonbeasiswa where id_mhs='$id_mhs'") or die(mysqli_error($mysqli));
$q = mysqli_query($mysqli,"DELETE FROM klasifikasi WHERE id_mhs='$id_mhs'") or die(mysqli_error($mysqli));
if ($query) {
?>
<script language="JavaScript">
	alert('Data calon Beasiswa berhasil di hapus');
	document.location='mahasiswa.php';
</script>
<?php
}
?>
