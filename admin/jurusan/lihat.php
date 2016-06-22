<?php 
session_start();
if(empty($_SESSION['namasekolah']))
  {
    header('location: default.php?uri=modul/login/logindaftar ');
  }
  else{
?>

  <br>
  <br><br>
  <div class="container">
           <h2 class="text-center">TABEL JURUSAN <a href="default.php?uri=admin/jurusan/input"><span class="glyphicon glyphicon-plus-sign text-danger"></span></a></h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <tr>
                        <td >No</td>
                        <td>kode</td>
                        <td >Nama Jurusan</td>
                        <td>status</td>
                        <td>Aksi</td>
                        <td>Aksi</td>
                        <td>Aksi</td>
                        </tr>

                        
                    </thead>
     <tbody>
         <?php
    // penomoran
    $no = 1;

    // select semua kodej (CUMA yang berbeda)
    $kodej  = mysql_query("SELECT DISTINCT(kodej) FROM jurusan");
    $arrkodej = array();
    while ($vkodej = mysql_fetch_array($kodej))
    {
      array_push($arrkodej, $vkodej[kodej]);
    } // tutup while vkodej  

    foreach ($arrkodej as $kodejkey => $kodejvalue) {
      // tampilkan hanya yang terbaru
      $qtampilterbaru = "SELECT * FROM jurusan 
                                    WHERE kodej = '$kodejvalue' 
                                    AND status != 'delete'
                                    AND tanggal = (SELECT max(tanggal) FROM jurusan WHERE kodej='$kodejvalue')
                                    ";
      $tampilterbaru  = mysql_query($qtampilterbaru);
      // keluarkan data
      while($hasil = mysql_fetch_array($tampilterbaru))
      {
        echo "
            <tr>
            <td >$no</td> 
            <td >$hasil[kodej]</td>     
            <td >$hasil[namajurusan]</td>
            <td >$hasil[status]</td>
            <td ><a href='default.php?uri=admin/jurusan/edit&idjurusan=$hasil[idjurusan]'>edit</a></td>
            <td ><a href='default.php?uri=admin/jurusan/input'>Input</a></td>
            <td ><a href='default.php?uri=admin/jurusan/hapus&idjurusan=$hasil[idjurusan]'>hapus</a></td> </tr>";
            $no++;
      } // tutup while
    } // tutup foreach $arrkodej
      
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