<?php 

function dbConnect() {
	try {
    	$db = new PDO('mysql:host=localhost;dbname=rocketsensor_mvc;charset=utf8', 'rocketsensor', 'rocketsensor');
    	return $db;
  	}

  	catch(Exception $e) {
      die('Erreur : '.$e->getMessage());
    }
}