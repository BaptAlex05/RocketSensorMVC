<?php
	$title = "Activation"; 
	$page_on = 'inscription';
?>

<?php ob_start(); ?>

	<section>
		<p id='bien_inscrit'>Une erreur est survenue. Votre compte n'a pas pu être activé. <br/>
			En cas de problème, vous pouvez <a href="/RocketSensorMVC/controller/contact.php">contacter l'administrateur</a>.</p>
	</section>
	
<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>