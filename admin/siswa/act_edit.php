<style>
	body{
		margin-top:100px;
	}
</style>

<?php


// // Tambahan untuk tabel fakta
// $idsekolah 	 		= $_POST['idsekolah'];
// $idwaktu 	 		= $_POST['idwaktu'];

// Field asli tabel siswa
$nama    	 		= $_POST['namasiswa'];
$induk    	 		= $_POST['induk'];
$jeniskelamin		= $_POST['jeniskelamin'];
$nem		  		= $_POST['nem'];
$jurusan 			= $_POST['kodej'];
$input	 			=  "INSERT INTO siswa ( idsiswa, induk, namasiswa, jeniskelamin,nem, kodej,status) VALUES (null,'$induk','$nama', '$jeniskelamin', '$nem', '$jurusan','update')";

		$kirim2 				= mysql_query($input);	

		if($kirim2){
		echo "<script> alert('data berhasil di Update');</script>";
		echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/siswa/lihat'>";

}
else {
echo mysql_error();
}
?>
