<?php
	$title = "FAQ"; 
	$page_on = 'faq';
?>

<?php ob_start(); ?>
	<section>	
		<h1>Poser une question</h1>

		<div class="faq_ajouter">

			<p>Vous pouvez poser une question grâce au formulaire ci-dessous. Celle-ci sera ensuite traitée par un administrateur et publiée avec une réponse sur la <a href="faq.php">page de la FAQ</a> si celle-ci est jugée utile. Pour toute question ou demande personnelle, merci d'utiliser le <a href="contact.php">formulaire de contact</a>.</p>

			<form method="post" action="/RocketSensorMVC/controller/faq.php?page=questionTraitement">
				
				<textarea name="question"></textarea>

				<div class="bouton">
					<input type="submit" value="Envoyer">
				</div>

			</form>
		</div>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>