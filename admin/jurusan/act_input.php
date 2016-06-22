<style>
	body{
		margin-top:100px;
	}
</style>
<?php

$idjurusan	 		   	= $_POST['idjurusan'];
$kode					= $_POST['kode'];
$namajurusan	 		= $_POST['namajurusan'];
$input	 				=  "INSERT INTO jurusan (idjurusan, namajurusan, kodej) VALUES ('$idjurusan', '$namajurusan','$kode')";

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/jurusan/lihat'>";

}
?>
