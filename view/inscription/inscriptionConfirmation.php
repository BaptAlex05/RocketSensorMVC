<?php
	$title = "Inscription"; 
	$page_on = 'inscription';
?>

<?php ob_start(); ?>

	<section>
		<p id='bien_inscrit'>Un mail de confirmation vient de vous être envoyé afin de valider votre inscription.  </br>
		Merci de consulter votre boîte mail.</p>
	</section>
	
<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>