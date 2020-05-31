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

				<div class="faq_boutons">
					<p><a href="/RocketSensorMVC/controller/faq.php?page=supprimer&id=<?= htmlspecialchars($question['id']); ?>">Supprimer</a></p> 
					<p><a href="/RocketSensorMVC/controller/faq.php?page=modifier&id=<?= htmlspecialchars($question['id']); ?>">Modifier</a></p>
				</div>
					
			</div>

		<?php } ?>

		<div class="bouton">
			<a href="/RocketSensorMVC/controller/faq.php?page=admin">Gérer la FAQ</a>
		</div>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>
