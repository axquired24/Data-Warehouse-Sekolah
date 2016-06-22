
 <div class="container">
<?php 
session_start();
if(empty($_SESSION['namasekolah']))
{
	header('location: =default.php?uri=modul/login/logindaftar');
}
else{
?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/akreditasi/act_input">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td  colspan="2">Tambah Data Akreditasi</td></tr>
<tr><td  >Kode Akreditasi</td><td  ><input type="text" required name="kode" size="50"></td></tr>
<tr><td  >Nama Akreditasi</td><td  ><input type="text" required name="namaakreditasi" size="50"></td></tr>
<tr><td colspan="2" align="center" >
<input type="submit" name="submit" class="btn btn-info" value="Input"> 
<a href="default.php?uri=admin/akreditasi/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>