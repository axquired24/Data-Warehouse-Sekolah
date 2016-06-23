<style>
	body{
		margin-top:100px;
	}
</style>
<?php

$nis 		 		= $_POST['nis'];
$induk		 		= $_POST['induk'];
$kodewa		 		= $_POST['kodewa'];


$input	 			=  "INSERT INTO fakta (idfakta, nis, induk, kodewa) VALUES (NULL, '$nis','$induk', '$kodewa')";
// Cek Adanya kode yang sudah diinput
$arrcek 	= array();
$cek 		= mysql_query("SELECT DISTINCT(f.induk), f.status FROM fakta f
							WHERE status != 'delete'                                      
							AND tanggal = (SELECT max(tanggal) FROM fakta f2 WHERE f2.induk=f.induk)
						 ");
while($hcek = mysql_fetch_array($cek))
{
	array_push($arrcek, $hcek[induk]);
}

// Cek kode sudah diinputkan
if(in_array($induk, $arrcek))
{
	echo "
		<script>
			alert('Siswa dengan No.Induk $induk sudah digunakan, silahkan update.');
			history.back();
		</script>
		";
	exit();
}
// END Cek kode nis yang ada

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/fakta/lihat'>";

}
?>
