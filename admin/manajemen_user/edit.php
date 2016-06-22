
 <div class="container">
<?php

	$id		= $_GET['idlogin'];

	$query					= mysql_query("SELECT * FROM loginsekolah WHERE idlogin='$id'");
	$hasil					= mysql_fetch_array($query);
	$id  					= $hasil['idlogin'];
	$nama					= $hasil['namasekolah'];
	$nis					= $hasil['nis'];
	$email					= $hasil['email'];
	$username				= $hasil['username'];
	$password				= $hasil['password'];
	$level					= $hasil['level'];

?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/manajemen_user/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<tr><td class="head-data" colspan="2">Edit Data Sekolah : <?php echo $namasekolah; ?></td></tr>
<tr><td class="pinggir-data">nama Sekolah</td>
<td class="pinggir-data"><input type="text" size="55" required name="nama" value="<?php echo $nama; ?>"></td></tr>
<tr><td class="pinggir-data">nis</td>
<td class="pinggir-data"><input type="text"  size="55" required name="nis" value="<?php echo $nis; ?>"></td></tr>
<tr><td class="pinggir-data">email</td>
<td class="pinggir-data"><input type="email" size="15" required name="email" value="<?php echo $email; ?>"></td></tr>
<tr><td class="pinggir-data">username</td>
<td class="pinggir-data"><input type="text" size="15" required name="username" value="<?php echo $username; ?>"></td></tr>
<tr><td class="pinggir-data">password</td>
<td class="pinggir-data"><input type="text" size="15" required name="password" value="<?php echo $password; ?>"></td></tr>
<tr><td class="pinggir-data">level</td>
<td class="pinggir-data"><input type="text" size="15" required name="level" value="<?php echo $level; ?>"></td></tr>
<tr><td class="head-data" colspan="2" align="center">
<input type="submit" name="submit" value="Update">
</td></tr>
</table>
</div>
</form>
</div>

