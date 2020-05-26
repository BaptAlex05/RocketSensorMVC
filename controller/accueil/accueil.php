<?php 

	session_start();

/*
	require('../header/header.php');
	getHeader();
*/

	if (isset($_SESSION['id'])) {
		if ($_SESSION['role'] == 'Élève') {
			require('../../view/accueil/accueilEleve.php');
		}

		else {
			require('../../view/accueil/accueilConnecte.php');
		}
	}

	else {
		require('../../view/accueil/accueilInvite.php');	
	}
