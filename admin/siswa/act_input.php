
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

		$kirim2 				= mysql_query($input);
		if($kirim2){

			echo "<script> alert('data berhasil di inputkan ');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/siswa/lihat'>";

}
else {
echo mysql_error();
}
?>
