<?php 
session_start();
if(empty($_SESSION['namasekolah']))
  {
    header('location: default.php?uri=modul/login/logindaftar ');
  }
  else{
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
?>

  <br>
  <br><br>
  <div class="container">
           <h2 class="text-center">TABEL AKREDITASI <a href="default.php?uri=admin/akreditasi/input"><span class="glyphicon glyphicon-plus-sign text-danger"></span></a></h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
<tr>
<td>No</td>
<td>Kode AKreditasi</td>
<td>Nama Akreditasi</td>
<td>Status</td>
<td>Aksi</td>
<td>Aksi</td>
</tr>
                    </thead>
     <tbody>
    <?php
    // penomoran
    $no = 1;
    // tampilkan hanya yang terbaru
    $qtampilterbaru = "SELECT * FROM akreditasi a 
                                  WHERE status != 'delete'
                                  AND tanggal = (SELECT max(tanggal) FROM akreditasi a2 WHERE a2.kodea=a.kodea)
                                  ";
    $tampilterbaru  = mysql_query($qtampilterbaru);
    // keluarkan data
    while($hasil = mysql_fetch_array($tampilterbaru))
    {
      echo "
          <tr>
          <td>$no</td>
          <td>$hasil[kodea]</td>
          <td>$hasil[namaakreditasi]</td>
          <td>$hasil[status]</td>
          <td><a href='default.php?uri=admin/akreditasi/edit&idakreditasi=$hasil[idakreditasi]'>edit</a></td>
          <td><a href='default.php?uri=admin/akreditasi/hapus&idakreditasi=$hasil[idakreditasi]'>Hapus</a></td></tr>
          ";
          $no++;
    } // tutup while
    
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
<?php 
  } // Tutup Else session
?>
  </body>

</html>