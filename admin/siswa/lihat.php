<?php 
session_start();
if(empty($_SESSION['namasekolah']))
  {
    header('location: default.php?uri=modul/login/logindaftar');
  }
  else{
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
  // Priviledge menampilkan data
    if($_SESSION['level'] == 'admin')
    {      
      $nsekolah = '';
    }
    else
    {
      $nsekolah = $_SESSION['nis'];
      $nsekolah = " AND f.nis = '$nsekolah' ";
      $sqlsekolah1 = "SELECT * FROM fakta f
                      WHERE status != 'delete'
                      AND f.nis = '22222'
                      AND f.tanggal = (SELECT max(tanggal) FROM fakta f2 WHERE f.induk=f2.induk)";
    }      
?>

  <br>
  <br><br>
  <div class="container">
           <h2 class="text-center">TABEL SISWA<a href="default.php?uri=admin/siswa/input"><span class="glyphicon glyphicon-plus-sign text-danger"></span></a></h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
<tr>
<td>no</td>
<td>Nis</td>
<td>Nama Siswa</td>
<td>Jenis kelamin</td>
<td>Nem</td>
<td>Jurusan</td>
<td>status</td>
<td>actoin</td>
<td>actoin</td>
</tr>

                    </thead>
     <tbody>

 <?php
    // penomoran
      $no = 1;
      $query1=mysql_query("SELECT DISTINCT(induk) FROM siswa");      
      while($hasil1 = mysql_fetch_array($query1)) 
      {
        $query2 = mysql_query("SELECT * FROM siswa 
                                      WHERE induk = '$hasil1[induk]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM siswa WHERE induk='$hasil1[induk]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <tr>
                <td>$no</td>        
                <td>$hasil1[induk]</td> 
          ";
            // Nama Sekolah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM siswa 
                                          WHERE induk = '$hasil[induk]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM siswa WHERE induk='$hasil[induk]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilinduk = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilinduk[namasiswa].'</td>';
            } // close while hasilinduk   



            // Kategori Sekolah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM siswa 
                                          WHERE induk = '$hasil[induk]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM siswa WHERE induk='$hasil[induk]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilinduk = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilinduk[jeniskelamin].'</td>';
            } // close while hasilnis     


            // Jenis Sekolah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM siswa 
                                          WHERE induk = '$hasil[induk]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM siswa WHERE induk='$hasil[induk]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasiljs = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasiljs[nem].'</td>';
            } // close while hasilnis  


            // Akreditasi
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM jurusan
                                          WHERE kodej = '$hasil[kodej]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM jurusan WHERE kodej='$hasil[kodej]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilkodej = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilkodej[namajurusan].'</td>';
            } // close while hasilinduk   


           
            
            echo "
              <td>$hasil[status]</td>
              <td><a href='default.php?uri=admin/siswa/edit&idsiswa=$hasil[idsiswa]'>edit</a></td>
              <td><a href='default.php?uri=admin/siswa/hapus&idsiswa=$hasil[idsiswa]'>Hapus</a></td>
            ";
            echo "</tr>";        
            $no++;  // Tambah nomor
        } // close while $hasil
      } // Tutup while $hasil1
    ?>
   </tbody>
</table>
            </div>
            </div>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>

</div>



<br>
<div class="container">
<form action="default.php?uri=admin/siswa/lihat" method="post">
      <button type="submit" value="Register" name="daftar" >UPLOAD</button>
</form>
<?php
    if(isset($_POST['daftar'])){   
?>
<form action="default.php?uri=admin/siswa/lihat" method="post" >
<form method="post" enctype="multipart/form-data" action="default.php?uri=admin/siswa/laporan/proses">
<br>
Silakan Pilih File Excel: <input name="userfile" type="file">
<br>
<input name="upload" type="submit" value="Import">

</form>

<?php
}}
?>
</form>

