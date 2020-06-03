<?php ob_start(); ?>

	<div class="accueil_lien_utile">
		<a href="/RocketSensorMVC/controller/utilisateurs.php?page=profil">
			<p><img src="/RocketSensorMVC/public/images/profil.png"></p>
			<h3>Profil</h3>
		</a>
	</div>

<?php $liens_utiles = ob_get_clean(); ?>

<?php require('accueilTemplate.php'); ?>