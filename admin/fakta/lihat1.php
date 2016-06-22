

 <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
 <link href="../../css/style.css" rel="stylesheet">
 <style>
 body
 {margin-top:60px;}
 </style>
 <div class="container">
<?php
session_start();
if(empty($_SESSION['namasekolah']))
{
  header('location: ../masuk.php');
}
else{

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
include '../u_navbar.php';
include "../../koneksi/database.php"; //memanggil file koneksi_db.php
include "link.php";

//variabel _GET /
$per_halaman  = 1;   // jumlah record data per halaman

if ($hal==""||$hal==1) {
  $awal=0;
} else {
  $awal=($hal*$per_halaman)-$per_halaman;
}
$batas=$per_halaman;
$batas=($hal*2)+$per_halaman;
$query2=mysql_query("SELECT f.idsekolahFK, f.idsiswaFK, f.idwaktuFK, se.namasekolah, w.tahun, s.namasiswa
                            FROM fakta  f
                            INNER JOIN sekolah se ON f.idsekolahFK=se.idsekolah 
                            INNER JOIN siswa s ON f.idsiswaFK=s.idsiswa
                            INNER JOIN waktu w ON f.idwaktuFK=w.idwaktu WHERE namasekolah = '$_SESSION[namasekolah]'");
$mysql_query=$query2;
$jumlah_sekolah=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_sekolah/$per_halaman);
//echo $jum_halaman;
?>


<br>
<table class="table-data" border=0 width=100% >
<tr><td class="td-data" colspan="7"><b>Jumlah Keseluruhan Sekolah : <?php echo $jumlah_sekolah; ?>.</b></td></tr>
<tr>
<td class="head-data">ID Sekolah</td>
<td class="head-data">Namasekolah</td>
<td class="head-data">ID Siswa</td>
<td class="head-data">Nama Siswa</td>
<td class="head-data">ID waktu</td>
<td class="head-data">tahun</td>
<td class="head-data">Edit</td>
<td class="head-data">Hapus</td>
</tr>


<?php
while ($hasil=mysql_fetch_array($query2)) {
echo "<tr>
      <td class='td-data'>$hasil[idsekolahFK]</td>
      <td class='td-data'>$hasil[namasekolah]</a></td>
      <td class='td-data'>$hasil[idsiswaFK]</td>
      <td class='td-data'>$hasil[namasiswa]</td>
      <td class='td-data'>$hasil[idwaktuFK]</td>
      <td class='td-data'>$hasil[tahun]</td>
      <td class='td-data'><a href='edit.php?idfakta=$hasil[idfakta]'>edit</a></td>
      <td class='td-data'><a href='act_hapus.php?idfakta=$hasil[idfakta]' onclick='return confirm(\"Anda yakin ingin menghapus data sekolah $hasil[namasekolah] ?\")'>hapus</a></td></tr>";
}
?>
</table>
</div>


<!-- <br>
<form action="lihat.php" method="post">
      <button type="submit" value="Register" name="daftar" >UPLOAD</button>
</form>
<?php
    if(isset($_POST['daftar'])){   
?>
<form action="masuk.php" method="post" >
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="../laporan/import.php" method="post" enctype="multipart/form-data">
    <input type="file" id="sekolah" required name="sekolah" /><br><br><i>hanya file.xls yang bisa di upload</i><br><br><br>
    <input type="submit" name="submit" value="Upload" /><br><br>
    <label><input type="checkbox" name="drop" value="1" /> <u><i>Kosongkan tabel sql terlebih dahulu.</i></u> </label>
</form>

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('sekolah', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
<?php
}}
?>
</form> -->