<?php 
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/connexionModel.php");

	if (!isset($_SESSION['id'])) {
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "traitement") {
				connexionFormTraitement();
			}

			elseif ($_GET['page'] == "motdepasseoublie") {
				motDePasseOublie();
			}

			elseif ($_GET['page'] == "motDePasseOublieTraitement") {
				motDePasseOublieTraitement();
			}

			elseif ($_GET['page'] == "nouveaumotdepasse") {
				nouveauMotDePasse();
			}

			elseif ($_GET['page'] == "nouveauMotDePasseTraitement") {
				nouveauMotDePasseTraitement();
			}

			else {
				connexionForm();
			}
		}

		else {
			connexionForm();
		}
	}

	else {

		if (isset($_GET['page']) && $_GET['page'] == "deconnexion") {
				deconnexion();
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	function connexionForm() {
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

			elseif ($_GET['action'] == 6) {
				$alerte = "Votre mot de passe a bien été mis à jour. Vous pouvez à présent vous connecter.";
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
			        $_SESSION['mail'] = htmlspecialchars($utilisateur['mail']);
			        $_SESSION['prenom'] = htmlspecialchars($utilisateur['prenom']);
			        $_SESSION['nom'] = htmlspecialchars($utilisateur['nom']);
			        $_SESSION['role'] = htmlspecialchars($utilisateur['role']);

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
		$_SESSION = array();
		session_destroy();

		header("Location: /RocketSensorMVC/index.php");
	}

	function motDePasseOublie() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Il semblerait qu'aucun utilisateur ne soit enregistré avec cette adresse mail. Merci de saisir une adresse mail valide.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/motDePasseOublieForm.php");
			}

			elseif ($_GET['action'] == 2) {
				$alerte = "Une erreur est survenue.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/motDePasseOublieForm.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/motDePasseOublieForm.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/motDePasseOublieForm.php");
		}
	}

	function motDePasseOublieTraitement() {
		$mail = htmlspecialchars($_POST['mail']);

		if (checkEmail($mail) && $cle = getUserCle($mail)) {
			$objet = "Rocket Sensor - Réinitialisation de votrre de mot de passe";
			$corps = "Vous avez fait une demande de réinitialisation de votre mot de passe.

			Pour ce faire, veuillez sasir cet URL dans votre navigateur : 

			localhost/RocketSensorMVC/controller/connexion.php?page=nouveaumotdepasse&mail=".urlencode($mail)."&cle=".urlencode($cle['cle'])."

			---------------------
			Ceci est un mail automatique. Merci de ne pas y répondre.";


			$url = 'https://rocket-sensor.bubbleapps.io/api/1.1/wf/send-mail';
			$data = array('subject' => $objet, 'to' => $mail,'body' => $corps);

			$options = array(
	    	'http' => array(
	        'header'  => "Content-type:application/x-www-form-urlencoded\r\nAuthorization: Bearer ec1e7cad1870c2d47f908dceae70cb4b\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data)
	    	)
			);
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);

			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/motDePasseOublieTraitementConfirmation.php");

		}

		else {
			header("Location: /RocketSensorMVC/controller/connexion.php?page=motdepasseoublie&action=1");
		}
	}

	function nouveauMotDePasse() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Les deux mots de passe saisis ne semblent pas correspondre. Veuillez réessayer.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/nouveauMotDePasseForm.php");
			}
		}

		if (isset($_GET['mail'], $_GET['cle'])) {
			if ($cle = getUserCle($_GET['mail'])) {
				if (htmlspecialchars($cle['cle']) == $_GET['cle']) {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/nouveauMotDePasseForm.php");
				}

				else {
					header("Location: /RocketSensorMVC/controller/connexion.php?page=motdepasseoublie&action=2");
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/connexion.php?page=motdepasseoublie&action=2");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/connexion.php?page=motdepasseoublie&action=2");
		}
	}
	
	function nouveauMotDePasseTraitement() {
		if (isset($_GET['mail'])) {
			if ($_POST['motdepasse'] == $_POST['motdepasse_bis']) {
				$motdepasse_hash = password_hash($_POST['motdepasse'],PASSWORD_DEFAULT);
				if (setPassword($_POST['mail'], $motdepasse_hash)) {
					header("Location: /RocketSensorMVC/controller/connexion.php?action=6");
				}

				else {
					header("Location: /RocketSensorMVC/controller/connexion.php?page=motDePasseOublie&action=2");
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/connexion.php?page=nouveauMotDePasse&action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/connexion.php?page=motDePasseOublie&action=2");
		}
	}