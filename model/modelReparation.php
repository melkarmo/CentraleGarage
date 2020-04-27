<?php

// Récupère toutes les réparations de la bdd
function getReparations()
{
    $db = dbConnect();
    $req = $db->query('SELECT r.idreparation AS idreparation, r.description AS description, r.prix AS prix, 
    r.technicien AS technicien, r.voiture AS voiture, e.nom AS nomtechnicien, e.prenom AS prenomtechnicien, 
    v.immatriculation AS immatriculation, v.marque AS marque, v.type AS type, v.annee AS annee
    FROM reparation r INNER JOIN employe e ON r.technicien = e.idemploye 
    INNER JOIN voiture v ON r.voiture = v.idvoiture');
    return $req;
}

// Récupère les réparations d'un client par son id
function getReparationsByClient($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT r.idreparation AS idreparation, r.description AS description, r.prix AS prix, 
    r.technicien AS technicien, r.voiture AS voiture, e.nom AS nomtechnicien, e.prenom AS prenomtechnicien, 
    v.immatriculation AS immatriculation, v.marque AS marque, v.type AS type, v.annee AS annee
    FROM reparation r INNER JOIN employe e ON r.technicien = e.idemploye 
    INNER JOIN voiture v ON r.voiture = v.idvoiture WHERE v.proprietaire = ?');
    $req->execute(array($id));
    return $req;
}

// Récupère les réparations d'un technicien par son id
function getReparationsByTechnicien($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT r.idreparation AS idreparation, r.description AS description, r.prix AS prix, 
    r.technicien AS technicien, r.voiture AS voiture, e.nom AS nomtechnicien, e.prenom AS prenomtechnicien, 
    v.immatriculation AS immatriculation, v.marque AS marque, v.type AS type, v.annee AS annee
    FROM reparation r INNER JOIN employe e ON r.technicien = e.idemploye 
    INNER JOIN voiture v ON r.voiture = v.idvoiture WHERE e.idemploye = ?');
    $req->execute(array($id));
    return $req;
}

// Récupère une réparation par son id
function getReparation($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM reparation WHERE idreparation = ?');
	$req->execute(array($id));
	$reparation = $req->fetch();
    return $reparation;
}

// Ajouter une réparation
function addReparation($description, $prix, $technicien, $voiture)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO reparation(description, prix, technicien, voiture) VALUES (?, ?, ?, ?)');
    $affectedLines = $req->execute(array($description, $prix, $technicien, $voiture));
    return $affectedLines;
}

// Modifier une réparation
function changeReparation($description, $prix, $technicien, $voiture, $id)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE reparation SET description = ?, prix = ?, technicien = ?, voiture = ? WHERE idreparation = ?');
    $affectedLines = $req->execute(array($description, $prix, $technicien, $voiture, $id));
    return $affectedLines;
}

// Supprimer une réparation
function eraseReparation($id)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM reparation WHERE idreparation = ?');
	$affectedLines = $req->execute(array($id));
	return $affectedLines;
}

?>