<?php

// Récupère tous les forfaits de la bdd
function getForfaits()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM forfait');
    return $req;
}

// Récupère un forfait par son id
function getForfait($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM forfait WHERE idforfait = ?');
	$req->execute(array($id));
	$forfait = $req->fetch();
    return $forfait;
}

// Ajoute un nouveau forfait
function addForfait($description, $prix)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO forfait(description, prix) VALUES (?, ?)');
    $affectedLines = $req->execute(array($description, $prix));
    return $affectedLines;
}

// Modifie un forfait
function changeForfait($description, $prix, $id)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE forfait SET description = ?, prix = ? WHERE idforfait = ?');
    $affectedLines = $req->execute(array($description, $prix, $id));
    return $affectedLines;
}

// Supprime un forfait de la bdd
function eraseForfait($id)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM forfait WHERE idforfait = ?');
	$affectedLines = $req->execute(array($id));
	return $affectedLines;
}

?>