<?php
if(isset($_POST[submit]))
{

	$id 					=$_POST['id'];
	$kode					=$_POST['kode'];
	$tahun    	 			= $_POST['tahun'];
		
	$kirim	 				=   "INSERT INTO waktu (idwaktu,tahun, status, kodewa) VALUES ('$idwaktu', '$tahun','delete','$kode')";

		$kirim2 				= mysql_query($kirim);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/waktu/lihat'>";
	}
	else
		echo mysql_error();
	
}
?>
