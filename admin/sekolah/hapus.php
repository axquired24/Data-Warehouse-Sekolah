
<style>
	body{
		margin-top:100px;
	}
</style><div class="container">
<?php


session_start();



$id		= $_GET['idsekolah'];

	$query					= mysql_query("SELECT * FROM sekolah WHERE idsekolah='$id'");
	$hasil					= mysql_fetch_array($query);
	$id  					= $hasil['idsekolah'];
	$namasekolah 			= $hasil['namasekolah'];
	$nis					= $hasil['nis'];
	$kategori				= $hasil['kodeks'];
	$jenis					= $hasil['kodejs'];
	$akreditasi 			= $hasil['kodea'];
	$wilayah 				= $hasil['kodewi'];
$input	 			=  "INSERT INTO sekolah (idsekolah, nis, namasekolah, kodeks, kodejs, kodea, kodewi, status) VALUES (NULL, '$nis','$namasekolah', '$kategori', '$jenis','$akreditasi','$wilayah','delete')";


		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di Delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/sekolah/lihat'>";

}
	
?>
<!-- <br><br><br><br>
<form method="post" action="default.php?uri=admin/sekolah/act_hapus">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td class="head-data" colspan="2">Edit Data Sekolah : <?php echo $namasekolah; ?></td></tr>
<tr><td class="pinggir-data">nama Sekolah</td>
<td class="pinggir-data"><input type="text" size="55" required name="nama" value="<?php echo $namasekolah; ?>" disabled></td></tr>
<tr><td class="pinggir-data">nis</td>
<td class="pinggir-data"><input type="text"  size="55" required name="nis" value="<?php echo $nis; ?>" disabled></td></tr>
<tr><td class="pinggir-data">ketegori</td>
<td class="pinggir-data">
<input type="text" size="55" required name="kategori" value="<?php echo $kategori; ?>" disabled>
		
</td></tr>
<tr><td class="pinggir-data">jenis</td>
<td class="pinggir-data">
<input type="text" size="55" required name="jenis" value="<?php echo $jenis;?>" disabled>
		
</td></tr>
<tr><td class="pinggir-data">akreditasi</td>
<td class="pinggir-data">
	<input type="text" size="55" required name="akreditasi" value="<?php echo $akreditasi;?>" disabled>
		
</td></tr>
<tr><td class="pinggir-data">wilayah</td>
<td class="pinggir-data"><input type="text" size="55" required name="wilayah" value="<?php echo $wilayah;?>" disabled>
		
</td></tr>
<tr><td class="head-data" colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="Hapus"> 
<a href="default.php?uri=admin/sekolah/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>

 -->