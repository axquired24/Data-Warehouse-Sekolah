<div class="container">
<?php


session_start();



$id		= $_GET['idsekolah'];

	$query					= mysql_query("SELECT * FROM sekolah WHERE idsekolah='$id'");
	$fhasil					= mysql_fetch_array($query);
	$fid  					= $fhasil['idsekolah'];
	$fnamasekolah 			= $fhasil['namasekolah'];
	$fnis					= $fhasil['nis'];
	$fkodeks				= $fhasil['kodeks'];
	$fkodejs				= $fhasil['kodejs'];
	$fkodea	 				= $fhasil['kodea'];
	$fkodewi 				= $fhasil['kodewi'];
/// Induk siswa
	// select semua induk (CUMA yang berbeda)
    $nis  	= mysql_query("SELECT DISTINCT(nis) FROM sekolah");
    $arrnis 	= array();    
    while ($vnis= mysql_fetch_array($nis))
    {
      array_push($arrnis, $vnis[nis]);
    } // tutup while vinduk          
     $keynis 	= array_search($fnis, $arrnis); // cari key value nis di array arrinduk
    unset($arrnis[$keynis]); 	// hapus value yang ditemukan
    array_unshift($arrnis, $fnis); // set $fnis diawal array 



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
    $kodeks  = mysql_query("SELECT DISTINCT(kodeks) FROM kategori_sekolah");
    $arrkodeks = array();
    while ($vkodeks = mysql_fetch_array($kodeks))
    {
      array_push($arrkodeks, $vkodeks[kodeks]);
    } // tutup while vkodewa
     $keykodeks 	= array_search($fkodeks, $arrkodeks); // cari key value nis di array arrinduk
    unset($arrkodeks[$keykodeks]); 	// hapus value yang ditemukan
    array_unshift($arrkodeks, $fkodeks); // set $fnis diawal array 

	$kodejs  = mysql_query("SELECT DISTINCT(kodejs) FROM jenis_sekolah");
    $arrkodejs = array();
    while ($vkodejs = mysql_fetch_array($kodejs))
    {
      array_push($arrkodejs, $vkodejs[kodejs]);
    } // tutup while vkodewa
     $keykodejs 	= array_search($fkodejs, $arrkodejs); // cari key value nis di array arrinduk
    unset($arrkodejs[$keykodejs]); 	// hapus value yang ditemukan
    array_unshift($arrkodejs, $fkodejs); // set $fnis diawal array 
	
	$kodea  = mysql_query("SELECT DISTINCT(kodea) FROM akreditasi");
    $arrkodea = array();
    while ($vkodea = mysql_fetch_array($kodea))
    {
      array_push($arrkodea, $vkodea[kodea]);
    } // tutup while vkodewa
     $keykodea 	= array_search($fkodea, $arrkodea); // cari key value nis di array arrinduk
    unset($arrkodea[$keykodea]); 	// hapus value yang ditemukan
    array_unshift($arrkodea, $fkodea); // set $fnis diawal array 

        $kodewi  = mysql_query("SELECT DISTINCT(kodewi) FROM wilayah");
    $arrkodewi = array();
    while ($vkodewi = mysql_fetch_array($kodewi))
    {
      array_push($arrkodewi, $vkodewi[kodewi]);
    } // tutup while vkodewa
     $keykodewi 	= array_search($fkodewi, $arrkodewi); // cari key value nis di array arrinduk
    unset($arrkodewi[$keykodewi]); 	// hapus value yang ditemukan
    array_unshift($arrkodewi, $fkodewi); // set $fnis diawal array 

?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/sekolah/act_edit">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<tr><td class="head-data" colspan="2">Edit Data Sekolah : <?php echo $namasekolah; ?></td></tr>
<tr><td class="pinggir-data">nama Sekolah</td>
<td class="pinggir-data">
<select name="namasekolah">
	<?php 
			// sekolah
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
<tr><td class="pinggir-data">nis</td>
<td class="pinggir-data">
<select name="nis">
		<?php 
			// sekolah
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
	      	echo '<option value="'.$hasilnis[nis].'">'.$hasilnis[nis].'</option>';
	      } // close while hasilinduk
		}  // close foreach arrinduk  
		?>
	</select>
</td></tr>
<tr><td class="pinggir-data">kategori</td>
<td class="pinggir-data">
	<select name="kodeks">
		<?php 
			// kodewaktu
		foreach ($arrkodeks as $kodekskey => $kodeksvalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM kategori_sekolah 
		                                WHERE kodeks = '$kodeksvalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM kategori_sekolah WHERE kodeks='$kodeksvalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodeks = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodeks[kodeks].'">'.$hasilkodeks[namakategori].'</option>';
	      } // close while hasilinduk
		}  
		?>
		</select>
</td></tr>
<tr><td class="pinggir-data">jenis</td>
<td class="pinggir-data">
<select name="kodejs">
		<?php 
			// kodewaktu
		foreach ($arrkodejs as $kodejskey => $kodejsvalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM jenis_sekolah
		                                WHERE kodejs = '$kodejsvalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM jenis_sekolah WHERE kodejs='$kodejsvalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodejs = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodejs[kodejs].'">'.$hasilkodejs[namajenis].'</option>';
	      } // close while hasilinduk
		}  
		?>
		</select>
</td></tr>
<tr><td class="pinggir-data">akreditasi</td>
<td class="pinggir-data">
	<select name="kodea">
		<?php 
			// kodewaktu
		foreach ($arrkodea as $kodeakey => $kodeavalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM akreditasi 
		                                WHERE kodea = '$kodeavalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM akreditasi WHERE kodea='$kodeavalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodea = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodea[kodea].'">'.$hasilkodea[namaakreditasi].'</option>';
	      } // close while hasilinduk
		}  
		?>
		</select>
</td></tr>
<tr><td class="pinggir-data">wilayah</td>
<td class="pinggir-data">
<select name="kodewi">
		<?php 
			// kodewaktu
		foreach ($arrkodewi as $kodewikey => $kodewivalue) {
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM wilayah 
		                                WHERE kodewi = '$kodewivalue' 
		                                AND status != 'delete'
		                                AND tanggal = (SELECT max(tanggal) FROM wilayah WHERE kodewi='$kodewivalue')
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodewi = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodewi[kodewi].'">'.$hasilkodewi[namawil].'</option>';
	      } // close while hasilinduk
		}  
		?>
	</select>
</td></tr>
<tr><td class="head-data" colspan="2" align="center">
<input type="submit" name="submit" class="btn btn-info" value="Update"> 
<a href="default.php?uri=admin/sekolah/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>

