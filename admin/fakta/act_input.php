<style>
	body{
		margin-top:100px;
	}
</style>
<?php

$nis 		 		= $_POST['nis'];
$induk		 		= $_POST['induk'];
$kodewa		 		= $_POST['kodewa'];


$input	 			=  "INSERT INTO fakta (idfakta, nis, induk, kodewa) VALUES (NULL, '$nis','$induk', '$kodewa')";


		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/fakta/lihat'>";

}
?>
