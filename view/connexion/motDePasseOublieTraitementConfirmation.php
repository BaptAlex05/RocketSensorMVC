<?php
	$title = "Mot de passe oublié"; 
	$page_on = 'connexion';
?>

<?php ob_start(); ?>
	<section>	
		<p id='bien_inscrit'> Un email de récupération vient d'être envoyé. </br>
			Merci de consulter votre boite mail.</p>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>