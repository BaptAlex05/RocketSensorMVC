<?php 
	session_start();

	function accueil() {
		if (isset($_SESSION['id'])) {
			if ($_SESSION['role'] == 'Élève') {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/accueil/accueilEleve.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/accueil/accueilConnecte.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/accueil/accueilInvite.php");	
		}
	}
