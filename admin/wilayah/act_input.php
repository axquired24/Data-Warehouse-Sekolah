<style>
	body{
		margin-top:100px;
	}
</style>
<?php
$idwilayah    	 		= $_POST['idwilayah'];
$kode					= $_POST['kodewi'];
$namawil	 			= $_POST['namawil'];
$input	 				=  "INSERT INTO wilayah (idwilayah, namawil, kodewi) VALUES ('$idwilayah', '$namawil','$kode')";
echo $input;
	$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/wilayah/lihat'>";

}
?>
