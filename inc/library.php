<?php
function kdauto($tabel, $inisial){
	$struktur = mysqli_query($mysqli,"SELECT * FROM $tabel");
	$field = mysql_field_name($struktur,0);
	$panjang = mysql_field_len($struktur,0);

	$qry = mysqli_query($mysqli,"SELECT max(".$field.")
		FROM ".$tabel);
	$row = mysqli_fetch_array($qry);

	if ($row[0]=="") {
		$angka=0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}

	$angka++;
	$angka = strval($angka);
	$tmp = "";
	for ($i=1; $i<=($panjang-strlen($inisial)-
		strlen($angka)) ; $i++) {
		$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;
}

function format_angka($angka) {
	$hasil = number_format($angka,0, ",",".");
	return $hasil;
}
?>
