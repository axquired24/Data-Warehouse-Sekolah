<div class="container">
<?php

session_start();
if(empty($_SESSION['namasekolah']))
{
	header('location: "default.php?uri=modul/login/logindaftar');
}
else{

$id		= $_GET['idsiswa'];

	$query					= mysql_query("SELECT * FROM siswa WHERE idsiswa='$id'");
	$hasil					= mysql_fetch_array($query);
	$id  					= $hasil['idsiswa'];
	$induk 					= $hasil['induk'];
	$namasiswa	 			= $hasil['namasiswa'];
	$jeniskelamin			= $hasil['jeniskelamin'];
	$nem					= $hasil['nem'];
	$fkodej					= $fhasil['kodej'];

// Induk waktu
	// select semua kodewa (CUMA yang berbeda)
    $kodej  = mysql_query("SELECT DISTINCT(kodej) FROM jurusan");
    $arrkodej = array();
    while ($vkodej = mysql_fetch_array($kodej))
    {
      array_push($arrkodej, $vkodej[kodej]);
    } // tutup while vkodewa
     $keykodej 	= array_search($fkodej, $arrkodej); // cari key value nis di array arrinduk
    unset($arrkodej[$keykodej]); 	// hapus value yang ditemukan
    array_unshift($arrkodej, $fkodej); // set $fnis diawal array 


	?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/siswa/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<tr><td class="head-data" colspan="2">Edit Data Siswa : <?php echo $namasiswa; ?></td></tr>
<tr><td class="pinggir-data">Nis</td>
<td class="pinggir-data"><input type="text" size="55" required name="induk" value="<?php echo $induk; ?>"></td></tr>
<tr><td class="pinggir-data">Nama Siswa</td>
<td class="pinggir-data"><input type="text" size="55" required name="namasiswa" value="<?php echo $namasiswa; ?>"></td></tr>
<tr><td class="pinggir-data">jenis kelamin</td>
<td class="pinggir-data">
	<select name="jeniskelamin">
	<option value="Laki-laki" <?php if($jeniskelamin == 'Laki-laki'){ echo "selected"; } ?> > laki-laki</option>
	<option value="Perempuan" <?php if($jeniskelamin == 'Perempuan'){ echo "selected"; } ?> >perempuan</option>
	</select>
</td></tr>
<tr><td class="pinggir-data">nem</td>
<td class="pinggir-data"><input type="text" size="15" required name="nem" value="<?php echo $nem; ?>"></td></tr>
<tr><td class="pinggir-data">jurusan</td>
<td class="pinggir-data">
<select name="kodej">
		<?php 
			// kodewaktu
		// foreach ($arrkodej as $kodejkey => $kodejvalue) {
		  // tampilkan hanya yang terbaru
		   $qtampilterbaru = "SELECT * FROM (SELECT * FROM jurusan ORDER BY kodej ASC, tanggal DESC ) as t GROUP BY kodej Having t.status != 'delete'";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodej = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodej[kodej].'">'.$hasilkodej[namajurusan].'</option>';
	      } // close while hasilinduk
		// }  
		?>
	</select>
</td></tr>
<tr><td class="head-data" colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="Update"> 
<a href="default.php?uri=admin/siswa/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>

<!-- $sql_fk_jeniskelamin 			= mysql_query("SELECT * FROM siswa WHERE idsiswa NOT IN ('$jeniskelamin')");
	$fk_jeniskelamin				= array();
	while($fk_jeniskelamin_isi = mysql_fetch_array($sql_fk_jeniskelamin))
	{
		$fk_jeniskelamin[$fk_jeniskelamin_isi[idsiswa]] = $fk_jeniskelamin_isi[jeniskelamin];
	}
	
	$isi_jeniskelamin_terisi 	= mysql_query("SELECT * FROM jeniskelamin WHERE idsiswa='$jeniskelamin'");
	$isi_jeniskelamin_terisi 	= mysql_fetch_array($isi_jeniskelamin_terisi);
	$isi_jeniskelamin_terisi 	= $isi_jeniskelamin_terisi[jeniskelamin];

<?php 
			echo "<option value='$jeniskelamin'> $isi_jeniskelamin_terisi </option>";
			foreach ($fk_jeniskelamin as $key => $value) {
				echo "<option value='$key'> $value </option>";
			}
		?> -->