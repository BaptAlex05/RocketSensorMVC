<!DOCTYPE html>
<html>
	<head>
		<meta charset="uft-8" />
		<link rel="icon" href="../../public/images/logo_rocket-sensor.png" />
		<title>Rocket Sensor - <?= $title ?></title>
		<link rel="stylesheet" href="../../public/css/style.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	</head>

	<body>
		<div id="header">
			<?php 
				require("../../controller/header/header.php"); 
				getHeader($page_on);
			?>	
		</div>

		<?= $content ?>

		<div id="footer">
			<footer>
				<div id="bloc_footer">

					<nav id="menu_footer">
						<ul>
							<li><a href="cgu.php">Conditions générales d'utilisation</a></li>
							<li><a href="mentions_legales.php">Mentions légales</a></li>
					</nav>

					<div id="copyright">
						<p>© 2020 Rocket Sensor - Tous droits réservés.<br/>
							Site réalisé avec ❤️ par Bamboo</p>
					</div>	

					<div id="logo_infinite-measures">
						<img src="../../public/images/infinite-measures.png" alt="logo_infinite-measures">
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>