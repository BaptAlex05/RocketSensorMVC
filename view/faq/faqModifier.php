<?php
	$title = "FAQ"; 
	$page_on = 'faq';
?>

<?php ob_start(); ?>
	<section>	
		<h1>Modifier la question/réponse</h1>
		<div class="faq_ajouter">
			<p><a href="/RocketSensorMVC/controller/faq.php">Retour à la FAQ</a></p>

			<form method="post" action="/RocketSensorMVC/controller/faq.php?page=modifierTraitement&id=<?=$_GET['id']?>">
				<label for="question">Question</label><br/>
				<textarea name="question"><?= htmlspecialchars($resultat['question']) ;?></textarea><br/>

				<label for="reponse">Réponse</label><br/>
				<textarea name="reponse"><?= htmlspecialchars($resultat['reponse']);?></textarea>

				<div class="bouton">
					<input type="submit" value="Modifier">
				</div>
			</form>
		</div>
	
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>