<style>
	body{
		margin-top:100px;
	}
</style>
<?php


if(isset($_POST[submit]))
{
	$id		 	 			= $_POST['id'];
	$nis				= $_POST['nis'];
	$induk		 		= $_POST['induk'];
	$kodewa	 			= $_POST['kodewa'];
	$kirim	 				=  "INSERT INTO fakta (idfakta, nis,induk,kodewa, status) VALUES (NULL,'$nis', '$induk', '$kodewa','update')";

	
			$kirim2 				= mysql_query($kirim);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di update');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/fakta/lihat'>";
	}
}
?>
