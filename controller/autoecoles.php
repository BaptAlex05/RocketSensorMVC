<?php 
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/autoecolesModel.php");

	if (isset($_SESSION['id'])) {

		if ($_SESSION['role'] == "Administrateur") {

			if (isset($_GET['page'])) {
				if ($_GET['page'] == "autoecole") {
					autoecole();
				}

				elseif ($_GET['page'] == "supprimer") {
					supprimerAutoecole();
				}

				elseif ($_GET['page'] == "ajouter") {
					ajouterAutoecole();
				}

				elseif ($_GET['page'] == "ajouterTraitement") {
					ajouterTraitement();
				}

				elseif ($_GET['page'] == "modifier") {
					modifierAutoecole();
				}

				elseif ($_GET['page'] == "modifierTraitement") {
					modifierTraitement();
				}

				else {
					listeAutoecoles();
				}
			}

			else {
				listeAutoecoles();
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	else {
		header("Location: /RocketSensorMVC/controller/connexion.php");
	}

	function listeAutoecoles() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Une erreur est survenue.";
			}
			elseif ($_GET['action'] == 2) {
				$alerte = "La modification a bien été prise en compte.";
			}
			elseif ($_GET['action'] == 3) {
				$alerte = "L'auto-école a bien été ajoutée.";
			}
			elseif ($_GET['action'] == 4) {
				$alerte = "L'auto-école a bien été supprimée.";
			}
		}

		if ($autoecoles = getAutoecoles()) {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/autoecoles/autoecolesListe.php");
		}

		else {
			$alerte = "Une erreur est survenue";
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/autoecoles/autoecolesListe.php");
		}
	}

	function autoecole() {
		if (isset($_GET['id'])) {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 1) {
					$alerte = "La fiche de l'auto-école a bien été modifiée";
				}
			}

			if ($autoecole = getAutoecole($_GET['id'])) {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/autoecoles/autoecoleInfos.php");
			}

			else {
				header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
		}
	}

	function supprimerAutoecole() {
		if (isset($_GET['id'])) {

			if (deleteAutoecole($_GET['id'])) {
				header("Location: /RocketSensorMVC/controller/autoecoles.php?action=4");
			}

			else {
				header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
		}
	}

	function ajouterAutoecole() {
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/autoecoles/autoecoleAjouter.php");
	}

	function ajouterTraitement() {
		if (addAutoecole(mb_strtoupper($_POST['nom']), mb_strtoupper($_POST['licence']), $_POST['adresse'], $_POST['codepostal'], $_POST['ville'])) {
			header("Location: /RocketSensorMVC/controller/autoecoles.php?action=3");
		}

		else {
			header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
		}
	}

	function modifierAutoecole() {
		if (isset($_GET['id'])) {

			if ($autoecole = getAutoecole($_GET['id'])) {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/autoecoles/autoecoleModifier.php");
			}

			else {
				header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
		}
	}

	function modifierTraitement() {
		
		if (isset($_GET['id'])) {
			if (updateAutoecole($_GET['id'], mb_strtoupper($_POST['nom']), mb_strtoupper($_POST['licence']), $_POST['adresse'], $_POST['codepostal'], $_POST['ville'])) {
				header("Location: /RocketSensorMVC/controller/autoecoles.php?action=2");
			}

			else {
				header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/autoecoles.php?action=1");
		}
	}