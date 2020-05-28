<?php ob_start(); ?>
	<div id="menu_utilisateur_connecte">
		<p><?= $_SESSION['prenom']?> <span class="nom"><?= $_SESSION['nom']?></span> ▾</p>
		<div class="sous_menu_utilisateur">
			<ul>
				<li><a href="profil.php">Mon profil</a></li>
				<li><a href="tests.php">Mes tests</a></li>
				<li><a href="resultats.php">Synthèse des résultats</a></li>
				<li><a href="deconnexion.php">Se déconnecter</a></li>
			</ul>
		</div>
	</div>
<?php $menu_utilisateur = ob_get_clean(); ?>

<?php require("headerTemplate.php"); ?>