<?php 
session_start();
 if(empty($_SESSION['namasekolah']))
  {
    header('location: default.php?uri=modul/login/logindaftar ');
  }  
  else{

    // Priviledge menampilkan data
    if($_SESSION['level'] == 'admin')
    {      
      $nsekolah = '';
    }
    else
    {
      $nsekolah = $_SESSION['namasekolah'];
      $nsekolah = " WHERE namasekolah = '$nsekolah' ";
    }    
  error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
  // Cari id sekolah
?>

  <br>
  <br><br>
  <div class="container">
           <h2 class="text-center">TABEL SEKOLAH<a href="default.php?uri=admin/sekolah/input"><span class="glyphicon glyphicon-plus-sign text-danger"></span></a></h2>
           <h3><?php echo $_SESSION['namasekolah']; ?></h3>        
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                  <td>No</td>
                  <td>NISN</td>
                  <td>Namasekolah</td>
                  <td>kategori</td>
                  <td>jenis</td>
                  <td>Akreditasi</td>
                  <td>wilayah</td>
                  <td>status</td>
                  <td>AKSI</td>
                  <td>AKSI</td>
                         </tr>
                        
                    </thead>
     <tbody>
  <?php
    // penomoran
      $no = 1;
      $sql1  = "SELECT DISTINCT(nis) FROM sekolah ".$nsekolah;
      $query1=mysql_query($sql1);      
      while($hasil1 = mysql_fetch_array($query1)) 
      {
        $query2 = mysql_query("SELECT * FROM sekolah 
                                      WHERE nis = '$hasil1[nis]' 
                                      AND status != 'delete'                                      
                                      AND tanggal = (SELECT max(tanggal) FROM sekolah WHERE nis='$hasil1[nis]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <tr>
                <td>$no</td>        
                <td>$hasil1[nis]</td> 
          ";
            // Nama Sekolah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM sekolah 
                                          WHERE nis = '$hasil[nis]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM sekolah WHERE nis='$hasil[nis]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilnis = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilnis[namasekolah].'</td>';
            } // close while hasilinduk   



            // Kategori Sekolah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM kategori_sekolah 
                                          WHERE kodeks = '$hasil[kodeks]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM kategori_sekolah WHERE kodeks='$hasil[kodeks]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilks = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilks[namakategori].'</td>';
            } // close while hasilnis     


            // Jenis Sekolah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM jenis_sekolah 
                                          WHERE kodejs = '$hasil[kodejs]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM jenis_sekolah WHERE kodejs='$hasil[kodejs]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasiljs = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasiljs[namajenis].'</td>';
            } // close while hasilnis  


            // Akreditasi
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM akreditasi
                                          WHERE kodea = '$hasil[kodea]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM akreditasi WHERE kodea='$hasil[kodea]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilkodea = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilkodea[namaakreditasi].'</td>';
            } // close while hasilinduk   


            // Wilayah
            // tampilkan hanya yang terbaru   
            $qtampilterbaru = "SELECT * FROM wilayah
                                          WHERE kodewi = '$hasil[kodewi]' 
                                          AND status != 'delete'
                                          AND tanggal = (SELECT max(tanggal) FROM wilayah WHERE kodewi='$hasil[kodewi]')
                                          ";
            $tampilterbaru  = mysql_query($qtampilterbaru);  
            // keluarkan data induk siswa
            while($hasilkodewi = mysql_fetch_array($tampilterbaru))
            {
              echo '<td>'.$hasilkodewi[namawil].'</td>';
            } // close while hasilinduk  
            
            echo "
              <td>$hasil[status]</td>
              <td><a href='default.php?uri=admin/sekolah/edit&idsekolah=$hasil[idsekolah]'>edit</a></td>
              <td><a href='default.php?uri=admin/sekolah/hapus&idsekolah=$hasil[idsekolah]'>Hapus</a></td>
            ";
            echo "</tr>";        
            $no++;  // Tambah nomor
        } // close while $hasil
      } // Tutup while $hasil1
    ?>
    </tbody>
</table>
            </div>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>

</div>
<?php 
  } // Tutup Else session
?>
  </body>

</html>