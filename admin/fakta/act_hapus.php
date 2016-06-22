<style>
	body{
		margin-top:100px;
	}
</style>
<?php


if(isset($_POST[submit]))
{
	$id		 	 			= $_POST['id'];
	$idsekolah				= $_POST['idsekolahFK'];
	$idsiswa		 		= $_POST['idsiswaFK'];
	$idwaktu	 			= $_POST['idwaktuFK'];
	$kirim	 				=  "INSERT INTO fakta (idfakta, idsekolahFK,idsiswaFK, idwaktuFK, status) VALUES (NULL,'$idsiswa', '$idsekolah, '$idwaktu','delete')";

			$kirim2 				= mysql_query($kirim);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=lihat.php'>";
	}
}
?>
