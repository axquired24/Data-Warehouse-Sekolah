<h2 class="page-header text-center" style="margin-top:80px">Tabel Informasi</h2>
<div class="container">
<?php   
  /*
  @param $tabel   = table yang dicari | ex: wilayah
  @param $varget  = Kolom yang ingin diambil | ex: namawil
  @param $varcol  = Kolom acuan tabel datawarehouse | ex: kodewi
  @param $varval  = Value yang akan dipilih | ex: kategori (Cukup ketik kategori tanpa '$')
  */
  function AmbilValueDB($table, $varcol, $varval, $varget)
  {
    $squ = "SELECT * FROM $table a
                      WHERE status != 'delete'
                      AND $varcol = '".$varval."'
                      AND tanggal = (SELECT max(tanggal) FROM $table a2 WHERE a2.".$varcol."=a.".$varcol.")
                      ";
    $qu = mysql_query($squ);
    while($fe = mysql_fetch_array($qu))
    {
      $echohasil = $fe[$varget];
    }
    return $echohasil;
  }

  // Variabel POST filter
  $tampil     = $_POST['tampil'];
  $dari       = $_POST['dari'];
  $sampai     = $_POST['sampai'];
  $kategori   = $_POST['kategori'];
  $jenis      = $_POST['jenis'];
  $akreditasi = $_POST['akreditasi'];
  $wilayah    = $_POST['wilayah'];  

  $ditampilin   = array("dari","sampai","kategori","jenis","akreditasi","wilayah");
  $pakefunction = array("kategori","jenis", "akreditasi", "wilayah");
  // Function Parameter Build
  $fp           = array("kategori"     => array("table"=>"kategori_sekolah", "varcol"=>"kodeks", "varval"=>$kategori, "varget"=>"namakategori")
                          ,"jenis"      => array("table"=>"jenis_sekolah", "varcol"=>"kodejs", "varval"=>$jenis, "varget"=>"namajenis")
                          ,"akreditasi" => array("table"=>"akreditasi", "varcol"=>"kodea", "varval"=>$akreditasi, "varget"=>"namaakreditasi")
                          ,"wilayah"    => array("table"=>"wilayah", "varcol"=>"kodewi", "varval"=>$wilayah, "varget"=>"namawil")
                        );
  // print_r($functionparam);
  foreach ($ditampilin as $takey => $tavalue) {
    // $tb_use = ${tb.$jml_pool_ini};
    //${$tavalue}; Menghasilkan $dari, $sampai, pokoknya '$' + 'array value'    
    if(isset(${$tavalue}) AND ${$tavalue} != 'semua')
    {
      // Kecuali "dari" dan "sampai" variabel lain hanya mengeluarkan key/kodenya,
      // membutuhkan function untuk memanggil valuenya
      if(in_array($tavalue, $pakefunction))
      {
        ${$tavalue."tampil"}       = AmbilValueDB($fp[$tavalue][table], $fp[$tavalue][varcol], $fp[$tavalue][varval], $fp[$tavalue][varget]);        
      }
      else
      {
        ${$tavalue."tampil"}       = ${$tavalue};
      }
      ${ditampil.$tavalue} = '<option value="'.${$tavalue}.'">'.${$tavalue."tampil"}.'</option>';
      ${ditampil.$tavalue} .= '<option value="semua">semua</option>';
      // echo ${ditampil.$tavalue};
    }
    else
    {
      ${ditampil.$tavalue}   = '<option value="semua">semua</option>';
    }
    // echo "Tampilan ini $tavalue: ".${ditampil.$tavalue}."<br>";
  } // Close foreach ($ditampilin as $takey => $tavalue)

?>
<form action="default.php?uri=modul/diagram/tabel&uk=<?php echo $unik; ?>" method="post"> 
<div class="box-body table-responsive">
<table  class="table table-bordered table-striped">
<tr>
    <td><font color="black">Tahun: </font></td>
    <td style="text-align:center;">
        <select name="dari" class="input-sm form-control">
        <?php 
         echo $ditampildari;       
          $query2 = mysql_query("SELECT * FROM waktu wa
                                  WHERE status != 'delete'
                                  AND tahun != '$dari'
                                  AND tanggal = (SELECT max(tanggal) FROM waktu wa2 WHERE wa2.kodewa=wa.kodewa)
                                  ORDER BY tahun ASC
                                        ");
          while($hasil = mysql_fetch_array($query2))
          {
            echo "  
               <option value='$hasil[tahun]'>$hasil[tahun]</option>
            ";
          } // while($hasil
          ?>
        </select>
    </td>
    <td  style="text-align:center"><font color="black">s/d</font></td>
       <td style="text-align:center;">
        <select name="sampai" class="input-sm form-control">
        <?php 
         echo $ditampilsampai;
          $query2 = mysql_query("SELECT * FROM waktu wa
                                  WHERE status != 'delete'
                                  AND tahun != '$sampai'
                                  AND tanggal = (SELECT max(tanggal) FROM waktu wa2 WHERE wa2.kodewa=wa.kodewa)
                                  ORDER BY tahun ASC
                                        ");
          while($hasil = mysql_fetch_array($query2))
          {
            echo "  
               <option value='$hasil[tahun]'>$hasil[tahun]</option>
            ";
          } // while($hasil
          ?>
        </select>
    </td>
    <tr>
    <td style="text-align:left;"><font color="black">Kategori: </font></td>
    <td style="text-align:center;">
        <select name="kategori" class="input-sm form-control">
            <?php 
            echo $ditampilkategori;
           $query1=mysql_query("SELECT DISTINCT(kodeks) FROM kategori_sekolah WHERE kodeks != '$kategori'");      
                while($hasil1 = mysql_fetch_array($query1)) 
                {
            $query2 = mysql_query("SELECT * FROM kategori_sekolah
                                      WHERE kodeks = '$hasil1[kodeks]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM kategori_sekolah WHERE kodeks='$hasil1[kodeks]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <option value='$hasil[kodeks]'>$hasil[namakategori]</option>
          ";
          } // while($hasil
        } //while($hasil1
?>
        </select>
    </td>
  
    <td style="text-align:left;"><font color="black">Jenis Sekolah: </font></td>
    <td style="text-align:center;">
        <select name="jenis" class="input-sm form-control">
          <?php 
            echo $ditampiljenis;
           $query1=mysql_query("SELECT DISTINCT(kodejs) FROM jenis_sekolah WHERE kodejs != '$jenis'");      
                while($hasil1 = mysql_fetch_array($query1)) 
                {
            $query2 = mysql_query("SELECT * FROM jenis_sekolah
                                      WHERE kodejs = '$hasil1[kodejs]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM jenis_sekolah WHERE kodejs='$hasil1[kodejs]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <option value='$hasil[kodejs]'>$hasil[namajenis]</option>
          ";
          } // while($hasil
        } //while($hasil1
?>

        </select>
    </td>
  </tr>
    <td style="text-align:left;"><font color="black">Akreditasi : </font></td>
    <td style="text-align:center;">
        <select name="akreditasi" class="input-sm form-control">
            <?php 
            echo $ditampilakreditasi;
           $query1=mysql_query("SELECT DISTINCT(kodea) FROM akreditasi WHERE kodea != '$akreditasi'");      
                while($hasil1 = mysql_fetch_array($query1)) 
                {
            $query2 = mysql_query("SELECT * FROM akreditasi
                                      WHERE kodea = '$hasil1[kodea]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM akreditasi WHERE kodea='$hasil1[kodea]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <option value='$hasil[kodea]'>$hasil[namaakreditasi]</option>
          ";
          } // while($hasil
        } //while($hasil1
?>
            
        </select>
    </td>
     <td style="text-align:left;"><font color="black">Wilayah : </font></td>
    <td style="text-align:center;">
        <select name="wilayah" class="input-sm form-control">
            <?php 
            echo $ditampilwilayah;
           $query1=mysql_query("SELECT DISTINCT(kodewi) FROM wilayah WHERE kodewi != '$wilayah'");      
                while($hasil1 = mysql_fetch_array($query1)) 
                {
            $query2 = mysql_query("SELECT * FROM wilayah
                                      WHERE kodewi = '$hasil1[kodewi]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM wilayah WHERE kodewi='$hasil1[kodewi]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <option value='$hasil[kodewi]'>$hasil[namawil]</option>
          ";
          } // while($hasil
        } //while($hasil1
?>
        </select>
    </td>
    <tr>
    <td style="padding-left:2%">
        <button type="submit" name="tampil" value="Tampil">Tampil</button>
    </td>
    </tr>
</tr>

</table>
</div>
</div>
</form>
    <div style="margin-top:50px;padding-left:10%;padding-right:10%" align="center">    

<!-- ---------------------------------------------------- TABEL BAWAH  ---------------------------------------------------- -->

<?php
$sqldasar= "  
SELECT f.*, s.*, si.*, a.*, js.*, ks.*, w.*, wa.*
    FROM fakta f    
    

    INNER JOIN sekolah s ON f.nis = s.nis 
    INNER JOIN siswa si ON f.induk = si.induk
    INNER JOIN akreditasi a ON s.kodea = a.kodea
    INNER JOIN jenis_sekolah js ON s.kodejs = js.kodejs
    INNER JOIN kategori_sekolah ks ON s.kodeks = ks.kodeks
    INNER JOIN wilayah w ON s.kodewi = w.kodewi
    INNER JOIN waktu wa ON f.kodewa = wa.kodewa
    
    WHERE f.status != 'delete'    
    AND f.tanggal IN (SELECT MAX(tanggal) FROM fakta f2 WHERE f.induk = f2.induk)
    
    AND s.status != 'delete' 
    AND s.tanggal IN (SELECT MAX(tanggal) FROM sekolah s2 WHERE s2.nis = s.nis)
    
    AND si.status != 'delete'
    AND si.tanggal IN (SELECT MAX(tanggal) FROM siswa si2 WHERE si.induk = si2.induk)
    
    AND a.status != ' delete'
    AND a.tanggal IN (SELECT MAX(tanggal) FROM akreditasi a2 WHERE a.kodea = a2.kodea)
    
    AND js.status != ' delete'
    AND js.tanggal IN (SELECT MAX(tanggal) FROM jenis_sekolah js2 WHERE js2.kodejs = js.kodejs)
    
    AND ks.status != ' delete'
    AND ks.tanggal IN (SELECT MAX(tanggal) FROM kategori_sekolah ks2 WHERE ks2.kodeks = ks.kodeks)
    
    AND w.status != ' delete'
    AND w.tanggal IN (SELECT MAX(tanggal) FROM wilayah w2 WHERE w2.kodewi = w.kodewi)
    
    AND wa.status !='delete'
    AND wa.tanggal IN (SELECT MAX(tanggal) FROM waktu wa2 WHERE wa2.kodewa =wa.kodewa)
";

// if wilayah terisi
if(isset($wilayah) && ($wilayah != 'semua'))
{
  $sqldasar .= " AND s.kodewi = '".$wilayah."'";
}

// if akreditasi terisi
if(isset($akreditasi) && ($akreditasi != 'semua'))
{
  $sqldasar .=" AND s.kodea = '".$akreditasi."'";
}

// if jenis sekolah terisi
if (isset($jenis) && ($jenis != 'semua'))
{
  $sqldasar .=" AND s.kodejs = '".$jenis."'";  
}

// if kategori sekolah terisi
if (isset($kategori) && ($kategori != 'semua'))
{
  $sqldasar .=" AND s.kodeks = '".$kategori."'";  
}

// if waktu terisi
if ( (isset($dari) && ($dari != 'semua')) && (isset($sampai) && ($sampai != 'semua')) )
{
  $sqldasar .=" AND wa.tahun BETWEEN '".$dari."' AND '".$sampai."'";   
}
else if (isset($dari) && ($dari != 'semua'))
{
  $sqldasar .=" AND wa.tahun = '".$dari."'";   
}


?>

   <table id="example1" class="table table-bordered table-striped">
           <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>No Induk Siswa</th>
                    <th>Nama Sekolah</th>
                    <th>Ketegori Sekolah</th>
                    <th>Jenis Sekolah</th>
                    <th>Akreditasi</th>
                    <th>Nama Wilayah</th>
                    <th> Waktu</th>
                 </tr>
            </thead>
<?php 
  $no=1;
  // Kode unik pemanggilan
  $unikey     = rand(1111111,9999999);
  $unik       = $unikey;  
  $jalankan=mysql_query($sqldasar);
  while($hasil=mysql_fetch_array($jalankan))
  {          

    // Insert Untuk tampilan diagaram
    $ins_diagram = "INSERT INTO isitabel VALUES (
                      NULL,
                      '$unik',
                      '$hasil[namasiswa]',
                      '$hasil[induk]',
                      '$hasil[namasekolah]',
                      '$hasil[namakategori]',
                      '$hasil[namajenis]',
                      '$hasil[namaakreditasi]',
                      '$hasil[namawil]',
                      '$hasil[tahun]'                      
                  )                    
                  ";

    $ex_diagaram  = mysql_query($ins_diagram) OR DIE(mysql_error());
    $lastid       = mysql_fetch_array(mysql_query("SELECT LAST_INSERT_ID() AS lastid"));
    $lastid       = $lastid[lastid];

    $lastuniq     = "SELECT unixkey FROM isitabel WHERE idisitabel='$lastid'";
    $lastuniq     = mysql_query($lastuniq);
    $lastuniq     = mysql_fetch_array($lastuniq);
    $lastuniq     = $lastuniq[unixkey];    
?>            
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $hasil[namasiswa]; ?></td>
            <td><?php echo $hasil[induk]; ?></td>
            <td><?php echo $hasil[namasekolah]; ?></td>
            <td><?php echo $hasil[namakategori]; ?></td>
            <td><?php echo $hasil[namajenis]; ?></td>
            <td><?php echo $hasil[namaakreditasi]; ?></td>
            <td><?php echo $hasil[namawil]; ?></td>
            <td><?php echo $hasil[tahun]; ?></td>
        </tr>
<?php
  $no++;
  } // while($hasil=mysql_fetch_array($jalankan))
?>        
</tbody></table> 
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable();
    });
</script>
      

<p align="left"> <a class="btn btn-lg btn-danger" href="default.php?uri=modul/diagram/diagram&uk=<?php echo $lastuniq; ?>" target="blank"> Diagram </a></p>
</div> <!-- Container -->
</body>
</html>