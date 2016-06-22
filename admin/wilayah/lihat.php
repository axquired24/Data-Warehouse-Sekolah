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
           <h2 class="text-center">TABEL WILAYAH</h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td >No</td>
                            <td>kode</td>
                            <td>Namawilayah</td>
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

    // select semua kodewi (CUMA yang berbeda)
    $kodewi  = mysql_query("SELECT DISTINCT(kodewi) FROM wilayah");
    $arrkodewi = array();
    while ($vkodewi = mysql_fetch_array($kodewi))
    {
      array_push($arrkodewi, $vkodewi[kodewi]);
    } // tutup while vkodewi  

    foreach ($arrkodewi as $kodewikey => $kodewivalue) {
      // tampilkan hanya yang terbaru
      $qtampilterbaru = "SELECT * FROM wilayah 
                                    WHERE kodewi = '$kodewivalue' 
                                    AND status != 'delete'
                                    AND tanggal = (SELECT max(tanggal) FROM wilayah WHERE kodewi='$kodewivalue')
                                    ";
      $tampilterbaru  = mysql_query($qtampilterbaru);
      // keluarkan data
      while($hasil = mysql_fetch_array($tampilterbaru))
      {
        echo "
            <tr>
           <td >$no</td>
          <td >$hasil[kodewi]</td>
          <td >$hasil[namawil]</td>
          <td >$hasil[status]</td>
          <td ><a href='default.php?uri=admin/wilayah/edit&idwilayah=$hasil[idwilayah]'>edit</a></td>
          <td ><a href='default.php?uri=admin/wilayah/input'>input</a></td>
          <td ><a href='default.php?uri=admin/wilayah/hapus&idwilayah=$hasil[idwilayah]'>Hapus</a></td> </tr>";
            $no++;
      } // tutup while
    } // tutup foreach $arrkodewi
      
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