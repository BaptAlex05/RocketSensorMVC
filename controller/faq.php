<?php

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/faqModel.php");

	function faq() {
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "question") {
				poserQuestion();
			}

			elseif ($_GET['page'] == "questionTraitement") {
				questionTraitement();
			}

			elseif ($_GET['page'] == "admin") {
				faqAdmin();
			}

			elseif ($_GET['page'] == "reponse") {
				posterReponse();
			}

			elseif ($_GET['page'] == "reponseTraitement") {
				reponseTraitement();
			}

			elseif ($_GET['page'] == "supprimer") {
				supprimerTraitement();
			}

			elseif ($_GET['page'] == "modifier") {
				modifierQuestionReponse();
			}

			elseif ($_GET['page'] == "modifierTraitement") {
				modifierTraitement();
			}

			else {
				faqListe();
			}
		}

		else {
			faqListe();
		}
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

		$questions = getPublicQuestions();

		if (isset($_SESSION['id'])) {
			if ($_SESSION['role'] == "Élève" || $_SESSION['role'] == "Moniteur") {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqPublicEleveMoniteur.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqPublicAdmin.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqPublic.php");
		}
	}

	function poserQuestion() {
		if (isset($_SESSION['id'])) {
			if ($_SESSION['role'] != "Administrateur") {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqQuestion.php");
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=faq");
			}

		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=connexion");
		}
	}

	function questionTraitement() {
		if (ajouterQuestion($_POST['question'])) {
			header("Location: /RocketSensorMVC/index.php?section=faq&action=2");
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq&action=1");
		}
	}

	function faqAdmin() {
		if (isset($_SESSION['id']) && $_SESSION['role'] == "Administrateur") {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 1) {
					$alerte = "Une erreur est survenue. Merci de réessayer.";
				}

				elseif ($_GET['action'] == 2) {
					$alerte = "La réponse a bien été publiée.";
				}

				elseif ($_GET['action'] == 3) {
					$alerte = "La question a bien été supprimée.";
				}
			}

			if ($questions = getQuestionsAdmin()) {
				if ($questions->rowCount() == 0) {
					$message = "Il n'y a aucune question en attente.";
				}

				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqAdmin.php");
			}

			else {	
				$alerte = "Une erreur est survenue.";			
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqAdmin.php");	
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq");
		}
	}

	function posterReponse() {
		if ($_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if ($question = getQuestion($_GET['id'])) {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqReponse.php");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq");
		}
	}

	function reponseTraitement() {
		if ($_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if (ajouterReponse($_POST['question'], $_POST['reponse'], $_GET['id'])) {
					header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=2");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
		}
	}

	function supprimerTraitement() {
		if ($_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if (supprimerQuestion($_GET['id'])) {
					header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=3");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq");
		}
	}

	function modifierQuestionReponse() {
		if ($_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if ($resultat = getQuestionReponse($_GET['id'])) {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/faq/faqModifier.php");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=faq&page=admin&action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq");
		}
	}

	function modifierTraitement() {
		if ($_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if (modifierFaq($_POST['question'], $_POST['reponse'], $_GET['id'])) {
					header("Location: /RocketSensorMVC/index.php?section=faq&action=4");
				}

				else {
					header("Location: /RocketSensorMVC/index.php?section=faq&action=1");
				}
			}

			else {
				header("Location: /RocketSensorMVC/index.php?section=faq&action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php?section=faq");
		}
	}

	