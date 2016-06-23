<div class="container">
<?php 
session_start();
if(empty($_SESSION['namasekolah']))
{
	header('location: default.php?uri=modul/login/logindaftar');
}
else{

    // Induk waktu
	// select semua kodewa (CUMA yang berbeda)
    $kodeks  = mysql_query("SELECT DISTINCT(kodeks) FROM kategori_sekolah");
    $arrkodeks = array();
    while ($vkodeks = mysql_fetch_array($kodeks))
    {
      array_push($arrkodeks, $vkodeks[kodeks]);
    } // tutup while vkodewa
     $keykodeks 	= array_search($fkodeks, $arrkodeks); // cari key value nis di array arrinduk

	$kodejs  = mysql_query("SELECT DISTINCT(kodejs) FROM jenis_sekolah");
    $arrkodejs = array();
    while ($vkodejs = mysql_fetch_array($kodejs))
    {
      array_push($arrkodejs, $vkodejs[kodejs]);
    } // tutup while vkodewa
     $keykodejs 	= array_search($fkodejs, $arrkodejs); // cari key value nis di array arrinduk
	


	$kodea  = mysql_query("SELECT DISTINCT(kodea) FROM akreditasi");
    $arrkodea = array();
    while ($vkodea = mysql_fetch_array($kodea))
    {
      array_push($arrkodea, $vkodea[kodea]);
    } // tutup while vkodewa
     $keykodea 	= array_search($fkodea, $arrkodea); // cari key value nis di array arrinduk



    $kodewi  = mysql_query("SELECT DISTINCT(kodewi) FROM wilayah");
    $arrkodewi = array();
    while ($vkodewi = mysql_fetch_array($kodewi))
    {
      array_push($arrkodewi, $vkodewi[kodewi]);
    } // tutup while vkodewa
     $keykodewi 	= array_search($fkodewi, $arrkodewi); // cari key value nis di array arrinduk
	
?>
<br><br><br><br>
<form method="post" action="default.php?uri=admin/sekolah/act_input">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<tr><td class="head-data" colspan="2">Tambah Data Sekolah</td></tr>
<tr><td class="pinggir-data">Nama Sekolah</td>
<td class="pinggir-data"><input type="text" required name="namasekolah" size="50"></td></tr>
<tr><td class="pinggir-data">nis</td>
<td class="pinggir-data"><input type="text" required name="nis" size="50"></td></tr>
<tr><td class="pinggir-data">kategori</td>
<td class="pinggir-data">
	<select name="kodeks">
		<?php 
			// kodewaktu

		$qtampilterbaru = "SELECT * FROM kategori_sekolah";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodeks = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodeks[kodeks].'">'.$hasilkodeks[namakategori].'</option>';
	      } // close while hasilinduk
		?>
		</select>
</td></tr>
<tr><td class="pinggir-data">jenis</td>
<td class="pinggir-data">
<select name="kodejs">
		<?php 
			// kodewaktu
				  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM jenis_sekolah ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodejs = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodejs[kodejs].'">'.$hasilkodejs[namajenis].'</option>';
	      } // close while hasilinduk
		  
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
		
		  // tampilkan hanya yang terbaru
		  $qtampilterbaru = "SELECT * FROM (SELECT * FROM wilayah ORDER BY kodewi ASC, tanggal DESC ) as t GROUP BY kodewi Having t.status != 'delete'
		                                ";
		  $tampilterbaru  = mysql_query($qtampilterbaru);  
	      // keluarkan data induk siswa
	      while($hasilkodewi = mysql_fetch_array($tampilterbaru))
	      {
	      	echo '<option value="'.$hasilkodewi[kodewi].'">'.$hasilkodewi[namawil].'</option>';
	      } // close while hasilinduk
		
		?>
	</select>
</td></tr>
<tr><td colspan="2" align="center" class="head-data">
<input type="submit" name="submit" class="btn btn-info" value="Input"> 
<a href="default.php?uri=admin/sekolah/lihat" class="btn btn-info" role="button">Kembali</a>
</td></tr>
</table>
</div>
</form>
</div>
<?php
}
?>
