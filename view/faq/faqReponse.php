<?php
	$title = "FAQ"; 
	$page_on = 'faq';
?>

<?php ob_start(); ?>
	<section>	
		<h1>Répondre à la question</h1>
		<div class="faq_ajouter">
			<p><a href="/RocketSensorMVC/controller/faq.php?page=admin">Retour à la liste des question</a></p>

			<form method="post" action="/RocketSensorMVC/controller/faq.php?page=reponseTraitement&id=<?= $_GET['id'] ?>">
				<label for="question">Question</label><br/>
				<textarea name="question"><?= htmlspecialchars($question['question']);?></textarea><br/>

				<label for="reponse">Réponse</label><br/>
				<textarea name="reponse"></textarea>

				<div class="bouton">
					<input type="submit" value="Répondre et publier">
				</div>
			</form>
		</div>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>