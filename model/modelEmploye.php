<?php

// Récupère tous les employés
function getEmployes()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM employe');
    return $req;
}

// Récupère un employé par son id
function getEmploye($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM employe WHERE idemploye = ?');
	$req->execute(array($id));
	$employe = $req->fetch();
    return $employe;
}

// Ajoute un nouvel employé à la bdd
function addEmploye($nom, $prenom)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO employe(nom, prenom) VALUES (?, ?)');
    $affectedLines = $req->execute(array($nom, $prenom));
    return $affectedLines;
}

// Modifie les informations d'un employé
function changeEmploye($nom, $prenom, $id)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE employe SET nom = ?, prenom = ? WHERE idemploye = ?');
    $affectedLines = $req->execute(array($nom, $prenom, $id));
    return $affectedLines;
}

// Supprime un employé
function eraseEmploye($id)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM employe WHERE idemploye = ?');
	$affectedLines = $req->execute(array($id));
	return $affectedLines;
}

?>