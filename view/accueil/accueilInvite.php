<?php ob_start(); ?>

	<div class="accueil_lien_utile">
		<a href="/RocketSensorMVC/index.php?section=inscription">
			<p><img src="/RocketSensorMVC/public/images/register.png"></p>
			<h3>S'inscrire</h3>
		</a>
	</div>

	<div class="accueil_lien_utile">
		<a href="/RocketSensorMVC/index.php?section=connexion">
			<p><img src="/RocketSensorMVC/public/images/login.png"></p>
			<h3>Se connecter</h3>
		</a>
	</div>

<?php $liens_utiles = ob_get_clean(); ?>

<?php require('accueilTemplate.php'); ?>