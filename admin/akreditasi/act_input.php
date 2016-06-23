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

// Cek Adanya kode yang sudah diinput
$arrcek 	= array();
$cek 		= mysql_query("SELECT DISTINCT(a.kodea), a.status FROM akreditasi a
							WHERE status != 'delete'                                      
							AND tanggal = (SELECT max(tanggal) FROM akreditasi a2 WHERE a.kodea=a2.kodea)
						 ");
while($hcek = mysql_fetch_array($cek))
{
	array_push($arrcek, $hcek[kodea]);
}

// Cek kode sudah diinputkan
if(in_array($kode, $arrcek))
{
	echo "
		<script>
			alert('Kode Akreditasi $kode sudah digunakan, silahkan coba kode lain');
			history.back();
		</script>
		";
	exit();
}
// END Cek kode nis yang ada

	$kirim2 				= mysql_query($input);	
	if($kirim2){
		echo "<script> alert('selamat data dapat di masukkan');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/akreditasi/lihat'>";

}
?>
