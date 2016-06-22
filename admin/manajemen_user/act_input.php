<?php


$nama    	 		= $_POST['namasekolah'];
$nis	 			= $_POST['nis'];
$jarak		 		= $_POST['jarak'];
$kategori 		  	= $_POST['kategori'];
$jenis 				= $_POST['jenis'];
$akreditasi 		= $_POST['akreditasi'];
$wilayah 			= $_POST['wilayah'];
$input	 			=  "INSERT INTO sekolah (idsekolah, nis, namasekolah, jarak, idkategorisekolahFK, idjenissekolahFK, idakreditasiFK, idwilayahFK) VALUES (NULL, '$nis','$nama', '$jarak', '$kategori', '$jenis','$akreditasi','$wilayah')";
		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/manajemen_user/menejemenuser'>";

}
?>
