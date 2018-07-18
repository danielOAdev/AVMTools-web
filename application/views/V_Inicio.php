<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>AVM Tools</title>
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
				<h1>Bem-vindo ao AVM Tools!</h1>
			</div>
			<div class="dev row justify-content-center">
				Em desenvolvimento.
			</div>

			<div class="row justify-content-center">
				<table class="calendartable debug" border="1" cellpadding="4" cellspacing="0">
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
			</div>

			<svg width="500" height="500" class="chart">
				<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(255,20,20) stroke-width="200" fill="none" stroke-dasharray="629,22000"/>
				<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(20,200,50) stroke-width="200" fill="none" stroke-dasharray="490,22000"/>
				<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(20,50,200) stroke-width="200" fill="none" stroke-dasharray="352,22000"/>
				<circle r="100" cx="250" cy="250" class="pie" stroke=rgb(20,20,20) stroke-width="200" fill="none" stroke-dasharray="112,22000"/>
				<circle r="200" cx="250" cy="250" class="pie" stroke="white" stroke-width="2" fill="none" />
			</svg>

			<?php 
			echo $cale;
			?>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>

		<script src="/src/js/jquery.min.js"></script>
		<script src="/src/js/popper.min.js"></script>
		<script src="/src/js/bootstrap.min.js"></script>
	</body>
</html>