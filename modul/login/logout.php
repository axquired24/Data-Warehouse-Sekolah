<?php
session_start();
session_destroy();
header('Location: default.php?uri=modul/login/logindaftar');
?>