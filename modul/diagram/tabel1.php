<div>
    <?php
         if(isset($_POST['tampil']))
      {
          $dari = $_POST['dari'];
          $sampai = $_POST['sampai'];
          $kategori = $_POST['kategori'];
          $jenis = $_POST['jenis'];
          $akreditasi = $_POST['akreditasi'];
          $wilayah = $_POST['wilayah'];

          if($dari != "semua")
          {
            $semua_dari    = "<option value='semua'>Semua</option>";
          }
          else
          {
           $semua_dari    = ""; 
          }

          if($sampai != "semua")
          {
            $semua_sampai    = "<option value='semua'>Semua</option>";
          }
          else
          {
           $semua_sampai    = ""; 
          }

          if($kategori != "semua")
          {
            $semua_kategori    = "<option value='semua'>Semua</option>";
          }
          else
          {
           $semua_kategori    = ""; 
          }

          if($jenis != "semua")
          {
            $semua_jenis    = "<option value='semua'>Semua</option>";
          }
          else
          {
           $semua_jenis    = ""; 
          }

           if($akreditasi != "semua")
          {
            $semua_akreditasi    = "<option value='semua'>Semua</option>";
          }
          else
          {
           $semua_akreditasi    = ""; 
          }

          if($wilayah != "semua")
          {
            $semua_wilayah    = "<option value='semua'>Semua</option>";
          }
          else
          {
           $semua_wwilayah    = ""; 
          }

        } 
        else
        {
          $dari = "semua";
          $sampai = "semua";
          $kategori = "semua";
          $jenis = "semua";
          $akreditasi = "semua";
          $wilayah = "semua";

          $semua_dari    = "";
          $semua_sampai    = "";
          $semua_kategori    = "";
          $semua_jenis    = "";
          $semua_akreditasi    = "";
          $semua_wilayah    = "";
        }
        $unikey     = rand(1111111,9999999);
        $unik       = $unikey;
    ?>
    <br><br><br><br>
</div>
<form action="default.php?uri=modul/diagram/tabel&uk=<?php echo $unik; ?>" method="post">
 <h2 style="color:black" align="center">TABEL SELECTION</h2>
 <div class="container">
<div class="box-body table-responsive">
<table  class="table table-bordered table-striped">
<tr>
    <td><font color="black">Tahun: </font></td>
    <td style="text-align:center;">
        <select name="dari" class="input-sm">
<?php 
 $query1=mysql_query("SELECT DISTINCT(kodewa) FROM waktu");      
      while($hasil1 = mysql_fetch_array($query1)) 
      {
        $query2 = mysql_query("SELECT * FROM waktu
                                      WHERE kodewa = '$hasil1[kodewa]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM waktu WHERE kodewa='$hasil1[kodewa]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
             <option value='$hasil[kodewa]'>$hasil[tahun]</option>
          ";
          } // while($hasil
        } //while($hasil1
?>
        </select>
    </td>
    <td  style="text-align:center"><font color="black">s/d</font></td>
       <td style="text-align:center;">
        <select name="sampai" class="input-sm">
            <!-- <option value="<?php echo $sampai; ?>"><?php echo ucwords($sampai); ?></option> -->
            <?php // echo $semua_sampai; ?>
            <?php 
           $query1=mysql_query("SELECT DISTINCT(kodewa) FROM waktu");      
                while($hasil1 = mysql_fetch_array($query1)) 
                {
            $query2 = mysql_query("SELECT * FROM waktu
                                      WHERE kodewa = '$hasil1[kodewa]' 
                                      AND status != 'delete'
                                      AND tanggal = (SELECT max(tanggal) FROM waktu WHERE kodewa='$hasil1[kodewa]')");
        while($hasil = mysql_fetch_array($query2))
        {
          echo "  
              <option value='$hasil[kodewa]'>$hasil[tahun]</option>
          ";
          } // while($hasil
        } //while($hasil1
?>
        </select>
    </td>
    <tr>
    <td style="text-align:left;"><font color="black">Kategori: </font></td>
    <td style="text-align:center;">
        <select name="kategori" class="input-sm">
            <!-- <option value="<?php echo $kategori; ?>"><?php echo ucwords($kategori); ?></option>
            <?php echo $semua_kategori; ?> -->
                     <?php // echo $semua_sampai; ?>
            <?php 
           $query1=mysql_query("SELECT DISTINCT(kodeks) FROM kategori_sekolah");      
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
        <select name="jenis" class="input-sm">
            <!-- <option value="<?php echo $jenis; ?>"><?php echo ucwords($jenis); ?></option>
            <?php echo $semua_jenis; ?> -->
                      <?php // echo $semua_sampai; ?>
          <?php 
           $query1=mysql_query("SELECT DISTINCT(kodejs) FROM jenis_sekolah");      
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
        <select name="akreditasi" class="input-sm">
            <!-- <option value="<?php echo $akreditasi; ?>"><?php echo ucwords($akreditasi); ?></option>
            <?php echo $semua_akreditasi; ?> -->
                      <?php // echo $semua_sampai; ?>
            <?php 
           $query1=mysql_query("SELECT DISTINCT(kodea) FROM akreditasi");      
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
        <select name="wilayah" class="input-sm">
           <!--  <option value="<?php echo $wilayah; ?>"><?php echo ucwords($wilayah); ?></option>
            <?php echo $semua_wilayah; ?> -->
                     <?php // echo $semua_sampai; ?>
            <?php 
           $query1=mysql_query("SELECT DISTINCT(kodewi) FROM wilayah");      
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
  if(isset($_POST['tampil'])){
      $dari = $_POST['dari'];
      $sampai = $_POST['sampai'];
      $kategori = $_POST['kategori'];
      $jenis = $_POST['jenis'];
      $akreditasi = $_POST['akreditasi'];
      $wilayah = $_POST['wilayah'];

      $query = "";
      $exe = "";
      $no = 0;

        // SELECT s.namasekolah, s.nis, ks.namakategori, js.namajenis, a.namaakreditasi, wil.namawil, s.jarak, w.tahun
        // FROM fakta f
        // INNER JOIN sekolah s ON f.idsekolahFK=s.idsekolah 
        // INNER JOIN akreditasi a ON s.idakreditasiFK=a.idakreditasi
        // INNER JOIN wilayah wil ON s.idwilayahFK=wil.idwilayah
        // INNER JOIN jenis_sekolah js ON s.idjenissekolahFK=js.idjenissekolah
        // INNER JOIN waktu w ON f.idwaktuFK=w.idwaktu
        // INNER JOIN kategorisekolah ks ON s.idkategorisekolahFK=ks.idkategorisekolah  
        // WHERE ks.namakategori='negeri' AND js.namajenis= 'sma' AND a.namaakreditasi='a' AND tahun BETWEEN '2010' AND '2015' ORDER BY w.tahun;
      

      // tanpa tanggal
    if($kategori == 'semua' && $jenis == 'semua' && $akreditasi == 'semua' && $wilayah == 'semua' && $dari == 'semua' && $sampai == 'semua'){        
          $query = "SELECT DISTINCT s.namasekolah, s.nis, ks.namakategori, js.namajenis, a.namaakreditasi, wil.namawil,sis.namasiswa, sis.induk, w.tahun
                    FROM fakta f
                    INNER JOIN sekolah s ON f.idsekolahFK=s.nis 
                    INNER JOIN akreditasi a ON s.idakreditasiFK=a.idakreditasi
                    INNER JOIN wilayah wil ON s.idwilayahFK=wil.idwilayah
                    INNER JOIN jenis_sekolah js ON s.idjenissekolahFK=js.idjenissekolah
                    INNER JOIN waktu w ON f.idwaktuFK=w.idwaktu
                     INNER JOIN siswa sis On f.idsiswaFK=sis.induk
                    INNER JOIN kategori_sekolah ks ON s.idkategorisekolahFK=ks.idkategorisekolah AND sis.induk NOT IN (SELECT idsiswaFK FROM fakta WHERE status='delete') AND sis.status = 'update' AND sis.induk NOT IN (SELECT induk FROM siswa WHERE status='delete') AND sis.tanggal IN (SELECT MAX(tanggal) FROM siswa GROUP BY induk) GROUP BY sis.induk";
          // echo $query;
          // $query = addslashes($query);
          $exe = mysql_query($query) OR DIE(mysql_error());;
      } // Close > if == == == 

      else
      {
        $query = "SELECT DISTINCT s.namasekolah, s.nis, ks.namakategori, js.namajenis, a.namaakreditasi, wil.namawil,sis.namasiswa,sis.induk, w.tahun
                    FROM fakta f
                    INNER JOIN sekolah s ON f.idsekolahFK=s.nis 
                    INNER JOIN akreditasi a ON s.idakreditasiFK=a.idakreditasi
                    INNER JOIN wilayah wil ON s.idwilayahFK=wil.idwilayah
                    INNER JOIN jenis_sekolah js ON s.idjenissekolahFK=js.idjenissekolah
                    INNER JOIN waktu w ON f.idwaktuFK=w.idwaktu
                    INNER JOIN siswa sis On f.idsiswaFK=sis.induk
                    INNER JOIN kategori_sekolah ks ON s.idkategorisekolahFK=ks.idkategorisekolah WHERE sis.induk NOT IN (SELECT idsiswaFK FROM fakta WHERE status='delete') AND sis.status = 'update' AND sis.induk NOT IN (SELECT induk FROM siswa WHERE status='delete') AND sis.tanggal IN (SELECT MAX(tanggal) FROM siswa GROUP BY induk) AND";
        if($jenis != 'semua')
        {
          $query .= " js.namajenis = '$jenis' AND";
        }
        if($kategori != 'semua')
        {
          $query .= " ks.namakategori = '$kategori' AND";
        }        
        if($akreditasi != 'semua')
        {
          $query .= " a.namaakreditasi = '$akreditasi' AND";
        }
        if($wilayah != 'semua')
        {
          $query .= " wil.namawil = '$wilayah' AND";
        }
         if($dari != 'semua' && $sampai == 'semua')
        {
          $query .= " w.tahun = '$dari' AND";
        }
        if( ($dari != 'semua') && ($sampai != 'semua') )
        {
          $query .= " w.tahun BETWEEN '$dari' AND '$sampai'";
        }

        if(substr($query, -3) == 'AND')
        {
          $query = substr($query, 0, -3);
        }
        else if( substr($query, -5) == 'WHERE')
        {
          $query = substr($query, 0, -5);
        }
        // $query = addslashes($query);
        $query;
        $exe = mysql_query($query) OR DIE(mysql_error());
      } // close else > if == == == 
// pindahan taruh sini nanti
      ?>
     
      <tbody>
        <?php
      while($hasil=mysql_fetch_array($exe)){
          $no++;          
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
                        )";
          $lastid       = mysql_query("SELECT LAST_INSERT_ID() AS lastid");

          $ex_diagaram  = mysql_query($ins_diagram) OR DIE(mysql_error());
          $lastid       = mysql_fetch_array($lastid);
          $lastid       = $lastid[lastid];

          $lastuniq     = "SELECT unixkey FROM isitabel WHERE idisitabel='$lastid'";
          $lastuniq     = mysql_query($lastuniq);
          $lastuniq     = mysql_fetch_array($lastuniq);
          $lastuniq     = $lastuniq[unixkey];

          ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $hasil[namasekolah]; ?></td>
            <td><?php echo $hasil[nis]; ?></td>
            <td><?php echo $hasil[namakategori]; ?></td>
            <td><?php echo $hasil[namajenis]; ?></td>
            <td><?php echo $hasil[namaakreditasi]; ?></td>
            <td><?php echo $hasil[namawil]; ?></td>
            <td><?php echo $hasil[namasiswa]; ?></td>
            <td><?php echo $hasil[tahun]; ?></td>
        </tr>
        <?php
      }
  } // Close if submit
?>  
</tbody></table> 
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable();
    });
</script>
      

<p align="left"> <a class="btn btn-lg btn-danger" href="default.php?uri=modul/diagram/diagram&uk=<?php echo $lastuniq; ?>" target="blank">Diagram </p></a>
</div>
</body>
</html>