<?php
$idwaktu 			= $_POST['idwaktu'];
$kode				= $_POST['kode'];
$tahun   	 		= $_POST['tahun'];

$input	 			=   "INSERT INTO waktu (idwaktu,tahun,kodewa) VALUES (NULL, '$tahun','$kode')";

// Cek Adanya kode yang sudah diinput
$arrcek 	= array();
$cek 		= mysql_query("SELECT DISTINCT(wa.kodewa), wa.status FROM waktu wa
							WHERE status != 'delete'                                      
							AND tanggal = (SELECT max(tanggal) FROM waktu wa2 WHERE wa.kodewa=wa2.kodewa)
						 ");
while($hcek = mysql_fetch_array($cek))
{
	array_push($arrcek, $hcek[kodewa]);
}

// Cek kode sudah diinputkan
if(in_array($kode, $arrcek))
{
	echo "
		<script>
			alert('Kode Waktu $kode sudah digunakan, silahkan buat kode baru.');
			history.back();
		</script>
		";
	exit();
}
// END Cek kode nis yang ada

		$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/waktu/lihat'>";

}
else 
	echo mysql_error();

?>
