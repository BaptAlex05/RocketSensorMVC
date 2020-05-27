<?php 
	require("dbConnect.php");

	function checkEmail($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$resultat = $req->fetch();

		if ($resultat) {
			return true;
		}

		else {
			return false;
		}
		$req->closeCursor();

	}

	function addUser($nom, $prenom, $mail, $datenaissance, $motdepasse, $autoecole, $cle) {
		$bdd = dbConnect();
		$req = $bdd->prepare("INSERT INTO utilisateurs(nom, prenom, mail, datenaissance, motdepasse, id_autoecole, cle) VALUES (:nom, :prenom, :mail, :datenaissance, :motdepasse, :id_autoecole, :cle)");
		$req->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'mail' => $mail,
			'datenaissance' => $datenaissance,
			'motdepasse' => $motdepasse,
			'id_autoecole' => $autoecole,
			'cle' => $cle));
		$req->closeCursor();
	}