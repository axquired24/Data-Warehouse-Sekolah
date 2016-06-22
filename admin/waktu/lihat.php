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
           <h2 class="text-center">TABEL WAKTU <a href="default.php?uri=admin/waktu/input"><span class="glyphicon glyphicon-plus-sign text-danger"></span></a></h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr><td>no</td>
                        <td>kode</td>
                        <td> tahun</td>
                        <td>status</td>
                        <td>Aksi Edit</td>
                        <td>Aksi Hapus</td>
</tr>
                    </thead>
     <tbody>
   <?php
    // penomoran
    $no = 1;

    // select semua kodewa (CUMA yang berbeda)
    $kodewa  = mysql_query("SELECT DISTINCT(kodewa) FROM waktu");
    $arrkodewa = array();
    while ($vkodewa = mysql_fetch_array($kodewa))
    {
      array_push($arrkodewa, $vkodewa[kodewa]);
    } // tutup while vkodewa  

    foreach ($arrkodewa as $kodewakey => $kodewavalue) {
      // tampilkan hanya yang terbaru
      $qtampilterbaru = "SELECT * FROM waktu 
                                    WHERE kodewa = '$kodewavalue' 
                                    AND status != 'delete'
                                    AND tanggal = (SELECT max(tanggal) FROM waktu WHERE kodewa='$kodewavalue')
                                    ";
      $tampilterbaru  = mysql_query($qtampilterbaru);
      // keluarkan data
      while($hasil = mysql_fetch_array($tampilterbaru))
      {
        echo "
            <tr>
             <td >$no</td>
           <td >$hasil[kodewa]</td>
           <td >$hasil[tahun]</td>
           <td >$hasil[status]</td>
           <td ><a href='default.php?uri=admin/waktu/edit&idwaktu=$hasil[idwaktu]'>edit</a></td>           
           <td ><a href='default.php?uri=admin/waktu/hapus&idwaktu=$hasil[idwaktu]'>Hapus</a></td></tr>";
            $no++;
      } // tutup while
    } // tutup foreach $arrkodewa
      
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