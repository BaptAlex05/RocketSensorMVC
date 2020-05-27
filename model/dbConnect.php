<?php 

function dbConnect() {
	try {
    	$bdd = new PDO('mysql:host=localhost;dbname=rocketsensor_mvc;charset=utf8', 'rocketsensor', 'rocketsensor');
  	}
  	catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
}