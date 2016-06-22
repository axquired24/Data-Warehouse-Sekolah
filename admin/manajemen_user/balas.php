    <?php
    if(isset($_GET['idlogin'])){
        $id = $_GET['idlogin'];
        $query = "SELECT * FROM loginsekolah WHERE idlogin='$id'";
        $exe = mysql_query($query, $koneksidb) or die ("Query salah!".mysql_error());
        $hasil = mysql_fetch_array($exe);
    ?>
    <br><br><br><br>
<table style="padding:20px; margin-left:50px;background-color:#f5f5f5; border-radius:10px;">
    <tr>
        <td>
         <h4 style="font-family:calibri;font-size:14pt;text-align:center;padding-top:10px;color:black;">FORM BALAS PESAN</h4>
        </td>
    </tr>
    <form action="default.php?uri=admin/manajemen_user/balas_komentarp" method="post">
    <tr>
        <td style="padding:10px;">
            
        To: </td><td><input   class="form-control" style="border-radius:5px" type="text" name="email" value="<?php echo $hasil['email']; ?>" disabled>
        </td>
    </tr>
    <tr>
       <td>Nama</td>
       <td><input  class="form-control" type="text" name="nama"/></td>
    </tr>
    <tr>
       <td>subjek </td>
       <td><input class="form-control"type="text" name="subject"/></td>
    </tr>
    <tr>
       <td>Pesan</td>
       <td><textarea class="form-control" cols="60" rows="4" type="textarea" name="pesan"></textarea></td>
    </tr>
   <tr>
      <td align=center>
            <input type="submit" name="kirim" value="Kirim Balasan" style="margin-bottom:20px;">
        </td>
    </tr>
 
    </form>
</table>
 <?php
    }
    ?>