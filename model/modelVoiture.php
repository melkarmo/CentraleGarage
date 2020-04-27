<?php

// Récupérer toutes les voitures
function getVoitures()
{
    $db = dbConnect();
    $req = $db->query('SELECT v.idvoiture AS idvoiture, v.immatriculation AS immatriculation, v.marque AS marque, 
                v.type AS type, v.annee AS annee, v.kilometres AS kilometres, v.proprietaire AS proprietaire, 
                c.nom AS nomproprietaire, c.prenom AS prenomproprietaire, v.datearrivee AS datearrivee
                FROM voiture v INNER JOIN client c ON v.proprietaire = c.idclient');
    return $req;
}

// Récupérer une voiture par son id
function getVoiture($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM voiture WHERE idvoiture = ?');
	$req->execute(array($id));
	$voiture = $req->fetch();
    return $voiture;
}

// Récupérer les voitures d'un client
function getVoituresByClient($idClient)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM voiture WHERE proprietaire = ?');
	$req->execute(array($idClient));
	return $req;
}

// Ajoute une voiture
function addVoiture($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO voiture(immatriculation, marque, type, annee, kilometres, proprietaire) VALUES (?, ?, ?, ?, ?, ?)');
    $affectedLines = $req->execute(array($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire));
    return $affectedLines;
}

// Modifie une voiture
function changeVoiture($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire, $id)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE voiture SET immatriculation = ?, marque = ?, type = ?, annee = ?, kilometres = ?, proprietaire = ? WHERE idvoiture = ?');
    $affectedLines = $req->execute(array($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire, $id));
    return $affectedLines;
}

// Supprime une voiture
function eraseVoiture($id)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM voiture WHERE idvoiture = ?');
	$affectedLines = $req->execute(array($id));
	return $affectedLines;
}

?>