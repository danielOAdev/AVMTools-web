<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>AVM Tools</title>
</head>
<body>

<div id="container">
	<h1>Bem vindo ao AVM  Tools!</h1>

	<div id="body">
		<p>Em desenvolvimento.</p>
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

</body>
</html>