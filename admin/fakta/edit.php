<div class="container">
<?php

session_start();
if(empty($_SESSION['namasekolah']))
{
	header('');
}
else{


	$id		= $_GET['idfakta'];

	$query					= mysql_query("SELECT * FROM fakta WHERE idfakta='$id'");
	$fhasil					= mysql_fetch_array($query);
	$fid  					= $fhasil['idfakta'];
	$finduk  				= $fhasil['induk'];
	$fnis 		 			= $fhasil['nis'];
	$fkodewa 				= $fhasil['kodewa'];
	
// Induk siswa
	// select semua induk (CUMA yang berbeda)
    $induk  	= mysql_query("SELECT DISTINCT(induk) FROM siswa");
    $arrinduk 	= array();    
    while ($vinduk = mysql_fetch_array($induk))
    {
      array_push($arrinduk, $vinduk[induk]);
    } // tutup while vinduk          
     $keyinduk 	= array_search($finduk, $arrinduk); // cari key value nis di array arrinduk
    unset($arrinduk[$keyinduk]); 	// hapus value yang ditemukan
    array_unshift($arrinduk, $finduk); // set $fnis diawal array 



	// Induk sekolah
	// select semua nis (CUMA yang berbeda)
    $nis  = mysql_query("SELECT DISTINCT(nis) FROM sekolah");
    $arrnis = array();
    while ($vnis = mysql_fetch_array($nis))
    {
      array_push($arrnis, $vnis[nis]);
    } // tutup while vnis 
    $keynis 	= array_search($fnis, $arrnis); // cari key value nis di array arrinduk
    unset($arrnis[$keynis]); 	// hapus value yang ditemukan
    array_unshift($arrnis, $fnis); // set $fnis diawal array 


    // Induk waktu
	// select semua kodewa (CUMA yang berbeda)
    $kodewa  = mysql_query("SELECT DISTINCT(kodewa) FROM waktu");
    $arrkodewa = array();
    while ($vkodewa = mysql_fetch_array($kodewa))
    {
      array_push($arrkodewa, $vkodewa[kodewa]);
    } // tutup while vkodewa
     $keykodewa 	= array_search($fkodewa, $arrkodewa); // cari key value nis di array arrinduk
    unset($arrkodewa[$keykodewa]); 	// hapus value yang ditemukan
    array_unshift($arrkodewa, $fkodewa); // set $fnis diawal array 

	
	

	?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/fakta/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td class="head-data" colspan="2">Tambah Data Sekolah</td></tr>
<!-- <tr><td class="pinggir-data">Nama Sekolah</td>
<td class="pinggir-data"><input type="text" required name="namasekolah" size="50"></td></tr> -->
<tr><td class="pinggir-data">ID SISWA</td>
<td class="pinggir-data">
	<select name="induk">
	<?php 
		foreach ($arrinduk as $indukkey => $indukvalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM siswa 
		                                WHERE induk = '$indukvalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM siswa WHERE induk='$indukvalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilinduk = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilinduk[induk].'">'.$hasilinduk[namasiswa].'</option>';
	      } // close while hasilinduk
		}  // close foreach arrinduk  
	?>
	</select>
</td></tr>
<tr><td class="pinggir-data">ID SEKOLAH</td>
<td class="pinggir-data">
	<select name="nis">
		<?php 
		foreach ($arrnis as $niskey => $nisvalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM sekolah 
		                                WHERE nis = '$nisvalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM sekolah WHERE nis='$nisvalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilnis = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilnis[nis].'">'.$hasilnis[namasekolah].'</option>';
	      } // close while hasilinduk
		}  // close foreach arrinduk  
	?>
	</select>
</td></tr>
<tr><td class="pinggir-data">Tahun</td>
<td class="pinggir-data">
<select name="kodewa">
		<?php 
			// kodewaktu
		foreach ($arrkodewa as $kodewakey => $kodewavalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM waktu 
		                                WHERE kodewa = '$kodewavalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM waktu WHERE kodewa='$kodewavalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodewa = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodewa[kodewa].'">'.$hasilkodewa[tahun].'</option>';
	      } // close while hasilinduk
		}  
		?>
	</select>
</td></tr>
<tr><td colspan="2" align="center" class="head-data">
<input type="submit" name="submit" class="btn btn-info" value="update"> 
<a href="default.php?uri=admin/fakta/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>