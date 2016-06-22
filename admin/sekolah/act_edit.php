
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
$input	 			=  "INSERT INTO sekolah (idsekolah, nis, namasekolah, kodeks, kodejs, kodea, kodewi, status) VALUES (NULL, '$nis','$namasekolah', '$kodeks', '$kodejs','$kodea','$kodewi','update')";
// echo $input;
// exit();

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di update');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/sekolah/lihat'>";

}
?>
