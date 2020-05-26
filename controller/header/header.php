<?php
	function getHeader() {
		if (isset($_SESSION['id'])) { 
			if ($_SESSION['role'] == 'Élève') {
				require('../../view/header/headerEleve.php');
			}

			elseif ($_SESSION['role'] == 'Moniteur') {
				require('../../view/header/headerMoniteur.php');
			}

			elseif($_SESSION['role'] == 'Administrateur') {
				require('../../view/header/headerAdministrateur.php');
			}
		}

		else {
			require('../../view/header/headerInvite.php');
		}
	}
