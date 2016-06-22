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
// Ambil id sekolah
$idsekolah              = mysql_query("SELECT idsekolah FROM sekolah WHERE namasekolah = '$_SESSION[namasekolah]'");
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
if ($_SESSION['level']=="user") {
    $query2=mysql_query("SELECT siswa.*, jurusan.* FROM siswa INNER JOIN jurusan ON jurusan.idjurusan=siswa.idjurusanFK INNER JOIN fakta ON siswa.idsiswa=fakta.idsiswaFK WHERE fakta.idsekolahFK = $idsekolah");
} else {
    $query2=mysql_query("SELECT siswa.*, jurusan.* FROM siswa INNER JOIN jurusan ON jurusan.idjurusan=siswa.idjurusanFK INNER JOIN fakta ON siswa.idsiswa=fakta.idsiswaFK ");
}


$jumlah_sekolah=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_sekolah/$per_halaman);
//echo $jum_halaman;
?>
<br>
<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
<tr><td class="td-data" colspan="8"><b>Jumlah Keseluruhan fakta: <?php echo $jumlah_sekolah; ?>.</b></td></tr>
<tr>
<td >Nis</td>
<td >Nama Siswa</td>
<td >Jenis kelamin</td>
<td >Nem</td>
<td >Jurusan</td>
<td  > actoin</td>
<td  > actoin</td>
<td  > actoin</td>
</tr>


<?php
while ($hasil=mysql_fetch_array($query2)) {
echo "
    <tr>
     <td >$hasil[induk]</td>
    <td ><a href='detil.php?namasiswa$hasil[namasiswa]'>$hasil[namasiswa]</a></td>
    <td >$hasil[jeniskelamin]</td>
    <td >$hasil[nem]</td>
    <td >$hasil[namajurusan]</td>
    <td ><a href='default.php?uri=admin/siswa/input'>Input</a></td>
	<td ><a href='default.php?uri=admin/siswa/edit&idsiswa=$hasil[idsiswa]'>edit</a></td>
    <td ><a href='default.php?uri=admin/siswa/hapus&idsiswa=$hasil[idsiswa]'>Hapus</a></td>
	";
}
?>
</table>
</div>


<br>
<form action="default.php?uri=admin/siswa/lihat" method="post">
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
</form>