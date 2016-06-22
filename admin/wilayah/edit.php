 <div class="container">
<?php
session_start();
$id		= $_GET['idwilayah'];

	$query					= mysql_query("SELECT * FROM wilayah WHERE idwilayah='$id'");
	$hasil					= mysql_fetch_array($query);
	$idwilayah 					= $hasil['idwilayah'];
	$kode 					=$hasil['kodewi'];
	$namawil 			= $hasil['namawil'];
?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/wilayah/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td colspan="2">Edit Data Wilayah : <?php echo $namawil; ?></td></tr>
<tr>
	<td>kode</td>
	<td><input type="text" size="55" required name="kode" value="<?php echo $kode; ?>"></td></tr>
<tr>
	<td >Nama Wilayah</td>
	<td><input type="text"  size="55" required name="namawil" value="<?php echo $namawil; ?>"></td></tr>
<tr><td  colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="Update"> 
<a href="default.php?uri=admin/wilayah/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>

