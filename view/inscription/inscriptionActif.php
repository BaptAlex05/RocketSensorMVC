<?php
	$title = "Activation"; 
	$page_on = 'inscription';
?>

<?php ob_start(); ?>

	<section>
		<p id='bien_inscrit'>Votre compte est déjà actif. <br/>
			Vous pouvez dès à présent <a href="/RocketSensorMVC/controller/connexion.php">vous connecter</a>.</p>
	</section>
	
<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>