<?php
	$title = "FAQ"; 
	$page_on = 'faq';
	$script = "resultat";
?>

<?php ob_start(); ?>
	<section>	
		<h1>FAQ</h1>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } if (isset($message)) { ?>
			<p id="faq_connectez-vous"><?= $message ?></p>
		<?php } ?>

		<?php while ($donnees = $req->fetch()) { ?>
				<div class="faq_post">
					<div class="faq_question">
						<h2>Question</h2>
						<p><?= $donnees['question']; ?></p>
					</div>

					<div class="faq_reponse">
						<h2>Réponse</h2>
						<p><?= $donnees['reponse']; ?></p>
					</div>

					<?php if (isset($optionsadmin)) {  echo $optionsadmin; } ?>
						
				</div>

			<?php } ?>



		<?php if (isset($poserquestion)) { echo $poserquestion; } ?>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>