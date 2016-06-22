<style>
	body{
		margin-top:100px;
	}
</style>
<?php
if(isset($_POST[submit]))
{
	$id						= $_POST['idakreditasi'];
	$kode					= $_POST['kodea'];
	$namaakreditasi   	 	= $_POST['namaakreditasi'];
	$input	 			=  "INSERT INTO akreditasi (idakreditasi, namaakreditasi, kodea, status) VALUES ('$idakreditasi', '$namaakreditasi','$kode','delete')";
	echo $input;
	exit();

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/akreditasi/lihat'>";
	
}
}
?>