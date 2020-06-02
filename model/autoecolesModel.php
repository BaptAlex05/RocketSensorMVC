<?php 
	require("dbConnect.php");

	function getAutoecoles() {
		$bdd = dbConnect();
		$autoecoles = $bdd->query('SELECT * FROM autoecoles');

		return $autoecoles;
	}

	function getAutoecole($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT * FROM autoecoles WHERE id = ?');
		$req->execute(array($id));

		$autoecole = $req->fetch();

		return $autoecole;
	}

	function deleteAutoecole($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('DELETE FROM autoecoles WHERE id = :id');
	    $req->execute(array('id' => $id));

	    return $req;
	}

	function addAutoecole($nom, $licence, $adresse, $codepostal, $ville) {
		$bdd = dbConnect();
		$req = $bdd->prepare('INSERT INTO autoecoles(nom, licence, adresse, codepostal, ville) VALUES(:nom, :licence, :adresse, :codepostal, :ville)');
	    $req->execute(array(
	    	'nom' => $nom,
	    	'licence' => $licence,
	    	'adresse' => $adresse,
	    	'codepostal' => $codepostal,
	    	'ville' => $ville
	    	));

	    return $req;
	}

	function updateAutoecole($id, $nom, $licence, $adresse, $codepostal, $ville) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE autoecoles SET nom = :nom, licence = :licence, adresse = :adresse, codepostal = :codepostal, ville = :ville WHERE id = :id');
	    $req->execute(array(
	    	'nom' => $nom,
	    	'licence' => $licence,
	    	'adresse' => $adresse,
	    	'codepostal' => $codepostal,
	    	'ville' => $ville,
	    	'id' => $id
	    	));

	    return $req;
	}