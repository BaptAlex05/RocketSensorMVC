<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/inscriptionModel.php");

	if (!isset($_SESSION['id'])) {
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "traitement") {
				inscriptionFormTraitement();
			}

			elseif ($_GET['page'] == "activation") {
				inscriptionActivation();
			}

			else {
				inscriptionForm();
			}
		}

		else {
			inscriptionForm();
		}
	}

	else {
		header("Location: /RocketSensorMVC/index.php");
	}

	function inscriptionForm() { 	
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Il semblerait qu'un utilisateur soit déjà enregistré avec ces informations. Merci de saisir des informations valides.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionForm.php");
			}

			elseif ($_GET['action'] == 2) {
				$alerte = "Les deux mots de passe saisis ne semblent pas correspondre. Merci de réessayer.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionForm.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionForm.php");	
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionForm.php");	
		}	
	}

	function inscriptionFormTraitement() {
		$nom = strtoupper(htmlspecialchars($_POST['nom']));
		$prenom = htmlspecialchars($_POST['prenom']);
		$datenaissance = htmlspecialchars($_POST["datenaissance"]);
		$mail = htmlspecialchars($_POST['mail']);
		$motdepasse = htmlspecialchars($_POST['motdepasse']);
		$motdepasse_bis = htmlspecialchars($_POST['motdepasse_bis']);


		if ($_POST['autoecole'] == "-") {
			$autoecole = NULL;
		}

		if ($motdepasse == $motdepasse_bis) {
			$motdepasse_hash = password_hash($motdepasse,PASSWORD_DEFAULT);
		}

		else {
			header("Location: /RocketSensorMVC/controller/inscription.php?action=2");
		}

		if (checkEmail($mail)) {
			header("Location: /RocketSensorMVC/controller/inscription.php?action=1");
		}

		else {

			$cle = md5(microtime(TRUE)*100000);

			addUser($nom, $prenom, $mail, $datenaissance, $motdepasse_hash, $autoecole, $cle);

			sendConfirmationEmail($mail, $cle);

			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionConfirmation.php");
		}
	}

	function sendConfirmationEmail($mail, $cle) {
		$subject = "Rocket Sensor - Activation de votre compte" ;
		$body = "Bienvenue sur Rocket Sensor,
 
		Pour activer votre compte, veuillez entrer le lien ci-dessous dans votre navigateur.
 
	    localhost/RocketSensorMVC/controller/inscription.php?page=activation&mail=".urlencode($mail)."&cle=".urlencode($cle)."

		---------------
		Ceci est un mail automatique. Merci de ne pas y répondre.";

		$url = 'https://rocket-sensor.bubbleapps.io/api/1.1/wf/send-mail';
		$data = array('subject' => $subject, 'to' => $mail,'body' => $body);

		// use key 'http' even if you send the request to https://...
		$options = array(
	    	'http' => array(
	        'header'  => "Content-type:application/x-www-form-urlencoded\r\nAuthorization: Bearer ec1e7cad1870c2d47f908dceae70cb4b\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data))
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	}

	function inscriptionActivation() {
		if (isset($_GET['mail']) && isset($_GET['cle'])) {
			if (getActif($_GET['mail']) == 1) {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionActif.php");
			}

			else {
				$cle = getCle($_GET['mail']);

				if ($_GET['cle'] == $cle) {
					activateUser($_GET['mail']);
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionActivation.php");
				}

				else {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionActivationErreur.php");
				}
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionActivationErreur.php");
		}
	}