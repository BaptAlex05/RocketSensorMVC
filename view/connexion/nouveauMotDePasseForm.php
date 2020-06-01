<?php
	$title = "Nouveau mot de passe"; 
	$page_on = 'connexion';
?>

<?php ob_start(); ?>
	<section>	
		<div id="head_inscription">
			<h1>Définir un nouveau mot de passe</h1>
		</div>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<form method="post" action="/RocketSensorMVC/controller/connexion.php?page=nouveauMotDePasseTraitement&mail=<? htmlspecialchars($_GET['mail']) ?>" id="recuperation">
				<p>
					<label for="motdepasse">Nouveau mot de passe</label><br/>
					<input type="password" name="motdepasse" id="motdepasse" class="motdepasse_recuperation" required/>
				</p>
				<p>
   					<label for="motdepasse_bis">Resaisir votre nouveau mot de passe</label><br/>
   					<input type="password" name="motdepasse_bis" id="motdepasse_bis" class='motdepasse_recuperation' required/>
				</p>

				<div class="bouton">
					<input type="submit" value="Réinitialiser mon mot de passe" />	
				</div>
		</form>
		
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>