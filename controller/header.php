<?php session_start(); 

require('headerView.php');

if (isset($_SESSION['id'])) {
	ob_start();
	require('../view/header/menu_utilisateur_connecte.php');
	$menu_utilisateur = ob_get_clean();

	if ($_SESSION['role'] == 'Eleve') {
		ob_start();
		require('../view/header/menu_eleve.php');
		$menu_utilisateur_connecte = ob_get_clean();
	}

	elseif ($_SESSION['role'] == 'Moniteur') {
		ob_start();
		require('../view/header/menu_moniteur.php');
		$menu_utilisateur_connecte = ob_get_clean();
	}

	elseif ($_SESSION['role'] == 'Administrateur') {
		ob_start();
		require('../view/header/menu_administrateur.php');
		$menu_utilisateur_connecte = ob_get_clean();
	}
}

else {
	ob_start();
	require('../view/header/menu_invite.php');
	$menu_utilisateur = ob_get_clean();
}
?>
