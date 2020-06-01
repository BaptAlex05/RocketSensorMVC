<?php
	$title = "Mot de passe oublié"; 
	$page_on = 'connexion';
?>

<?php ob_start(); ?>
	<section>	
		<div id="head_inscription">
			<h1>Mot de passe oublié</h1>
			<p>Réinitialisez votre mot de passe</p>
		</div>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<form method="post" action="/RocketSensorMVC/controller/connexion.php?page=motDePasseOublieTraitement" id="connexion">
			<div id="formulaire_connexion">
				<div id="formulaire_connexion">
					<div>
						<p><label for="mail">Saississez votre adresse mail</label></br>
						<input type="email" name="mail" id="emailinput"></p>
					</div>
			    </div>
			</div>
			<div class="bouton">
				<input type="submit" value="Réinitialiser" />	
			</div>
		</form>
		
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>