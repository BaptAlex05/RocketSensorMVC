<?php 

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/contactModel.php");

	function contact() {
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "traitement") {
				contactTraitement();
			}

			elseif ($_GET['page'] == "admin") {
				messagerieAdmin();
			}

			elseif ($_GET['page'] == "reponse") {
				envoyerReponse();
			}

			elseif ($_GET['page'] == "reponseTraitement") {
				reponseTraitement();
			}

			elseif ($_GET['page'] == "supprimer") {
				supprimerMessage();
			}

			else {
				contactForm();
			}
					
		}

		else {
			contactForm();

		}
	}

	function contactForm() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Votre message a bien été envoyé. Il sera traité dans les plus brefs délais.";
			}

			elseif ($_GET['action'] == 2) {
				$alerte = "Une erreur est survenue. Veuillez réessayer utérieurement.";
			}
		}

		if (isset($_SESSION['id'])) {
			$nom = $_SESSION['nom'];
			$prenom = $_SESSION['prenom'];
			$mail = $_SESSION['mail'];

			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/contact/contactForm.php");
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/contact/contactForm.php");
		}
	}

	function contactTraitement() {
		if (ajouterMessage(strtoupper($_POST['nom']), $_POST['prenom'], $_POST['mail'], $_POST['message'])) {
			header("Location: /RocketSensorMVC/index.php?section=contact&action=1");
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=contact&action=2");
		}
	}

	function messagerieAdmin() {
		if (isset($_SESSION['id']) && $_SESSION['role'] == "Administrateur") {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 1) {
					$alerte = "La réponse a bien été envoyée.";
				}

				elseif ($_GET['action'] == 2) {
					$alerte = "Une erreur est survenue.";
				}

				elseif ($_GET['action'] == 3) {
					$alerte = "Le message a bien été supprimé.";
				}
			}

			if ($messages = getMessages()) {
				if ($messages->rowCount() == 0) {
					$message = "Il n'y a aucun message en attente.";
				}

				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/contact/contactAdmin.php");
			}

			else {	
				$alerte = "Une erreur est survenue.";			
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/contact/contactAdmin.php");	
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=contact");
		}
	}

	function envoyerReponse() {
		if (isset($_SESSION['id']) && $_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if ($message = getMessage($_GET['id'])) {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/contact/contactReponse.php");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
			}
		}
		
		else {
			header("Location: /RocketSensorMVC/index.php?section=contact");
		}
	}

	function reponseTraitement() {
		if (isset($_SESSION['id']) && $_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if (isset($_POST['mail'], $_POST['message'], $_POST['reponse'])) {
					$mail = $_POST['mail'];
					$message = $_POST['message'];
					$reponse = $_POST['reponse'];
					$objet = "Rocket Sensor - Réponse à votre message";

					$contenu = "Votre message : \n\n $message \n\n Notre réponse : \n\n $reponse";

					$url = 'https://rocket-sensor.bubbleapps.io/api/1.1/wf/send-mail';
					$data = array('subject' => $objet, 'to' =>$mail,'body' =>  $contenu);
					$options = array(
			    	'http' => array(
			        'header'  => "Content-type:application/x-www-form-urlencoded\r\nAuthorization: Bearer ec1e7cad1870c2d47f908dceae70cb4b\r\n",
			        'method'  => 'POST',
			        'content' => http_build_query($data)
			    	)
					);
					$context  = stream_context_create($options);
					$result = file_get_contents($url, false, $context);

					if (supprimerContact($_GET['id'])) {
						header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=1");
					}

					else {
						header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
					}

				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
			}
			
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=contact");
		}		
	}

	function supprimerMessage() {
		if (isset($_SESSION['id']) && $_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if (supprimerContact($_GET['id'])) {
					header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=3");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=contact&page=admin&action=2");
			}
		}
		
		else {
			header("Location: /RocketSensorMVC/index.php?section=contact");
		}
	}