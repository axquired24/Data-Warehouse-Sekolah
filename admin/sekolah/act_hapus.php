<style>
	body{
		margin-top:100px;
	}
</style>
<?php


$nama    	 		= $_POST['namasekolah'];
$nis	 			= $_POST['nis'];
$kategori 		  	= $_POST['kategori'];
$jenis 				= $_POST['jenis'];
$akreditasi 		= $_POST['akreditasi'];
$wilayah 			= $_POST['wilayah'];
$input	 			=  "INSERT INTO sekolah (idsekolah, nis, namasekolah, kodeks, kodejs, kodea, kodewi, status) VALUES (NULL, '$nis','$nama', '$kategori', '$jenis','$akreditasi','$wilayah','delete')";
echo $input;
exit();

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di Delete');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/sekolah/lihat'>";

}
?>
