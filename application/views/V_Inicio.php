<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tools</title>
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
		<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/src/css/bootstrap.css">
		<link rel="stylesheet" href="/src/css/styles.css">
	</head>
		<body>

		<div class="container-fluid">
			<div class="debug row justify-content-center">
				<h1>Header</h1>
			</div>
			<div class="dev row justify-content-center">
				Em desenvolvimento.
			</div>

			<div class="container main">
				<div class="row calendarheader">
					<table class="calendartable" border="0" cellpadding="4" cellspacing="0">
						<tbody>
							<tr>
								<td>DOM</td>
								<td>SEG</td>
								<td>TER</td>
								<td>QUA</td>
								<td>QUI</td>
								<td>SEX</td>
								<td>SAB</td>
							</tr>
						</tbody>
					</table>
					<div class="scrollspace" ></div>
				</div>
				<div class="row daysgrid">
					<?php
						$first = true;
						foreach($daterange as $date){
							if ($first)
							{
								$first = false;
								if($date->format("w")>0)
								{
									echo '<div class="cell vazio col-xs"></div>';
								}
							}
							if(!$date->format("w"))
							{
								echo '<div class="w-100"></div>';
							}
							if($date->format("j")==1)
							{
								if($date->format("w")!=0){
									echo '<div class="cell vazio col-xs"></div>';
								}
								echo '<div class="w-100"></div>';
								echo '<div class="cell month col-xs">'.$date->format("F").'</div>';
								echo '<div class="w-100"></div>';
								if($date->format("w")!=0){
									echo '<div class="cell vazio col-xs"></div>';
								}
							}
							$data = $date->format("j/n");
							$hoje = $dia.'/'.$mes;
							if($data == $hoje)
								$id = 'id = "hoje"';
							else
								$id = '';
							echo '<div class="cell col-xs" '.$id.'>'.$date->format("d/m").'</div>';
						}
					?>
				</div>

				<svg width="500" height="500" class="chart">
					<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(255,20,20) stroke-width="200" fill="none" stroke-dasharray="629,22000"/>
					<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(20,200,50) stroke-width="200" fill="none" stroke-dasharray="490,22000"/>
					<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(20,50,200) stroke-width="200" fill="none" stroke-dasharray="352,22000"/>
					<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(20,20,20) stroke-width="200" fill="none" stroke-dasharray="112,22000"/>
					<circle r="200" cx="250" cy="250" class="pie" stroke="white" stroke-width="2" fill="none" />
				</svg>

				<?php 
				echo $esse->SayHey();
				echo $db_test;
				echo $cale;
				?>

			</div>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>
		<script src="/src/js/jquery.min.js"></script>
		<script src="/src/js/popper.min.js"></script>
		<script src="/src/js/bootstrap.min.js"></script>
	</body>
	<script>
		var days = document.getElementsByClassName('cell');
		Array.from(days).forEach(function(day) {
			day.addEventListener('click', function (event) {
				alert(day.innerText);
			});
		});
		
		$(document).ready(function(){
			var elmnt = document.getElementById("hoje");
			elmnt.scrollIntoView();
		});
	</script>
</html>