
<style>
	body{
		margin-top:100px;
	}
</style>

<?php


// Tambahan untuk tabel fakta

// Field asli tabel siswa
$nama    	 		= $_POST['nama'];
$induk    	 		= $_POST['induk'];
$jeniskelamin		= $_POST['jeniskelamin'];
$nem		  		= $_POST['nem'];
$jurusan 			= $_POST['kodej'];
$input	 			=  "INSERT INTO siswa ( idsiswa, induk, namasiswa, jeniskelamin,nem, kodej) VALUES (null,'$induk','$nama', '$jeniskelamin', '$nem', '$jurusan')";

// Cek Adanya kode yang sudah diinput
$arrcek 	= array();
$cek 		= mysql_query("SELECT DISTINCT(si.induk), si.status FROM siswa si
							WHERE status != 'delete'                                      
							AND tanggal = (SELECT max(tanggal) FROM siswa si2 WHERE si.induk=si2.induk)
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

			echo "<script> alert('data berhasil di inputkan ');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/siswa/lihat'>";

}
else {
echo mysql_error();
}
?>
