<?php session_start(); 

if (isset($_SESSION['id'])) {
	ob_start();
	require('view/accueil/liens_utiles_utilisateur_connecte.php');
	$liens_utiles = ob_clean();
}

else {
	ob_start();
	require('view/accueil/liens_utiles_invite.php');
	$liens_utiles = ob_clean();
}

require('view/accueilView.php');

