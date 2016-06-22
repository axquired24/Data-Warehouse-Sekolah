 <style>
 body
 {margin-top:60px;}
 </style>
 <div class="container">
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
//variabel _GET /
$per_halaman	= 1;   // jumlah record data per halaman

if ($hal==""||$hal==1) {
	$awal=0;
} else {
	$awal=($hal*$per_halaman)-$per_halaman;
}
$batas=$per_halaman;
$batas=($hal*2)+$per_halaman;
$query2=mysql_query("SELECT * from waktu");
$jumlah_sekolah=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_sekolah/$per_halaman);
//echo $jum_halaman;
?>
<br>
<div class="box-body table-responsive">
<table  class="table table-bordered table-striped">
<tr><td  colspan="7"><b>Jumlah tahun: <?php echo $jumlah_sekolah; ?>.</b></td></tr>
<tr>
<td>no</td>
<td> tahun</td>
<td>Aksi</td>
<td>Aksi</td>
</tr>
<?php
$no=1;
while ($hasil=mysql_fetch_array($query2)) {
echo "<tr>
      <td >$no</td>
	  <td >$hasil[tahun]</td>
	 <td ><a href='default.php?uri=admin/waktu/edit&idwaktu=$hasil[idwaktu]'>edit</a></td>
	  <td><a href='default.php?uri=admin/waktu/input'>input</a></td></tr>";
 $no++;} 
?>
</table>
</div>
</div>