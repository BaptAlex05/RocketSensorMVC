<?php
	function getHeader($page_on) {
		if (isset($_SESSION['id'])) { 
			if ($_SESSION['role'] == 'Élève') {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/header/headerEleve.php");
			}

			elseif ($_SESSION['role'] == 'Moniteur') {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/header/headerMoniteur.php");
			}

			elseif($_SESSION['role'] == 'Administrateur') {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/header/headerAdministrateur.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/header/headerInvite.php");
		}
	}
