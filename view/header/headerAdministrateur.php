<?php ob_start(); ?>
	<div id="menu_utilisateur_connecte">
		<p><?= $_SESSION['prenom']?> <span class="nom"><?= $_SESSION['nom']?></span> ▾</p>
		<div class="sous_menu_utilisateur">
			<ul>
				<li><a href="profil.php">Mon profil</a></li>
				<li><a href="utilisateurs.php">Liste des utilisateurs</a></li>
				<li><a href="liste_autoecoles.php">Liste des auto-écoles</a></li>
				<li><a href="/RocketSensorMVC/controller/tests.php?page=admin">Gestion des tests</a></li>
				<li><a href="faq_admin.php">Gérer la FAQ</a></li>
				<li><a href="messagerie.php">Messagerie</a></li>
				<li><a href="/RocketSensorMVC/controller/connexion.php?page=deconnexion">Se déconnecter</a></li>
			</ul>
		</div>
	</div>
<?php $menu_utilisateur = ob_get_clean(); ?>

<?php require("headerTemplate.php"); ?>