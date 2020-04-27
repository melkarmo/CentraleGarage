<?php

// Fonction récupérant tous les clients
function getClients()
{
    $db = dbConnect();
    $req = $db->query('SELECT c.idclient AS idclient, c.nom AS nom, c.prenom AS prenom, c.commune AS commune,
                    c.responsable AS responsable, com.nom AS nomcommune, e.nom AS nomresponsable, e.prenom AS prenomresponsable 
                    FROM client c INNER JOIN commune com ON c.commune = com.idcommune 
                    INNER JOIN employe e ON c.responsable = e.idemploye');
    return $req;
}

// Fonction récupérant un client par son id
function getClient($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM client WHERE idclient = ?');
	$req->execute(array($id));
	$client = $req->fetch();
    return $client;
}

// Fonction ajoutant un nouveau client à la bdd
function addClient($nom, $prenom, $commune, $responsable)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO client(nom, prenom, commune, responsable) VALUES (?, ?, ?, ?)');
    $affectedLines = $req->execute(array($nom, $prenom, $commune, $responsable));
    return $affectedLines;
}

// Fonction mettant à jour un client
function changeClient($nom, $prenom, $commune, $responsable, $id)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE client SET nom = ?, prenom = ?, commune = ?, responsable = ? WHERE idclient = ?');
    $affectedLines = $req->execute(array($nom, $prenom, $commune, $responsable, $id));
    return $affectedLines;
}

// Fonction de suppression d'un client
function eraseClient($id)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM client WHERE idclient = ?');
	$affectedLines = $req->execute(array($id));
	return $affectedLines;
}

?>