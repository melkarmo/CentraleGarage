<?php

/* Modèle regroupant les modèles spécifiques aux entités */

require('modelCommune.php');
require('modelEmploye.php');
require('modelClient.php');
require('modelVoiture.php');
require('modelReparation.php');
require('modelForfait.php');

// Fonction de connection à la base de données
function dbConnect()
{
	$db = new PDO('mysql:host=localhost;dbname=ecl_garage;charset=utf8', 'username', 'password');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $db;
}

?>
