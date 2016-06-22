<style>
	body{
		margin-top:100px;
	}
</style>
<?php
if (isset($_POST[submit])) 
{
	$id 				= $_POST['idwilayah'];
	$kode 				= $_POST['kode'];
	$namawil 			=$_POST['namawil'];
	$kirim 				="INSERT INTO wilayah (idwilayah, namawil,status, kodewi) VALUES ('$idwilayah', '$namawil','delete','$kode')";
	
	// echo $kirim;
	// exit();

	$kirim2				= mysql_query($kirim);
	if ($kirim2) {
		echo"<script> alert('selamat data berhasil di delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/wilayah/lihat'>";
	}
}
?>