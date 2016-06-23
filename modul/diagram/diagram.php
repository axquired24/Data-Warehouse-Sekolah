<?php 
	$uk = $_GET[uk];

	$url_post 	= "./default.php?uri=modul/diagram/diagram&uk=".$uk;
?>


<div class="container">
<br><br><br>
<form method="post" class="form-horizontal" action="<?php echo $url_post; ?>">
<div class="col-md-offset-2 col-md-6">
	<select name="pilih" class="form-control input-lg">
	<?php 
		$pilih = $_POST[pilih];
		$selection = array(
							"kategori"=>"Kategori Sekolah",
							"jenis_sekolah"=>"Jenis Sekolah",
							"wilayah"=>"Wilayah",
							"waktu"=>"Waktu",
							"akreditasi"=>"Akreditasi"					
							);
		if(empty($pilih))
		{
			foreach ($selection as $key => $value) 
			{
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
		}
		else
		{
			echo '<option value="'.$pilih.'">'.$selection[$pilih].'</option>';
			foreach ($selection as $key => $value) 
			{
				if(($key == $pilih) || ($key == "1"))
				{
					// Skip
				}
				else
				{
					echo '<option value="'.$key.'">'.$value.'</option>';
				}				
			}			
		}
	?>
	</select>

</div> <!-- <div class="col-md-6"> -->
<div class="col-md-4">
	<button class="btn btn-lg btn-danger">Tampilkan Diagram</button>
</div> <!-- <div class="col-md-6"> -->		
</form><br><br><br><br>


<?php
ini_set( "display_errors", 0);


	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'skripsi';

	$conn = mysql_connect($host, $user, $pass);
	mysql_select_db($db, $conn);
	mysql_query("DELETE FROM isitabel WHERE unixkey != $_GET[uk]") OR DIE(mysql_error());

	// ser get year


	$year=$_POST['pilih'];

	switch($year){
		case "jenis_sekolah":
			$categories = array('Jenis Sekolah');

			// data series
			$data_ser 	= mysql_query("SELECT DISTINCT(namajenis) FROM isitabel WHERE unixkey='$uk' ORDER BY namajenis DESC");
					$data_series= array();
					while($dat = mysql_fetch_array($data_ser)) 
					{
						array_push($data_series, $dat[namajenis]);
					}

			// set sereis
			$series = array();

			// set series
			foreach ($data_series as $key=>$val) {
				array_push($series, array(
					'name'=>$val,
					'data'=>array()
				));
			}

			// set data value per series
			foreach ($data_series as $key=>$val) {
				$sql = 'SELECT COUNT(*) AS result FROM isitabel a';
				$sql .= ' WHERE a.namajenis = "'.$val.'"';
				$sql .= ' AND unixkey = '.$_GET[uk];
				$rs = mysql_query($sql);
				$row = mysql_fetch_array($rs);

				$result = $row['result'];

				array_push($series[$key]['data'], (int) $result);
			}
		?>
							<div id="contoh" style="width: 100%; height: 500px"></div>
				<script type="text/javascript">
				$('#contoh').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'DIAGRAM JENIS SEKOLAH'
					},
					subtitle: {
						text: '<?php echo $year; ?>'
					},
					xAxis: {
						categories: <?php echo json_encode($categories); ?>,
						labels: {
							rotation: 0,
							align: 'center'
						}
					},
					series: <?php echo json_encode($series); ?>
				});
				</script>
		<?php

		break;



		case "wilayah":
					$categories = array('Wilayah');

					$data_ser 	= mysql_query("SELECT DISTINCT(namawil) FROM isitabel WHERE unixkey='$uk' ORDER BY namawil DESC");
					$data_series= array();
					while($dat = mysql_fetch_array($data_ser)) 
					{
						array_push($data_series, $dat[namawil]);
					}
					
					// set sereis
					$series = array();

					// set series
					foreach ($data_series as $key=>$val) {
						array_push($series, array(
							'name'=>$val,
							'data'=>array()
						));
					}

					// set data value per series
					foreach ($data_series as $key=>$val) {
						$sql = 'SELECT COUNT(*) AS result FROM isitabel a';
						$sql .= ' WHERE a.namawil = "'.$val.'"';
						$sql .= ' AND unixkey = '.$_GET[uk];
						$rs = mysql_query($sql);
						$row = mysql_fetch_array($rs);

						$result = $row['result'];

						array_push($series[$key]['data'], (int) $result);
					}
				?>
									<div id="contoh" style="width: 100%; height: 500px"></div>
						<script type="text/javascript">
						$('#contoh').highcharts({
							chart: {
								type: 'column'
							},
							title: {
								text: 'DIAGRAM WILAYAH SEKOLAH'
							},
							subtitle: {
								text: '<?php echo $year; ?>'
							},
							xAxis: {
								categories: <?php echo json_encode($categories); ?>,
								labels: {
									rotation: 0,
									align: 'center'
								}
							},
							series: <?php echo json_encode($series); ?>
						});
						</script>
				<?php
		break;

		case "waktu":
					$categories = array('Tahun');
					$data_ser 	= mysql_query("SELECT DISTINCT(tahun) FROM isitabel WHERE unixkey='$uk' ORDER BY tahun DESC");
					$data_series= array();
					while($dat = mysql_fetch_array($data_ser)) 
					{
						array_push($data_series, $dat[tahun]);
					}
					
					// set sereis
					$series = array();

					// set series
					foreach ($data_series as $key=>$val) {
						array_push($series, array(
							'name'=>$val,
							'data'=>array()
						));
					}

					// set data value per series
					foreach ($data_series as $key=>$val) {
						$sql = 'SELECT COUNT(*) AS result FROM isitabel a';
						$sql .= ' WHERE a.tahun = "'.$val.'"';
						$sql .= ' AND unixkey = '.$_GET[uk];
						$rs = mysql_query($sql);
						$row = mysql_fetch_array($rs);

						$result = $row['result'];

						array_push($series[$key]['data'], (int) $result);
					}
				?>
									<div id="contoh" style="width: 100%; height: 500px"></div>
						<script type="text/javascript">
						$('#contoh').highcharts({
							chart: {
								type: 'column'
							},
							title: {
								text: 'DIAGRAM TAHUN SEKOLAH'
							},
							subtitle: {
								text: '<?php echo $year; ?>'
							},
							xAxis: {
								categories: <?php echo json_encode($categories); ?>,
								labels: {
									rotation: 0,
									align: 'center'
								}
							},
							series: <?php echo json_encode($series); ?>
						});
						</script>
				<?php
		break;

		case "akreditasi":
					$categories = array('Akreditasi');
					$data_ser 	= mysql_query("SELECT DISTINCT(namaakreditasi) FROM isitabel WHERE unixkey='$uk' ORDER BY namaakreditasi DESC");
					$data_series= array();
					while($dat = mysql_fetch_array($data_ser)) 
					{
						array_push($data_series, $dat[namaakreditasi]);
					}
					
					// set sereis
					$series = array();

					// set series
					foreach ($data_series as $key=>$val) {
						array_push($series, array(
							'name'=>$val,
							'data'=>array()
						));
					}

					// set data value per series
					foreach ($data_series as $key=>$val) {
						$sql = 'SELECT COUNT(*) AS result FROM isitabel a';
						$sql .= ' WHERE a.namaakreditasi = "'.$val.'"';
						$sql .= ' AND unixkey = '.$_GET[uk];
						$rs = mysql_query($sql);
						$row = mysql_fetch_array($rs);

						$result = $row['result'];

						array_push($series[$key]['data'], (int) $result);
					}
				?>
									<div id="contoh" style="width: 100%; height: 500px"></div>
						<script type="text/javascript">
						$('#contoh').highcharts({
							chart: {
								type: 'column'
							},
							title: {
								text: 'DIAGRAM AKREDITASI SEKOLAH'
							},
							subtitle: {
								text: '<?php echo $year; ?>'
							},
							xAxis: {
								categories: <?php echo json_encode($categories); ?>,
								labels: {
									rotation: 0,
									align: 'center'
								}
							},
							series: <?php echo json_encode($series); ?>
						});
						</script>
				<?php
		break;

		case "kategori":
					$categories = array('Katagori');
					$data_ser 	= mysql_query("SELECT DISTINCT(namakategori) FROM isitabel WHERE unixkey='$uk' ORDER BY namakategori DESC");
					$data_series= array();
					while($dat = mysql_fetch_array($data_ser)) 
					{
						array_push($data_series, $dat[namakategori]);
					}
					
					// set sereis
					$series = array();

					// set series
					foreach ($data_series as $key=>$val) {
						array_push($series, array(
							'name'=>$val,
							'data'=>array()
						));
					}

					// set data value per series
					foreach ($data_series as $key=>$val) {
						$sql = 'SELECT COUNT(*) AS result FROM isitabel a';
						$sql .= ' WHERE a.namakategori = "'.$val.'"';
						$sql .= ' AND unixkey = '.$_GET[uk];
						$rs = mysql_query($sql);
						$row = mysql_fetch_array($rs);

						$result = $row['result'];

						array_push($series[$key]['data'], (int) $result);
					}
				?>
									<div id="contoh" style="width: 100%; height: 500px"></div>
						<script type="text/javascript">
						$('#contoh').highcharts({
							chart: {
								type: 'column'
							},
							title: {
								text: 'DIAGRAM KATEGORI SEKOLAH'
							},
							subtitle: {
								text: '<?php echo $year; ?>'
							},
							xAxis: {
								categories: <?php echo json_encode($categories); ?>,
								labels: {
									rotation: 0,
									align: 'center'
								}
							},
							series: <?php echo json_encode($series); ?>
						});
						</script>
				<?php
		break;

		default:
        // echo '<h3 class="page-header text-center">Pilih Data Dahulu</h3>';
					$categories = array('Katagori');
					$data_ser 	= mysql_query("SELECT DISTINCT(namakategori) FROM isitabel WHERE unixkey='$uk' ORDER BY namakategori DESC");
					$data_series= array();
					while($dat = mysql_fetch_array($data_ser)) 
					{
						array_push($data_series, $dat[namakategori]);
					}
					
					// set sereis
					$series = array();

					// set series
					foreach ($data_series as $key=>$val) {
						array_push($series, array(
							'name'=>$val,
							'data'=>array()
						));
					}

					// set data value per series
					foreach ($data_series as $key=>$val) {
						$sql = 'SELECT COUNT(*) AS result FROM isitabel a';
						$sql .= ' WHERE a.namakategori = "'.$val.'"';
						$sql .= ' AND unixkey = '.$_GET[uk];
						$rs = mysql_query($sql);
						$row = mysql_fetch_array($rs);

						$result = $row['result'];

						array_push($series[$key]['data'], (int) $result);
					}
				?>
									<div id="contoh" style="width: 100%; height: 500px"></div>
						<script type="text/javascript">
						$('#contoh').highcharts({
							chart: {
								type: 'column'
							},
							title: {
								text: 'DIAGRAM KATEGORI SEKOLAH'
							},
							subtitle: {
								text: '<?php echo $year; ?>'
							},
							xAxis: {
								categories: <?php echo json_encode($categories); ?>,
								labels: {
									rotation: 0,
									align: 'center'
								}
							},
							series: <?php echo json_encode($series); ?>
						});
						</script>
				<?php
		break;        
	}

?>

	

</div>
</body>
</html>