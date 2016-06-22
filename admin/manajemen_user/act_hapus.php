<?php


$id		= $_GET['idlogin'];

$hapus = mysql_query("DELETE FROM loginsekolah where idlogin='$id'");
if($hapus){
		echo "<script> alert('data terhapus');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/manajemen_user/menejemenuser'>";
	}

?>
