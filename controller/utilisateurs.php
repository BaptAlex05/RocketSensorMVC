<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/utilisateursModel.php");

	if (isset($_SESSION['id'])) {
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "modifier") {
				profilModifier();
			}

			elseif ($_GET['page'] == "traitement") {
				profilModifierTraitement();
			}

			else {
				profil();
			}
		}

		else {
			profil();
		}
	}

	else {
		header("Location: /RocketSensorMVC/controller/connexion.php");
	}

	function profil() {
		$utilisateur = getUserProfil($_SESSION['id']);

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

	function profilModifier() {
		$utilisateur = getUserModifierProfil($_SESSION['id']);

		if ($_SESSION['role'] == 'Élève' || $_SESSION['role'] == 'Moniteur') {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilModifierEleveMoniteur.php");
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilModifierTemplate.php");
		}		
	}

	function profilModifierTraitement() {
		if (isset($_SESSION['id'])) {
			updateUser($_SESSION['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['datenaissance'], $_POST['autoecole']);
			$_SESSION['mail'] = $_POST['mail'];
    		$_SESSION['prenom'] = $_POST['prenom'];
    		$_SESSION['nom'] = $_POST['nom'];

    		header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
		}

		else {
			header("Location: /RocketSensorMVC/controller/connexion.php");
		}

	}

	function utilisateursListe() {
	}