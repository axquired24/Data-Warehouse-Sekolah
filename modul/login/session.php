<?php
session_start();
if(!empty($_POST['btnLogin'])){

    $email  = $_POST['username'];
    $pass   = $_POST['password'];
    $query  = "SELECT * FROM loginsekolah WHERE email='$email' AND password='$pass'";
    $query = mysql_query($query);
    if(mysql_num_rows($query) > 0)
    {
        $data = mysql_fetch_array($query);
        $_SESSION['email']=$data['email'];
        $_SESSION['namasekolah']=$data['namasekolah'];
        $_SESSION['nis']=$data['nis'];
        $_SESSION['level']=$data['level'];
        if($_SESSION['level']== "admin")
        {
            header('location: default.php?uri=modul/view/home');
        }
        elseif ($_SESSION['level']== "user")
        {
            header('location: default.php?uri=modul/view/home');
        }    
        }    
        else
        {
            echo"
            <script>
                alert('email atau password salah');
                history.back()
            </script>";
           
        }
}
?>