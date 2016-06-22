<style>
	body{
		margin-top:100px;
	}
</style>
<?php
if(isset($_POST[submit]))
{
	$id						= $_POST['idakreditasi'];
	$kode					= $_POST['kode'];
	$namaakreditasi   	 	= $_POST['namaakreditasi'];
	$kirim	 				=   "INSERT INTO akreditasi (idakreditasi, namaakreditasi, status, kodea) VALUES ('$idakreditasi', '$namaakreditasi','update','$kode')";
	echo $kirim;

		$kirim2 				= mysql_query($kirim);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di edit');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/akreditasi/lihat'>";
	
}
}
?>