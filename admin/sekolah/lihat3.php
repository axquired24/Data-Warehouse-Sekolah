<style>
 body
 {margin-top:60px;}
 </style>
 <div class="container">
<?php
session_start();
if(empty($_SESSION['namasekolah']))
{
  header('location: default.php?uri=modul/login/logindaftar');
}
else{

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

        // Cari id sekolah
        $idsekolah              = mysql_query("SELECT idsekolah FROM sekolah WHERE namasekolah = '$_SESSION[namasekolah]'");
        $idsekolah              = mysql_fetch_array($idsekolah);
        $idsekolah              = $idsekolah[idsekolah]; 

//variabel _GET /
$per_halaman  = 1;   // jumlah record data per halaman

if ($hal==""||$hal==1) {
  $awal=0;
} else {
  $awal=($hal*$per_halaman)-$per_halaman;
}
$batas=$per_halaman;
$batas=($hal*2)+$per_halaman;
if ($_SESSION['level']=='user') {
  $query2=mysql_query("SELECT sekolah.*, kategori_sekolah.*, jenis_sekolah.*,wilayah.*,akreditasi.* FROM sekolah INNER JOIN kategori_sekolah ON sekolah.idkategorisekolahFK=kategori_sekolah.idkategorisekolah INNER JOIN jenis_sekolah ON sekolah.idjenissekolahFK=jenis_sekolah.idjenissekolah INNER JOIN wilayah ON sekolah.idwilayahFK=wilayah.idwilayah INNER JOIN akreditasi ON sekolah.idakreditasiFK=akreditasi.idakreditasi INNER JOIN fakta ON sekolah.idsekolah=fakta.idsekolahFK
  WHERE fakta.idsekolahFK = $idsekolah");
} else {
$query2=mysql_query("SELECT sekolah.*, kategori_sekolah.*, jenis_sekolah.*,wilayah.*,akreditasi.* FROM sekolah INNER JOIN kategori_sekolah ON sekolah.idkategorisekolahFK=kategori_sekolah.idkategorisekolah INNER JOIN jenis_sekolah ON sekolah.idjenissekolahFK=jenis_sekolah.idjenissekolah INNER JOIN wilayah ON sekolah.idwilayahFK=wilayah.idwilayah INNER JOIN akreditasi ON sekolah.idakreditasiFK=akreditasi.idakreditasi INNER JOIN fakta ON sekolah.idsekolah=fakta.idsekolahFK");
$jumlah_sekolah=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_sekolah/$per_halaman);
}
//echo $jum_halaman;
?>


<br><div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
<tr><td  colspan="10"><b>Jumlah Keseluruhan Sekolah : <?php echo $jumlah_sekolah; ?>.</b></td></tr>
<tr>
<td >No</td>
<td >Namasekolah</td>
<td >NISN</td>
<td >kategori</td>
<td >jenis</td>
<td >Akreditasi</td>
<td >wilayah</td>
<td >input</td>
<td >Edit</td>
<td >Hapus</td>
</tr>


<?php
$no=1;
while ($hasil=mysql_fetch_array($query2)) {
echo "<tr>
      <td >$no</td>
      <td class='pinggir-data'><a href='detil.php?namasekolah=$hasil[namasekolah]'>$hasil[namasekolah]</a></td>      
      <td >$hasil[nis]</td>
      <td >$hasil[namakategori]</td>
      <td >$hasil[namajenis]</td>
      <td >$hasil[namaakreditasi]</td>
      <td >$hasil[namawil]</td>
      <td ><a href='default.php?uri=admin/sekolah/input'>Input</a></td>
      <td ><a href='default.php?uri=admin/sekolah/edit&idsekolah=$hasil[idsekolah]'>edit</a></td>
      <td ><a href='default.php?uri=admin/sekolah/hapus&idsekolah=$hasil[idsekolah]'>Hapus</a></td>";
      $no++;
}
?>
</table>

</div>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
</div>

<?php
}
?>
