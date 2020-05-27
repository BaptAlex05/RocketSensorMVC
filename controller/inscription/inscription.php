<?php

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/inscriptionModel.php");

	if (isset($_GET['page']) && $_GET['page'] == "traitement") {
		formTraitement();
	}

	else {
		getInscriptionForm();
	}

	function getInscriptionForm() { 
	
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionFormAlerte_1.php");
			}

			elseif ($_GET['action'] == 2) {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionFormAlerte_2.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionForm.php");	
		}	
	}

	function formTraitement() {
		$nom = strtoupper(htmlspecialchars($_POST['nom']));
		$prenom = htmlspecialchars($_POST['prenom']);
		$datenaissance = htmlspecialchars($_POST["datenaissance"]);
		$mail = htmlspecialchars($_POST['mail']);
		$motdepasse = htmlspecialchars($_POST['motdepasse']);
		$motdepasse_bis = htmlspecialchars($_POST['motdepasse_bis']);
		$autoecole = htmlspecialchars($_POST['autoecole']);

		if ($motdepasse == $motdepasse_bis) {
			$motdepasse_hash = password_hash($motdepasse,PASSWORD_DEFAULT);
		}

		else {
			header("Location: /RocketSensorMVC/controller/inscription/inscription.php?action=2");
		}

		if (checkEmail($mail)) {
			header("Location: /RocketSensorMVC/controller/inscription/inscription.php?action=1");
		}

		$cle = md5(microtime(TRUE)*100000);

		addUser($nom, $prenom, $mail, $datenaissance, $motdepasse_hash, $autoecole, $cle);

		sendConfirmationEmail($mail, $cle);

		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/inscription/inscriptionConfirmation.php");
	}

	function sendConfirmationEmail($mail, $cle) {
		$subject = "Rocket Sensor - Activation de votre compte" ;
		$body = "Bienvenue sur Rocket Sensor,
 
		Pour activer votre compte, veuillez entrer le lien ci-dessous dans votre navigateur.
 
	    localhost/Rocket-Sensor/inscription_activation.php?&mail='.urlencode($mail).'&cle='.urlencode($cle).'

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