<?php
	$title = "FAQ"; 
	$page_on = 'faq';
	$script = "suppressionFaq";
?>

<?php ob_start(); ?>
	<section>	
		<h1>Questions en attente</h1>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<?php if (isset($message)) { ?>
			<p class="alerte"><?= $message ?></p>
		<?php } ?>

		<?php while ($question = $questions->fetch()) { ?>

			<div class="faq_admin_post">
				<div class="faq_admin_question">
					<p><?= htmlspecialchars($question['question']); ?></p>
				</div>

				<div class="faq_admin_boutons">
					<div class="bouton">
						<a href="/RocketSensorMVC/controller/faq.php?page=reponse&id=<?=htmlspecialchars($question['id']);?>">Répondre et publier</a>
					</div>
					<div class="bouton">
						<a id = "supprimer"href="/RocketSensorMVC/controller/faq.php?page=supprimer&id=<?=htmlspecialchars($question['id']);?>">Supprimer</a>
					</div>
				</div>
			</div>

		<?php } ?>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>