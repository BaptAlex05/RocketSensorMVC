<?php ob_start(); ?>

	<div class="accueil_lien_utile">
		<a href="profil.php">
			<p><img src="/RocketSensorMVC/public/images/profil.png"></p>
			<h3>Profil</h3>
		</a>
	</div>

	<div class="accueil_lien_utile">
		<a href="tests.php">
			<p><img src="/RocketSensorMVC/public/images/tests.png"></p>
			<h3>Mes tests</h3>
		</a>
	</div>

<?php $liens_utiles = ob_get_clean(); ?>

<?php require('accueilTemplate.php'); ?>