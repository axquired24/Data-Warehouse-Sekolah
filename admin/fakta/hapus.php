<div class="container">
<?php

session_start();
if(empty($_SESSION['namasekolah']))
{
	header('');
}
else{


$id		= $_GET['idfakta'];

	$query					= mysql_query("SELECT * FROM fakta WHERE idfakta='$id'");
	$hasil					= mysql_fetch_array($query);
	$id  					= $hasil['idfakta'];
	$induk 					= $hasil['induk'];
	$nis 					= $hasil['nis'];
	$kodewa					= $hasil['kodewa'];
		$kirim	 				=  "INSERT INTO fakta (idfakta, nis,induk,kodewa, status) VALUES (NULL,'$nis', '$induk', '$kodewa','delete')";

	// $sql_fk_kategori 			= mysql_query("SELECT * FROM jurusan WHERE idjurusan NOT IN ('$jurusan')");
	// $fk_kategori				= array();
	// while($fk_kategori_isi = mysql_fetch_array($sql_fk_kategori))
	// {
	// 	$fk_kategori[$fk_kategori_isi[idjurusan]] = $fk_kategori_isi[namajurusan];
	// }
	
	// $isi_kategori_terisi 	= mysql_query("SELECT * FROM jurusan WHERE idjurusan='$jurusan'");
	// $isi_kategori_terisi 	= mysql_fetch_array($isi_kategori_terisi);
	// $isi_kategori_terisi 	= $isi_kategori_terisi[namajurusan];

			$kirim2 				= mysql_query($kirim);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di delete');</script>";
		echo "<meta http-equiv='refresh' content='0;  url=default.php?uri=admin/fakta/lihat'>";
	
}
?>
<?php
}
?>