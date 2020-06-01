<?php
	$title = "Mentions légales"; 
	$page_on = 'mentions_legales';
?>

<?php ob_start(); ?>

<section>
	<h1>Mentions légales</h1>
	<div id="mentions_legales_section">
		<div class="mentions_legales_bloc">
			<p class="mentions_legales_logo"><img src="/RocketSensorMVC/public/images/infinite-measures.png" alt="logo_inifnite-measures"></p>
			<h2>Infinite Measures</h2>
			<p><strong>RocketSensor</strong> est la propriété de la société <em>Inifinite Measures</em>. Tous les droits lui sont réservés. </p>
		</div>
		<div class="mentions_legales_separation">
		</div>
		<div class="mentions_legales_bloc">
			<p class="mentions_legales_logo"><img src="/RocketSensorMVC/public/images/bamboo.png" alt="logo_bamboo"></p>
			<h2>Bamboo</h2>
			<p>La solution <strong>Rocket Sensor</strong> a été développée par la startup <em>Bamboo</em>, en réponse à l'appel d'offre lancé par la société <em>Infinite Measures</em></p>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>