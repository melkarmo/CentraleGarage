<?php

// Fonction récupérant toutes les communes de la bdd
function getCommunes()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM commune');
    return $req;
}

// Fonction récupérant une commune par son id
function getCommune($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM commune WHERE idcommune = ?');
	$req->execute(array($id));
	$commune = $req->fetch();
    return $commune;
}

// Fonction d'ajout d'une commune dans la bdd
function addCommune($nom)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO commune(nom) VALUES (?)');
    $affectedLines = $req->execute(array($nom));
    return $affectedLines;
}

// Fonction de modification d'une commune
function changeCommune($nom, $id)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE commune SET nom = ? WHERE idcommune = ?');
    $affectedLines = $req->execute(array($nom, $id));
    return $affectedLines;
}

// Fonction de suppression d'une commune de la bdd
function eraseCommune($id)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM commune WHERE idcommune = ?');
	$affectedLines = $req->execute(array($id));
	return $affectedLines;
}

?>