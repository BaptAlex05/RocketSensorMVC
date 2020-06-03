<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/utilisateursModel.php");

	if (isset($_SESSION['id'])) {
		if (isset($_GET['page'])) {
			if ($_GET['page'] =="profil") {
				profil();
			}

			elseif ($_GET['page'] == "modifier") {
				profilModifier();
			}

			elseif ($_GET['page'] == "traitement") {
				profilModifierTraitement();
			}

			elseif ($_GET['page'] == "utilisateur") {
				utilisateurProfil();
			}

			elseif ($_GET['page'] == "utilisateurModifier") {
				utilisateurModifierProfil();
			}

			elseif ($_GET['page'] == "utilisateurModifierTraitement") {
				utilisateurModifierTraitement();
			}

			elseif ($_GET['page'] == "utilisateurSupprimer") {
				utilisateurSupprimer();
			}

			elseif ($_GET['page'] == "bannir") {
				utilisateurBannir();
			}

			elseif ($_GET['page'] == "debannir") {
				utilisateurDebannir();
			}

			else {
				utilisateursListe();
			}
		}

		else {
			utilisateursListe();
		}
	}

	else {
		header("Location: /RocketSensorMVC/controller/connexion.php");
	}

	function profil() {
		$utilisateur = getUserProfil($_SESSION['id']);

		if ($_SESSION['role'] == 'Élève' || $_SESSION['role'] == 'Moniteur') {
			if ($utilisateur['id_autoecole'] == 0) {
				$autoecole = "-";
			}

			else {
				$autoecole = getAutoecole($utilisateur['id_autoecole'])['nom']." - ".getAutoecole($utilisateur['id_autoecole'])['ville'];
			}
	
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
			$autoecoles = getAutoecoles();
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilModifierEleveMoniteur.php");
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/profilModifierTemplate.php");
		}		
	}

	function profilModifierTraitement() {
		if ($_POST['autoecole'] == "-") {
			$autoecole = 0;
		}

		else {
			$autoecole = $_POST['autoecole'];
		}
		updateSelfUser($_SESSION['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['datenaissance'], $autoecole);
		$_SESSION['mail'] = $_POST['mail'];
		$_SESSION['prenom'] = $_POST['prenom'];
		$_SESSION['nom'] = $_POST['nom'];

		header("Location: /RocketSensorMVC/controller/utilisateurs.php?page=profil&action=1");

	}

	function utilisateursListe() {
		if ($_SESSION['role'] == "Moniteur" || $_SESSION['role'] =="Administrateur") {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 1) {
					$alerte = "Une erreur est survenue.";
				}

				elseif ($_GET['action'] == 2) {
					$alerte = "L'utilisateur a bien été supprimé.";
				}
			}

			if ($utilisateurs = getUsers()) {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/utilisateursListe.php");
			}

			else {
				header("Location: /RocketSensorMVC/index.php");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/utilisateurs.php?page=profil");
		}
	}

	function utilisateurProfil() {
		if ($_SESSION['role'] == "Moniteur" || $_SESSION['role'] =="Administrateur") {
			if (isset($_GET['id'])) {
				if ($_GET['id'] == $_SESSION['id']) {
					header("Location: /RocketSensorMVC/controller/utilisateurs.php?page=profil");
				}

				else {

					if (isset($_GET['action'])) {
						if ($_GET['action'] == 1) {
							$alerte = "Le profil a bien été modifié.";
						}

						elseif ($_GET['action'] == 2) {
							$alerte = "L'utilisateur a bien été banni.";
						}

						elseif ($_GET['action'] == 3) {
							$alerte = "Une erreur est survenue. Veuillez réessayer.";
						}

						elseif ($_GET['action'] == 4) {
							$alerte = "L'utilisateur a bien été débanni.";
						}
					}

					if ($utilisateur = getUserProfil($_GET['id'])) {

						if ($_SESSION['role'] == "Administrateur") {
							if ($utilisateur['actif'] == 1) {
								$bouton_bannir = true;
							}

							elseif ($utilisateur['actif'] == 2) {
								$bouton_debannir = true;
							}

							$boutons_modifier_supprimer = true;
						}

						if ($utilisateur['role'] == "Élève" || $utilisateur['role'] == "Moniteur") {

							if ($utilisateur['id_autoecole'] == 0) {
								$autoecole = "-";
							}

							else {
								$autoecole = getAutoecole($utilisateur['id_autoecole'])['nom']." - ".getAutoecole($utilisateur['id_autoecole'])['ville'];
							}

							if ($utilisateur['role'] == "Élève") {
								$bouton_resultats = true;
							}


							require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/utilisateurProfilEleveMoniteur.php");
						}

						else {
							require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/utilisateurProfilTemplate.php");
						}
					}

					else {
						header("Location: /RocketSensorMVC/index.php");
					}
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	function utilisateurModifierProfil() {
		if ($_SESSION['role'] =="Administrateur") {
			if (isset($_GET['id'])) {
				if ($_GET['id'] == $_SESSION['id']) {
					header("Location: /RocketSensorMVC/controller/utilisateurs.php?page=profil");
				}

				else {

					if ($utilisateur = getUserModifierProfil($_GET['id'])) {

						if ($utilisateur['role'] == "Élève" || $utilisateur['role'] == "Moniteur") {

							if ($autoecoles = getAutoecoles()) {
								require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/utilisateurProfilModifierEleveMoniteur.php");
							}

						}

						else {
							require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/utilisateurs/utilisateurProfilModifierTemplate.php");
						}
					}

					else {
						header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
					}
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	function utilisateurModifierTraitement() {
		if ($_POST['autoecole'] == "-" || $_POST['role'] == "Administrateur") {
			$autoecole = 0;
		}

		else {
			$autoecole = $_POST['autoecole'];
		}

		if (isset($_GET['id'])) {
			if (updateUser($_GET['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['datenaissance'], $_POST['role'], $autoecole)) {
				header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=1');
			}

			else {
				header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=3');
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
		}
	}

	function utilisateurSupprimer() {
		if ($_SESSION['role'] == "Administrateur") {
			if (isset($_GET['id'])) {
				if (supprimerUser($_GET['id'])) {
					header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=2");
				}

				else {
					header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=3');
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	function utilisateurBannir() {
		if ($_SESSION['role'] =="Administrateur") {
			if (isset($_GET['id'])) {
				if (setActif($_GET['id'], 2)) {
					header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=2');
				}

				else {
					header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=3');
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}

	function utilisateurDebannir() {
		if ($_SESSION['role'] =="Administrateur") {
			if (isset($_GET['id'])) {
				if (setActif($_GET['id'], 1)) {
					header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=4');
				}

				else {
					header('Location: /RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id='.$_GET['id'].'&action=3');
				}
			}

			else {
				header("Location: /RocketSensorMVC/controller/utilisateurs.php?action=1");
			}
		}

		else {
			header("Location: /RocketSensorMVC/index.php");
		}
	}