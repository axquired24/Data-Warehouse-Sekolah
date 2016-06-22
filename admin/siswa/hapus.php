
<style>
	body{
		margin-top:100px;
	}
</style>
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
	$kodej					= $hasil['kodej'];

	$input	 			=  "INSERT INTO siswa ( idsiswa, induk, namasiswa, jeniskelamin,nem, kodej,status) VALUES (null,'$induk','$namasiswa', '$jeniskelamin', '$nem', '$kodej,'delete')";
echo $input;
exit();

		$kirim2 				= mysql_query($input);	

		if($kirim2){
		echo "<script> alert('data berhasil di delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/siswa/lihat'>";

}

// Induk waktu
	// // select semua kodewa (CUMA yang berbeda)
 //    $kodej  = mysql_query("SELECT DISTINCT(kodej) FROM jurusan");
 //    $arrkodej = array();
 //    while ($vkodej = mysql_fetch_array($kodej))
 //    {
 //      array_push($arrkodej, $vkodej[kodej]);
 //    } // tutup while vkodewa
 //     $keykodej 	= array_search($fkodej, $arrkodej); // cari key value nis di array arrinduk
 //    unset($arrkodej[$keykodej]); 	// hapus value yang ditemukan
 //    array_unshift($arrkodej, $fkodej); // set $fnis diawal array 


	?>
<!-- <br><br><br><br>
<form method="post" action="default.php?uri=admin/siswa/act_hapus">
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
<input type="submit" name="submit" class="btn btn-info" value="delete"> 
<a href="default.php?uri=admin/siswa/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div> -->
<?php
}
?>
































<!-- <div class="container">
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
	$jurusan				= $hasil['kodej'];

	?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/siswa/act_hapus">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->

<!-- <tr><td class="head-data" colspan="2">anda yakin ingin menghapus Data Siswa : <?php echo $namasiswa; ?></td></tr>
<tr><td class="pinggir-data">Nis</td>
<td class="pinggir-data"><input type="text" size="55" required name="induk" value="<?php echo $induk; ?>" disabled></td></tr>
<tr><td class="pinggir-data">Nama Siswa</td>
<td class="pinggir-data"><input type="text" size="55" required name="namasiswa" value="<?php echo $namasiswa; ?>" disabled></td></tr>
<tr><td class="pinggir-data">jenis kelamin</td>
<td class="pinggir-data"><input type="text" size="15" required name="jeniskelamin" value="<?php echo $jeniskelamin; ?>" disabled></td></tr>
<tr><td class="pinggir-data">nem</td>
<td class="pinggir-data"><input type="text" size="15" required name="nem" value="<?php echo $nem; ?>" disabled></td></tr>
<tr><td class="pinggir-data">jurusan</td>
 <td class="pinggir-data"><input type="text" size="15" required name="kodej" value="<?php echo $jurusan; ?>" disabled></td></tr>
<tr><td class="head-data" colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="Hapus"> 
<a href="default.php?uri=admin/siswa/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>

 --> 