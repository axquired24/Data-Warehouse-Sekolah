<div class="container">
<?php
session_start();
if(empty($_SESSION['namasekolah']))
{
	header('location: "default.php?uri=modul/login/logindaftar');
}
else{

	$idsekolah 				= mysql_query("SELECT idsekolah FROM sekolah WHERE namasekolah = '$_SESSION[namasekolah]'");
	$idsekolah 				= mysql_fetch_array($idsekolah);
	$idsekolah 				= $idsekolah[idsekolah];

	$sql_fk_jenis 			= mysql_query("SELECT * FROM siswa");
	$fk_jenis				= array();
	while($fk_jenis_isi = mysql_fetch_array($sql_fk_jenis))
	{
		$fk_jenis[$fk_jenis_isi[idjenikelamin]] = $fk_jenis_isi[jeniskelamin];
	}

// Induk jurusan
	// select semua kodej (CUMA yang berbeda)
    $kodej  = mysql_query("SELECT DISTINCT(kodej) FROM jurusan");
    $arrkodej = array();
    while ($vkodej = mysql_fetch_array($kodej))
    {
      array_push($arrkodej, $vkodej[kodej]);
    } // tutup while vkodej
	

?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/siswa/act_input">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td class="head-data" colspan="2">Tambah Data Siswa - <?php echo $_SESSION[namasekolah]." - ".$idsekolah; ?></td></tr>
<tr><td class="pinggir-data">Nis</td>
<td class="pinggir-data"><input type="text" required name="induk" size="50"></td></tr>
<tr><td class="pinggir-data">Nama Siswa</td>
<td class="pinggir-data"><input type="text" required name="nama" size="50"></td></tr>
<tr><td class="pinggir-data">jenis Kelamin</td>
<td class="pinggir-data">
<select name="jeniskelamin">
	<option value="Laki-laki"> laki-laki</option>
	<option value="Perempuan">perempuan</option>
</select>
<tr><td class="pinggir-data">Nem</td>
<td class="pinggir-data"><input type="text" required name="nem" size="15"></td></tr>
<tr><td class="pinggir-data">jurusan</td>
<td class="pinggir-data">
<select name="kodej">
		<?php 
		
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM (SELECT * FROM jurusan ORDER BY kodej ASC, tanggal DESC ) as t GROUP BY kodej Having t.status != 'delete'
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodej = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodej[kodej].'">'.$hasilkodej[namajurusan].'</option>';
	      } // close while hasilinduk
		 
		?>
	</select>
</td></tr>

<tr><td colspan="2" align="center" class="head-data">
<input type="hidden" name="idsekolah" value="<?php echo $idsekolah; ?>">
<input type="submit" name="submit" class="btn btn-info" value="Input"> 
<a href="default.php?uri=admin/siswa/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</td>
</form>
</div>
<?php

	} // TUTUP ELSE LOGIN
?>