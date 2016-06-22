<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
include "lib/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Warehouse Sekolah</title>

	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- JS  -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/highcharts.js"></script>

</head>
<body>
	<?php 
		session_start();
		
		if ($_SESSION['level']=="user")
		{
			include 'modul/view/navbaradmin.php';;
		} 
		elseif ($_SESSION['level']=="admin")
		{
			include 'modul/view/navbarsuperadmin.php';;
		} else {
			include 'modul/view/navbardepan.php';
		
		}


		
		$urlfile 	= $_GET[uri];
		include 	$urlfile.".php";



		//footer
		include "modul/view/footer.php";
	?>
	
</body>
</html>