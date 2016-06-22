<style>
	body{
		margin-top:100px;
	}
</style>

<?php


$namasekolah 		= $_POST['namasekolah'];
$nis	 			= $_POST['nis'];
$kodeks 		  	= $_POST['kodeks'];
$kodejs 			= $_POST['kodejs'];
$kodea 				= $_POST['kodea'];
$kodewi 			= $_POST['kodewi'];
$input	 			=  "INSERT INTO sekolah (idsekolah, nis, namasekolah, status, kodeks, kodejs, kodea, kodewi) VALUES (NULL, '$nis','$namasekolah','insert' ,'$kodeks', '$kodejs','$kodea','$kodewi')";


		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/sekolah/lihat'>";

}
?>
