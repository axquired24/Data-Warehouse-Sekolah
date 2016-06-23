<div class="container">
<?php
session_start();
$id		= $_GET['idakreditasi'];

	$query					= mysql_query("SELECT * FROM akreditasi WHERE idakreditasi='$id'");
	$hasil					= mysql_fetch_array($query);
	$idakreditasi			= $hasil['idakreditasi'];
	$kode					= $hasil['kodea'];
	$namaakreditasi			= $hasil['namaakreditasi'];


?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/akreditasi/act_hapus" enctype="multipart/form-data">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr>
	<td colspan="2">Anda yakin ingin menghapus Data Akreditasi : <?php echo $namaakreditasi; ?></td></tr>
	<tr>
		<td >kode</td> 
		<td >
			<input type="text" size="55" required disabled value="<?php echo $kode; ?>">
			<input type="hidden" size="55" required name="kodea" value="<?php echo $kode; ?>">
		</td>
	</tr>
	<tr>
		<td >Nama Akreditasi</td>
		<td >
			<input type="text"  size="55" required disabled value="<?php echo $namaakreditasi; ?>">
			<input type="hidden"  size="55" required name="namaakreditasi" value="<?php echo $namaakreditasi; ?>">
		</td>
	</tr>
	<tr>
	<td colspan="2" align="center">
			<input type="submit" name="submit" class="btn btn-info" value="Hapus"> 
		<a href="default.php?uri=admin/akreditasi/lihat" class="btn btn-info" role="button">Kembali</a> 
		</td>
</tr>
</table>
</div>
</form>
</div>

