<?php 
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/connexionModel.php");

	if (!isset($_SESSION['id'])) {
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "traitement") {
				connexionFormTraitement();
			}

			elseif ($_GET['page'] == "deconnexion") {
				deconnexion();
			}

			else {
				getConnexionForm();
			}
		}

		else {
			getConnexionForm();
		}
	}

	else {
		header("Location: /RocketSensorMVC/index.php");
	}

	function getConnexionForm() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Mauvais identifiant ou mot de passe ! Veuillez réessayer";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");
			}

			elseif ($_GET['action'] == 2) {
				$alerte = "Votre compte n'a pas encore été activé. Veuillez verifier vos mails. <br /> Si aucun mail n'a été reçu, vous pouvez contacter l'administrateur via le <a href=\"/RocketSensorMVC/controller/contact.php\">formulaire de contact</a>.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");
			}

			elseif ($_GET['action'] == 3) {
				$alerte = "Votre compte a été banni. Veuillez contacter l'administrateur via le <a href=\"/RocketSensorMVC/controller/contact.php\">formulaire de contact</a> pour en savoir plus.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");
			}

			elseif ($_GET['action'] == 4) {
				$alerte = "Votre mot de passe a été modifié avec succès.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");
			}

			elseif ($_GET['action'] == 5) {
				$alerte = "Une erreur s'est produite. En cas de problème, veuillez contacter l'administrateur via le  <a href=\"/RocketSensorMVC/controller/contact.php\">formulaire de contact</a>.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");	
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");	
		}	
	}

	function connexionFormTraitement() {
		if (getUser($_POST['mail'])) {
			$utilisateur = getUser($_POST['mail']);

			if ($utilisateur['actif'] == 0) {
				header("Location: /RocketSensorMVC/controller/connexion.php?action=2");
			}

			elseif ($utilisateur['actif'] == 2) {
				header("Location: /RocketSensorMVC/controller/connexion.php?action=3");
			}

			else {
				if (password_verify($_POST['motdepasse'], $utilisateur['motdepasse'])) {
					session_start();
					$_SESSION['id'] = $utilisateur['id'];
			        $_SESSION['mail'] = $utilisateur['mail'];
			        $_SESSION['prenom'] = $utilisateur['prenom'];
			        $_SESSION['nom'] = $utilisateur['nom'];
			        $_SESSION['role'] = $utilisateur['role'];

			        header("Location: /RocketSensorMVC/index.php");
				}

				else {
					header("Location: /RocketSensorMVC/controller/connexion.php?action=1");
				}
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/connexion.php?action=1");
		}
	}

	function deconnexion() {
		session_start();
		$_SESSION = array();
		session_destroy();

		header("Location: /RocketSensorMVC/index.php");
	}