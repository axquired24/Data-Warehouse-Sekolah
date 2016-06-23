<style>
	body{
		margin-top:100px;
	}
</style>
<?php

$idjurusan	 		   	= $_POST['idjurusan'];
$kode					= $_POST['kode'];
$namajurusan	 		= $_POST['namajurusan'];
$input	 				=  "INSERT INTO jurusan (idjurusan, namajurusan, kodej) VALUES ('$idjurusan', '$namajurusan','$kode')";

// Cek Adanya kode yang sudah diinput
$arrcek 	= array();
$cek 		= mysql_query("SELECT DISTINCT(j.kodej), j.status FROM jurusan j
							WHERE status != 'delete'                                      
							AND tanggal = (SELECT max(tanggal) FROM jurusan j2 WHERE j2.kodej=j.kodej)
						 ");
while($hcek = mysql_fetch_array($cek))
{
	array_push($arrcek, $hcek[kodej]);
}

// Cek kode sudah diinputkan
if(in_array($kode, $arrcek))
{
	echo "
		<script>
			alert('Kode Jurusan $kode sudah digunakan, silahkan buat kode baru.');
			history.back();
		</script>
		";
	exit();
}
// END Cek kode nis yang ada

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/jurusan/lihat'>";

}
?>
