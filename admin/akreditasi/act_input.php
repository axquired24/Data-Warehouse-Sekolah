<style>
	body{
		margin-top:100px;
	}
</style>
<?php
$idakreditasi				= $_POST['idakreditasi'];
$kode						= $_POST['kode'];
$namaakreditasi   	 		= $_POST['namaakreditasi'];

$input	 			=  "INSERT INTO akreditasi (idakreditasi, namaakreditasi, kodea) VALUES ('$idakreditasi', '$namaakreditasi','$kode')";

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/akreditasi/lihat'>";

}
?>
