 <style>
 body
 {margin-top:60px;}
 </style>
 <div class="container">
<?php
session_start();
if(empty($_SESSION['namasekolah']))
{
  header('location:default.php?uri=modul/login/navbardepan');
}
else{

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
// Cari id sekolah
        $idsekolah              = mysql_query("SELECT idsekolah FROM sekolah");
        $idsekolah              = mysql_fetch_array($idsekolah);
        $idsekolah              = $idsekolah[idsekolah]; 

//variabel _GET /
$per_halaman	= 1;   // jumlah record data per halaman

if ($hal==""||$hal==1) {
	$awal=0;
} else {
	$awal=($hal*$per_halaman)-$per_halaman;
}
$batas=$per_halaman;
$batas=($hal*2)+$per_halaman;
$query2=mysql_query("SELECT * FROM akreditasi ");
$jumlah_sekolah=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_sekolah/$per_halaman);
//echo $jum_halaman;
?>
<br>
<div class="box-body table-responsive">
<table  class="table table-bordered table-striped">
<tr><td class="td-data" colspan="7"><b>Jumlah Keseluruhan Sekolah : <?php echo $jumlah_sekolah; ?>.</b></td></tr>
<tr>
<td>No</td>
<td>Nama Jurusan</td>
<td>Aksi</td>
<td>Aksi</td>
</tr>
<?php
$no=1;
while ($hasil=mysql_fetch_array($query2)) {
echo "<tr>
      <td class='td-data'>$no</td>
      <td class='td-data'>$hasil[namaakreditasi]</td>
  	  <td class='td-data'><a href='default.php?uri=admin/akreditasi/edit&idakreditasi=$hasil[idakreditasi]'>edit</a></td>
      <td> <a href='default.php?uri=admin/akreditasi/input'>input</a></td>
  	  ";
      $no++;
}
?>
</table>
</div>
</div>
<?php
}
?>