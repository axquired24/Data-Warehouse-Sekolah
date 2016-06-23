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
      $nsekolah = $_SESSION['nis'];
      $nsekolah = " AND f.nis = '$nsekolah' ";
    }       
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
  // Cari id sekolah

?>

  <br>
  <br><br>
  <div class="container">
           <h2 class="text-center">TABEL FAKTA<a href="default.php?uri=admin/fakta/input"><span class="glyphicon glyphicon-plus-sign text-danger"></span></a></h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                  <td >No</td>
                  <td class="head-data">ID Siswa</td>
                  
                  <td class="head-data">ID Sekolah</td>
                
                  <td class="head-data">ID waktu</td>  
                  <td>status</td>              
                  <td>Aksi Edit</td>
                  <td>Aksi Hapus</td>
                         </tr>
                        
                    </thead>
     <tbody>
    <?php
     
 $no = 1;
 $sqle = "SELECT * FROM fakta f
                      WHERE status != 'delete'
                      ".$nsekolah." AND f.tanggal = (SELECT max(tanggal) FROM fakta f2 WHERE f.induk=f2.induk)";
 $query=mysql_query($sqle);
      while($hasil = mysql_fetch_array($query)) {

      echo "  
          <tr>
            <td>$no</td>        
      ";
        // Siswa
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



        // Sekolah
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
        } // close while hasilnis     


        // waktu
        // tampilkan hanya yang terbaru   
        $qtampilterbaru = "SELECT * FROM waktu
                                      WHERE kodewa = '$hasil[kodewa]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM waktu WHERE kodewa='$hasil[kodewa]')
                                      ";
        $tampilterbaru  = mysql_query($qtampilterbaru);  
        // keluarkan data induk siswa
        while($hasilkodewa = mysql_fetch_array($tampilterbaru))
        {
          echo '<td>'.$hasilkodewa[tahun].'</td>';
        } // close while hasilinduk   

        
        echo "
        <td>$hasil[status]</td>
          <td><a href='default.php?uri=admin/fakta/edit&idfakta=$hasil[idfakta]'>edit</a></td>
          <td><a href='default.php?uri=admin/fakta/hapus&idfakta=$hasil[idfakta]'>Hapus</a></td>
        ";
        echo "</tr>";        
        $no++;  // Tambah nomor
    }
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