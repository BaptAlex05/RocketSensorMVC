<div id="menu_utilisateur_connecte">
	<p><?= $_SESSION['prenom']?> <span class="nom"><?= $_SESSION['nom']?></span> ▾</p>
	<div class="sous_menu_utilisateur">
		<?= $menu_utilisateur_connecte; ?>
	</div>
</div>