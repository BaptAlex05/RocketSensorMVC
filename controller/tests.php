<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/testsModel.php");

	if (isset($_GET['page'])) {
		if ($_GET['page'] == "test") {
			test();
		}

		elseif ($_GET['page'] == "eleve") {
			listeTests();
		}

		elseif ($_GET['page'] == "admin") {
			listeTestsAdmin();
		}

		elseif ($_GET['page'] == "ajouter") {
			testAjouter();
		}

		elseif ($_GET['page'] == "ajouterTraitement") { 
			testAjouterTraitement();
		}

		elseif ($_GET['page'] == "modifier") {
			testModifier();
		}

		elseif ($_GET['page'] == "modifierTraitement") {
			testModifierTraitement();
		}

		elseif ($_GET['page'] == "supprimer") {
			testSupprimer();
		}

		elseif ($_GET['page'] == "supprimerTraitement") { 
			testSupprimerTraitement();
		}

		elseif ($_GET['page'] == "score") {
			testScore();
		}

		else {
			listeTests();
		}
	}

	else {
		listeTests();
	}


	function listeTests(){
		$tests = getTests($_SESSION['id']);

		if ($_SESSION['role'] == "Élève") {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 1) {
					$alerte = "Une erreur est survenue. Veuillez réessayer.";
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
				}

				else {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
				}
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
			}
		}
		elseif ($_SESSION['role'] == "Administrateur") {
		 	header("Location: /RocketSensorMVC/controller/tests.php?page=admin");
		} 
		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	function listeTestsAdmin() {
		if ($_SESSION['role'] == "Administrateur") {

			$tests = getTestsAdmin();

			//Messages de confirmation après ajout, edition, suppression d'un test
			if (isset($_GET['action'])) {

			    if ($_GET['action'] == 1) {
			     	$alerte = "Le test a bien été ajouté !" ;
			     	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
			    }
				elseif ($_GET['action'] == 2) {
			        $alerte = "Le test a bien été édité !" ;
			        require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
			    }
			    elseif ($_GET['action'] == 3) {
			        $alerte= "Une erreure s'est produite. Veuillez réessayer." ;
			        require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
			    }
			    elseif ($_GET['action'] == 4) {
			        $alerte = "Le test a bien été supprimé !" ;
			        require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
			    }
			    else {
			    	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
			    }
			}

			else {
			   	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php");
		}
	}

	function test() {
		if (isset($_GET['id'])) {
			$test = getTest($_GET['id']);
			
			if ($_SESSION['role'] == 'Élève') {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testDescriptionEleve.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testDescriptionTemplate.php");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php?action=1");
		}

		//EVENTUELLEMENT VERIFIER QUE LE TEST EXISTE BIEN DANS LA BDD
	}

	function testAjouter(){
		if ($_SESSION['role'] == "Administrateur") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testAjouter.php");
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php");
		}
	}

	function testAjouterTraitement() {
		ajouterTest($_POST['nom'], $_POST['description'], $_POST['capteur'], $_POST['duree'], $_POST['deroulement']);

		header("Location: /RocketSensorMVC/controller/tests.php?page=admin&action=1");
	}

	function testModifier(){
		if ($_SESSION['role'] == "Administrateur") {
			$tests = getTestsNoms();
			if (isset($_POST['id'])) {
				$test = getTest($_POST['id']);
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testModifierForm.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testModifierTemplate.php");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php");
		}
	}

	function testModifierTraitement() {
		if (isset($_GET['id'])) {
			modifierTest($_POST['nom'], $_POST['description'], $_POST['capteur'], $_POST['duree'], $_POST['deroulement'], $_GET['id']);
			header("Location: /RocketSensorMVC/controller/tests.php?page=admin&action=2");
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php?page=admin&action=3");
		}

	}

	function testSupprimer() {
		if ($_SESSION['role'] == "Administrateur") {
			$tests = getTestsNoms() ;
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testSupprimer.php");
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php");
		}
	}

	function testSupprimerTraitement() {
		supprimerTest($_POST['nom']);

		header("Location: /RocketSensorMVC/controller/tests.php?page=admin&action=4");
	}

	function testScore() {
		$score = rand (0 , 100);
		if (isset($_GET['id'])) {
			if (testInsererScore($_SESSION['id'], $_GET['id'], $score)) {
				if ($test = getTest($_GET['id'])) {
					require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testScore.php");
				}
				
				else {
					header("Location: /RocketSensorMVC/controller/tests.php?action=3");
				}
			}
			else {
				header("Location: /RocketSensorMVC/controller/tests.php?action=3");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php?action=3");
		}
	}

	function resultatsTests() {
		$tests = getTestsNoms();
		if (isset($_POST['id'])) {
			$test = getTest($_POST['id']);
			affichageResultatsTests($_POST['id'], $id_utilisateur)
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/resultats.php");
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/resultatsTemplate.php");
		}
		}
	}