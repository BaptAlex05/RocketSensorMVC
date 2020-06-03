<?php ob_start(); ?>
	<div id="menu_utilisateur_connecte">
		<p><?= $_SESSION['prenom']?> <span class="nom"><?= $_SESSION['nom']?></span> ▾</p>
		<div class="sous_menu_utilisateur">
			<ul>
				<li><a href="/RocketSensorMVC/index.php?section=utilisateurs&page=profil">Mon profil</a></li>
				<li><a href="/RocketSensorMVC/index.php?section=utilisateurs">Liste des utilisateurs</a></li>
				<li><a href="/RocketSensorMVC/index.php?section=autoecoles">Liste des auto-écoles</a></li>
				<li><a href="/RocketSensorMVC/index.php?section=tests&page=admin">Gestion des tests</a></li>
				<li><a href="/RocketSensorMVC/index.php?section=faq&page=admin">Gérer la FAQ</a></li>
				<li><a href="/RocketSensorMVC/index.php?section=contact&page=admin">Messagerie</a></li>
				<li><a href="/RocketSensorMVC/index.php?section=connexion&page=deconnexion">Se déconnecter</a></li>
			</ul>
		</div>
	</div>
<?php $menu_utilisateur = ob_get_clean(); ?>

<?php require("headerTemplate.php"); ?>