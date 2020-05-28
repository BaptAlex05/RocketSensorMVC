<?php 
	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/connexionModel.php");

	function getConnexionForm() {
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Mauvais identifiant ou mot de passe ! Veuillez réessayer";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/connexion/connexionForm.php");
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