<?php 

function dbConnect() {
	try {
    	$bdd = new PDO('mysql:host=localhost;dbname=rocketsensor;charset=utf8', 'rocketsensor', 'rocketsensor');
    	return $bdd;
  	}

  	catch(Exception $e) {
      die('Erreur : '.$e->getMessage());
    }
}