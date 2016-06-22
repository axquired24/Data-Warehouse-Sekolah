<style>
	body{
		margin-top:100px;
	}
</style>
<?php
if(isset($_POST[submit]))
{
	$id		 	 					= $_POST['idjurusan'];
	$kode 							= $_POST['kode'];
	$namajurusan    	 			= $_POST['namajurusan'];

	$kirim	 				=   "INSERT INTO jurusan (idjurusan, namajurusan, status, kodej) VALUES ('$idjurusan', '$namajurusan','update','$kode')";

			$kirim2 				= mysql_query($kirim);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di update');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/jurusan/lihat'>";
	}
}
?>
