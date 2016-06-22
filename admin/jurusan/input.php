 <div class="container">
<?php 
session_start();
if(empty($_SESSION['namasekolah']))
{
	header('location:default.php?uri=modul/login/logindaftar');
}
else{	
?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/jurusan/act_input">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr>
	<td  colspan="2">Tambah Data Jurusan</td>
</tr>
<tr>
	<td >kode</td>
	<td ><input type="text" required name="kode" size="50"></td>
</tr>
<tr>
	<td > Nama Jurusan</td>
	<td><input type="text" required name="namajurusan" size="50"></td>
</tr>
<tr><td colspan="2" align="center" class="head-data">
<<input type="submit" name="submit" class="btn btn-info" value="Input"> 
<a href="default.php?uri=admin/jurusan/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>
