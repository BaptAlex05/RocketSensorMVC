<?php

	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/faqModel.php");

	if (isset($_GET['page'])) {
		if ($_GET['page'] == "question") {
			poserQuestion();
		}

		elseif ($_GET['page'] == "questionTraitement") {
			questionTraitement();
		}

		else {
			faqListe();
		}
	}

	else {
		faqListe();
	}

	function faqListe() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Une erreur est survenue. Merci de réessayer.";
			}

			elseif ($_GET['action'] == 2) {
				$alerte = "Votre question a bien été envoyée. Elle sera traitée prochainement.";
			}

			elseif ($_GET['action'] == 3) {
				$alerte = "La question/réponse a bien été supprimée.";
			}

			elseif ($_GET['action'] == 4) {
				$alerte = "La question/réponse a bien été modifiée.";
			}
		}

		$req = getPublicQuestions();

		if (isset($_SESSION['id'])) {
			if ($_SESSION['role'] == "Élève" || $_SESSION['role'] == "Moniteur") {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqPublicEleveMoniteur.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqPublicAdmin.php");
			}
		}

		else {
			$message = "Pour pouvoir poser une question sur la FAQ, veuillez <a href=\"/RocketSensorMVC/controller/connexion.php\">vous connecter</a>. Pour toute question ou demande personnelle, merci d'utiliser le <a href=\"/rocketSensorMVC/controller/contact.php\">formulaire de contact</a>.";
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqPublicTemplate.php");
		}
	}

	function poserQuestion() {
		if (isset($_SESSION['id'])) {
			if ($_SESSION['role'] != "Administrateur") {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqQuestion.php");
			}

			else {
				header("Location: /RocketSensorMVC/controller/faq.php");
			}

		}

		else {
			header("Location: /RocketSensorMVC/controller/connexion.php");
		}
	}

	function questionTraitement() {
		if (ajouterQuestion($_POST['question'])) {
			header("Location: /RocketSensorMVC/controller/faq.php?action=2");
		}

		else {
			header("Location: /RocketSensorMVC/controller/faq.php?action=1");
		}
	}

	