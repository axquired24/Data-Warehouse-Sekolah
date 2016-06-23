<style>
	body{
		margin-top:100px;
	}
</style>
<?php
$idwilayah    	 		= $_POST['idwilayah'];
$kode					= $_POST['kodewi'];
$namawil	 			= $_POST['namawil'];
$input	 				=  "INSERT INTO wilayah (idwilayah, namawil, kodewi) VALUES ('$idwilayah', '$namawil','$kode')";

// Cek Adanya kode yang sudah diinput
$arrcek 	= array();
$cek 		= mysql_query("SELECT DISTINCT(wi.kodewi), wi.status FROM wilayah wi
							WHERE status != 'delete'                                      
							AND tanggal = (SELECT max(tanggal) FROM wilayah wi2 WHERE wi.kodewi=wi2.kodewi)
						 ");
while($hcek = mysql_fetch_array($cek))
{
	array_push($arrcek, $hcek[kodewi]);
}

// Cek kode sudah diinputkan
if(in_array($kode, $arrcek))
{
	echo "
		<script>
			alert('Kode Wilayah $kode sudah digunakan, silahkan buat kode baru.');
			history.back();
		</script>
		";
	exit();
}
// END Cek kode nis yang ada
	$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/wilayah/lihat'>";

}
?>
