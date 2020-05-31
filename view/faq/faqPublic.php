<?php
	$title = "FAQ"; 
	$page_on = 'faq';
?>

<?php ob_start(); ?>

	<section>	
		<h1>FAQ</h1>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<p id="faq_connectez-vous">"Pour pouvoir poser une question sur la FAQ, veuillez <a href="/RocketSensorMVC/controller/connexion.php">vous connecter</a>. Pour toute question ou demande personnelle, merci d'utiliser le <a href="/rocketSensorMVC/controller/contact.php">formulaire de contact</a>."</p>


		<?php while ($question = $questions->fetch()) { ?>
			<div class="faq_post">
				<div class="faq_question">
					<h2>Question</h2>
					<p><?= htmlspecialchars($question['question']); ?></p>
				</div>

				<div class="faq_reponse">
					<h2>Réponse</h2>
					<p><?= htmlspecialchars($question['reponse']); ?></p>
				</div>
					
			</div>

		<?php } ?>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>
