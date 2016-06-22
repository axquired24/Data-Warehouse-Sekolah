<div class="container">
<?php
session_start();

$id		= $_GET['idjurusan'];

	$query					= mysql_query("SELECT *FROM jurusan WHERE idjurusan='$id'");
	$hasil					= mysql_fetch_array($query);
	$idjurusan				= $hasil['idjurusan'];
	$kode 					= $hasil['kodej'];
	$namajurusan			= $hasil['namajurusan'];
?>



<br><br><br><br>
<div class="row">
<form method="post" action="default.php?uri=admin/jurusan/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td colspan="2">Edit Data Jurusan : <?php echo $namajurusan; ?></td></tr>
<tr>
<td >Kode</td>
<td> <input type="text" size="50" required name="kode" value="<?php echo $kode; ?>"></td></tr>
<tr>
<td > Nama Jurusan </td>
<td><input type="text"  size="50" required name="namajurusan" value="<?php echo $namajurusan; ?>"></td></tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="edit"> 
<a href="default.php?uri=admin/jurusan/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>


