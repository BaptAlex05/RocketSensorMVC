<!DOCTYPE html>
<html>
	<head>
		<meta charset="uft-8" />
		<link rel="icon" href="/RocketSensorMVC/public/images/logo_rocket-sensor.png" />
		<title>Rocket Sensor - <?= $title ?></title>
		<link rel="stylesheet" href="/RocketSensorMVC/public/css/style.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	</head>

	<body>
		<div id="header">
			<?php 
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/header/header.php"); 
				getHeader($page_on);
			?>	
		</div>

		<?= $content ?>

		<div id="footer">
			<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/footer/footer.php"); ?>
		</div>
	</body>
</html>