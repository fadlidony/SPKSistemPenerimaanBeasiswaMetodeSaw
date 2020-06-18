<?php include "head.php"; ?>
<!-- Body -->

			<!-- Link Menu -->
			<?php include "menu.php"; ?>

			</div>
		<br />

		<div id="content">
		<!-- Page title -->
			<div class="page-title">
				<h5><i class="fa fa-desktop"></i> Hasil Analisa</h5>
			</div>
			<!-- /page title -->

			<!-- Hover rows datatable inside panel -->
            <div class="panel panel-default">
            	<div class="panel-heading"><h6 class="panel-title">
            				<tr align="right">
            					<th></th>
            					<th>Bobot :</th>
											<th><?php echo "(" .$_POST['bobot_penghasilan_ortu']. ")"; ?></th>
											<th><?php echo "(" .$_POST['bobot_semester']. ")"; ?></th>
											<th><?php echo "(" .$_POST['bobot_tanggungan']. ")"; ?></th>
											<th><?php echo "(" .$_POST['bobot_saudara']. ")"; ?></th>
            					<th><?php echo "(" .$_POST['bobot_nilai_ipk']. ")"; ?></th>




            				</tr>
            	</h6></div>
            	<div class="datatable">
            		<table class="table table-hover">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Nama</th>
											<th>C1. Penghasilan Ortu (Cost)</th>
											<th>C2. Semester (Benefit)</th>
											<th>C3. Jumlah Tanggungan (Benefit)</th>
											<th>C4. Saudara (Benefit)</th>
            					<th>C5. Nilai (Benefit)</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
            				$nomor = 0;
            				$hasil = mysqli_query($mysqli,"select * from klasifikasi, calonbeasiswa where klasifikasi.id_mhs=calonbeasiswa.id_mhs");
            				while ($dataku = mysqli_fetch_array($hasil)) {
            				?>
            				<tr>
            					<td><?php echo $nomor=$nomor+1; ?></td>
            					<td><?php echo $dataku['nama_mhs']; ?></td>
											<td><?php echo $dataku['penghasilan_ortu']; ?></td>
											<td><?php echo $dataku['semester']; ?></td>
											<td><?php echo $dataku['jml_tanggungan']; ?></td>
											<td><?php echo $dataku['saudara']; ?></td>
            					<td><?php echo $dataku['nilai_ipk']; ?></td>
            				</tr>
            				<?php }	?>
            			</tbody>
            		</table>
            	</div>
            </div>

            <!-- /hover rows datatable inside panel -->
<!-- Cari nilai maximal dan minimal-->
<?php
#Cari nilai maximal
$carimax = mysqli_query($mysqli,"SELECT max(penghasilan_ortu) as max1,
								max(semester) as max2,
								max(jml_tanggungan) as max3,
								max(saudara) as max4,
								max(nilai_ipk) as max5
								FROM klasifikasi");
$max = mysqli_fetch_array($carimax);
# Cari nilai minimal
$carimin = mysqli_query($mysqli,"SELECT min(penghasilan_ortu) as min1,
								min(semester) as min2,
								min(jml_tanggungan) as min3,
								min(saudara) as min4,
								min(nilai_ipk) as min5
								FROM klasifikasi");
$min = mysqli_fetch_array($carimin);
?>
				<div class="panel panel-default">
				<div class="panel-heading"><h6 class="panel-title">Normalisasi</h6></div>
				<div class="datatable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>C1. Penghasilan Ortu (Cost)</th>
								<th>C2. Semester (Benefit)</th>
								<th>C3. Jumlah Tanggungan (cost)</th>
								<th>C4. Saudara (Benefit)</th>
								<th>C5. Nilai (Benefit)</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$nomor=0;
							$hasil = mysqli_query($mysqli,"select * from klasifikasi, calonbeasiswa where klasifikasi.id_mhs=calonbeasiswa.id_mhs");
							while ($dataku = mysqli_fetch_array($hasil)) {
							?>
							<tr>
								<td><?php echo $nomor=$nomor+1; ?></td>
								<td><?php echo $dataku['nama_mhs']; ?></td>
								<td><?php echo round($min['min1']/$dataku['penghasilan_ortu'],2); ?></td>
								<td><?php echo round($dataku['semester']/$max['max2'],2); ?></td>
								<td><?php echo round($dataku['jml_tanggungan']/$max['max3'],2); ?></td>
								<td><?php echo round($dataku['saudara']/$max['max4'],2); ?></td>
								<td><?php echo round($dataku['nilai_ipk']/$max['max5'],2);?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				</div>
				<!-- /hover rows datatable inside panel -->
<?php
$bobot_nilai_ipk		= $_POST['bobot_nilai_ipk'];
$bobot_penghasilan_ortu	= $_POST['bobot_penghasilan_ortu'];
$bobot_semester			= $_POST['bobot_semester'];
$bobot_tanggungan		= $_POST['bobot_tanggungan'];
$bobot_saudara			= $_POST['bobot_saudara'];
?>
				<div class="panel panel-default">
				<div class="panel-heading"><h6 class="panel-title">Perangkingan</h6></div>
				<div class="datatable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$nomor=0;
							$hasil = mysqli_query($mysqli,"select * from klasifikasi, calonbeasiswa where klasifikasi.id_mhs=calonbeasiswa.id_mhs");
							while ($dataku = mysqli_fetch_array($hasil)) {
							?>
							<tr>
								<td><?php echo $nomor=$nomor+1; ?></td>
								<td><?php echo $dataku['nama_mhs']; ?></td>
								<td><?php echo round((($dataku['nilai_ipk']/$max['max5'])*$bobot_nilai_ipk)+
								(($min['min1']/$dataku['penghasilan_ortu'])*$bobot_penghasilan_ortu)+
								(($dataku['semester']/$max['max2'])*$bobot_semester)+
								(($dataku['jml_tanggungan']/$max['max3'])*$bobot_tanggungan)+
								(($dataku['saudara']/$max['max4'])*$bobot_saudara),2); ?></td>
							</tr>
							<?php }	?>
						</tbody>
					</table>
				</div>
				</div>
				<!-- /hover rows datatable inside panel -->
<?php include "footer.php"; ?>
