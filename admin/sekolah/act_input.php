<style>
	body{
		margin-top:100px;
	}
</style>

<?php
$namasekolah 		= $_POST['namasekolah'];
$nis	 			= $_POST['nis'];
$kodeks 		  	= $_POST['kodeks'];
$kodejs 			= $_POST['kodejs'];
$kodea 				= $_POST['kodea'];
$kodewi 			= $_POST['kodewi'];
$input	 			=  "INSERT INTO sekolah (idsekolah, nis, namasekolah, status, kodeks, kodejs, kodea, kodewi) VALUES (NULL, '$nis','$namasekolah','insert' ,'$kodeks', '$kodejs','$kodea','$kodewi')";

	// Cek Adanya kode yang sudah diinput
	$arrceknis 	= array();
	$ceknis 	= mysql_query("SELECT DISTINCT(s.nis), s.status FROM sekolah s
								WHERE status != 'delete'                                      
								AND tanggal = (SELECT max(tanggal) FROM sekolah s2 WHERE s.nis=s2.nis)
							 ");
	while($hceknis = mysql_fetch_array($ceknis))
	{
		array_push($arrceknis, $hceknis[nis]);
	}

	// Cek kode sudah diinputkan
	if(in_array($nis, $arrceknis))
	{
		echo "
			<script>
				alert('Kode NIS $nis sudah digunakan, silahkan coba kode lain');
				history.back();
			</script>
			";
		exit();
	}
	// END Cek kode nis yang ada

	$kirim2 				= mysql_query($input);
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/sekolah/lihat'>";

}
?>
