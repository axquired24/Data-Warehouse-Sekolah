<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "root";
$db_name = "warehouse_sekolah";


$koneksidb = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($db_name) or die (mysql_error());


?>


