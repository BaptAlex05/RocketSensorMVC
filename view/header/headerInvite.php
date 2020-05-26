<?php ob_start(); ?>
	<nav id="menu_utilisateur_invite">
		<ul> 
			<li id="bouton_menu_inscription"><a href="inscription.php">S'inscrire</a></li>
	    	<li id="bouton_menu_connexion"><a href="connexion.php">Se connecter</a></li>
		</ul>
	</nav>
<?php $menu_utilisateur = ob_get_clean(); ?>

<?php require('headerTemplate.php'); ?>

