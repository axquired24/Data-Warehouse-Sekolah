  <?php
      session_start();
      if(isset($_SESSION['username'])){
        $sekolah=$_SESSION['namasekolah'];
          header('Location: index.php');
    }
    else{
      session_destroy();
          ?>
        <li><a href="default?uri=logindaftar"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
      </ul>
    </div>
<br><br><br>
<div class="container">
<div class="col-md-4 col-md-offset-4"> 
<div class="panel panel-default">
  <div class="panel-heading">LOGIN SEKOLAH</div>
  <div class="panel-body">
<form action="default.php?uri=modul/login/session" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" name="username" placeholder="Email saat mendaftar">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <button type="submit" name="btnLogin" value= "login"  class="btn btn-default col-md-4 col-md-offset-1">Login</button>
</form>
<form action="default.php?uri=modul/login/logindaftar" method="post">
      <button type="submit" value="Register" name="btnRegister" class="btn btn-default col-md-4 col-md-offset-1">Daftar</button>
</form>
<form>
<div class="col-xs-12">
<a href="default.php?uri=modul/login/lupapasword">Forget Password</a><br></div>
</form>

 </div>    
</div>
</div>
</div>
<!------form daftar---->
<?php
    if(isset($_POST['btnRegister'])){   
?>
<form action="default.php?uri=modul/login/logindaftar" method="post" >
<div class="container">
<div class="col-md-6 col-md-offset-3"> 
<div class="panel panel-default">
  <div class="panel-heading">DAFTAR</div>
  <div class="panel-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama sekolah</label>
        <input type="text" class="form-control" name="namasekolah" placeholder="Nama Sekolah">
      </div>     
      <div class="form-group">
        <label for="exampleInputPassword1">Nis</label>
        <input type="text" class="form-control" name="nis" placeholder="Nis">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="username" class="form-control" name="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>   
      <div class="form-group">
        <input type="hidden" class="form-control" name="tipe" value=" ">
      </div>     
   <button type="submit" value="Register" name="btnDaftar" class="btn btn-default">Daftar</button>
 </div>    
</div>
</div>
</div>
</form>
<?php
    }
   //KLIK TOMBOL DAFTAR
if(isset($_POST['btnDaftar'])){
    //baca variabel
    $username = $_POST['username'];
    $namasekolah = $_POST['namasekolah'];
    $email = $_POST['email'];
    $nis = $_POST['nis'];
    $password = $_POST['password'];
    $level    = $_POST['tipe'];
    
    //validasi jika kosong
    $pesanError = array();
    if (trim($username) ==""){
        $pesanError[] = "<b>USername</b> harap di isi";
    }
    if (trim($email) ==""){
        $pesanError[] = "<b>Email</b> harap di isi";
    }
    if (trim($namasekolah) ==""){
        $pesanError[] = "<b>Nama</b> harap di isi";
    }
      if (trim($nis) ==""){
        $pesanError[] = "<b>nis/b> harap di isi";
    }
    if (trim($password) ==""){
        $pesanError[] = "<b>Password</b> harap di isi";
    }
    
    //validasi nama, tidak boleh sama
    $q1 = "SELECT * FROM loginsekolah WHERE username='$username'";
    $q2= mysql_query($q1, $koneksidb) or die ("Gagal Cek");
    $cek = mysql_num_rows($q2);
    if($cek >0) {
        echo "<script>";
        echo "alert('REGISTRASI GAGAL! Username ".$username." sudah ada yang menggunakan!')";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0; url='default.php?uri=modul/login/logindaftar'>";
    }
    
    if (count($pesanError)>=1 ){
    echo "<div class='pesanError' align='left'>";
    echo "<br><hr>";
      $noPesan=0;
      foreach ($pesanError as $indeks=>$pesan_tampil) { 
      $noPesan++;
        echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";  
      } 
    echo "<br>"; 
  }
    else{
       //simpan ke DB
        $mysql = "INSERT INTO loginsekolah (namasekolah, email, password, nis,username, level) VALUES('$namasekolah','$email','$password','$nis','$username','$level')";
        $myqry = mysql_query($mysql, $koneksidb) or die ("Gagal query".mysql_error());
        if($myqry){
          echo "<script>";
          echo "alert('REGISTRASI BERHASIL Username ".$username."')";
          echo "</script>";
            echo "<meta http-equiv='refresh' content='0; url='default.php?uri=modul/login/logindaftar'>";
        }
        exit;
    }    
  } 
}

?>

  </body>
</html>