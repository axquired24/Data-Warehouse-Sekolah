<div class="container">
<?php
$id		= $_GET['idwaktu'];

	$query					= mysql_query("SELECT * FROM waktu WHERE idwaktu='$id'");
	$hasil					= mysql_fetch_array($query);
	$idwaktu 				= $hasil['idwaktu'];
	$kode 					= $hasil['kodewa'];
	$tahun					= $hasil['tahun'];
	
?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/waktu/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td  colspan="2">Edit Data Waktu : <?php echo $tahun; ?></td></tr>
<tr><td>Kode</td>
<td><input type="text" size="5" required name="kode" value="<?php echo $kode; ?>"></td></tr>
<tr><td >Nama Tahun</td>
<td><input type="year" size="5" required name="tahun" value="<?php echo $tahun; ?>"></td></tr>
<tr><td class="head-data" colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="Update"> 
<a href="default.php?uri=admin/waktu/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>

