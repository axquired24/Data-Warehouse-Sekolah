<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$nama=$_POST["name"];
$email=$_POST["email"];
$subjek=$_POST["subjek"];
$pesan=$_POST["pesan"];$to="email.anda@gmail.com";
$header="From: $email";@mail($to, $subjek, $pesan, $header);
echo "<script> alert('pesan sudah terkirim');</script>";
echo "<meta http-equiv='refresh' content='0; url=default.php?uri=admin/manajemen_user/menejemenuser'>";
?>

<!--<?php
$to = $_POST["email"];
$nama = $_POST["name"];
$subject = $_POST["subjek"];
$messages = $_POST["pesan"];
    
$headers .= "From: <admin@gmail.com>" . "rn"; //bagian ini diganti sesuai dengan email dari pengirim
@mail($to, $subject, $messages, $headers.php);
if(@mail) 
{
    echo "pengiriman berhasil";
}
else 
{
    echo "pengiriman gagal";
}

?>-->