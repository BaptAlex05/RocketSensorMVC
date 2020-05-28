<?php
	$title = "Connexion"; 
	$page_on = 'connexion';
?>

<?php ob_start(); ?>
	<section>	
		<div id="head_connexion">				
			<h1>Connexion</h1>
			<p>Connectez-vous avec votre adresse mail</p>
		</div>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<form method="post" action="/RocketSensorMVC/controller/connexion.php?page=traitement" id="connexion">
			<div id="formulaire_connexion">
				<div id="formulaire_connexion">
					<div>
						<p><label for="mail">Adresse email</label></br>
						<input type="mail" name="mail" id="mail"></p>
				    	<p><label for="motdepasse">Mot de passe</label></br>
						<input type="password" name="motdepasse" id="motdepasse"></p>
						<p><a href="MotDePasseOublie.php">Mot de passe oublié ?</a></p>
					</div>
			    </div>
			</div>
			<div class="bouton">
				<input type="submit" value="Se connecter" />	
			</div>
		</form>

		<p id="deja_inscrit"><a href="/RocketSensorMVC/controller/inscription.php">Pas encore inscrit ?</a></p>	
		
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>