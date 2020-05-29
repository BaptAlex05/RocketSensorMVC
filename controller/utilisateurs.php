<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/utilisateursModel.php");

	if (isset($_SESSION['id'])) {
		profil();
	}

	else {
		header("Location: /RocketSensorMVC/controller/connexion.php");
	}

	function profil() {
		$utilisateur = getUser($_SESSION['id']);

		if ($_SESSION['role'] == 'Élève' || $_SESSION['role'] == 'Moniteur') {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 1) {
					$alerte = "Le profil a bien été modifié.";
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilEleveMoniteur.php");
				}

				else {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilEleveMoniteur.php");
				}
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilEleveMoniteur.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilTemplate.php");
		}
		
	}