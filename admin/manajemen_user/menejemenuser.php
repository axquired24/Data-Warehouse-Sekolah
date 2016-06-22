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
           <h2 class="text-center">PASSWORD MEMBER</h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama Sekolah </th>
                            <th>Nis</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>edit</th>
                            <th>hapus</th>
                            <th>Balas</th>
                         </tr>
                        
                    </thead>
     <tbody>
    <?php
    $no = 1;
    $query = mysql_query("SELECT * FROM loginsekolah ORDER BY namasekolah ASC");
    while($hasil = mysql_fetch_array($query)){
        echo "<tr>";
        echo "<td>$no";
        echo "<td>$hasil[namasekolah]</td>";
        echo "<td>$hasil[nis]</td>";
        echo "<td>$hasil[email]</td>";
        echo "<td>$hasil[username]</td>";
        echo"<td>$hasil[password]</td>";
        echo"<td>$hasil[level]</td>";
        echo "<td ><a href='default.php?uri=admin/manajemen_user/edit&idlogin=$hasil[idlogin]'>edit</a></td>";
        echo "<td><a href='default.php?uri=admin/manajemen_user/act_hapus&idlogin=$hasil[idlogin]' onclick='return confirm(\"Anda yakin ingin menghapus data sekolah $hasil[namasekolah] ?\")'>hapus</a></td>";
        echo "<td class='td-data'><a href='default.php?uri=admin/manajemen_user/balas&idlogin=$hasil[idlogin]'>balas</a></td>";

        echo "</tr>";
        $no++;
    }
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