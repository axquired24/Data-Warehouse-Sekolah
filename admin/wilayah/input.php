 <div class="container">
<?php 
session_start();
if(empty($_SESSION['namasekolah']))
{
	header('location:default.php?uri=modul/login/daftaradmin');
}
else{
	
?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/wilayah/act_input">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td class="head-data" colspan="2">Tambah DataWilayah </td></tr>
<tr>
<td >Kode</td>
<td class="pinggir-data"><input type="text" required name="kodewi" size="50"></td></tr>
<tr>
<td >Nama Wilayah</td>
<td ><input type="text" required name="namawil" size="50"></td></tr>
<tr><td colspan="2" align="center" class="head-data">
<input type="submit" name="submit" class="btn btn-info" value="Input"> 
<a href="default.php?uri=admin/wilayah/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>