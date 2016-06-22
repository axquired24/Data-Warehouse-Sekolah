<?php
$idwaktu 			= $_POST['idwaktu'];
$kode				= $_POST['kode'];
$tahun   	 		= $_POST['tahun'];

$input	 			=   "INSERT INTO waktu (idwaktu,tahun,kodewa) VALUES (NULL, '$tahun','$kode')";

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/waktu/lihat'>";

}
else 
	echo mysql_error();

?>
