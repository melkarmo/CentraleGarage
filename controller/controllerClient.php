<?php

// Affiche la liste des clients
function listClients()
{
    $clients = getClients();
    require('view/client/listClientsView.php');
}

// Affiche le formulaire de création d'un client
function createClientForm()
{
    $communes = getCommunes();
    $employes = getEmployes();
	require('view/client/createClientView.php');
}

// Création d'un client
function createClient($nom, $prenom, $commune, $responsable)
{
    $affectedLines = addClient($nom, $prenom, $commune, $responsable);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer le client !');
    }
    else {
        header('Location: index.php?entity=client&action=listClients');
    }
}

// Affichage du formulaire de mise à jour d'un client
function updateClientForm($id)
{
    $communes = getCommunes();
    $employes = getEmployes();
	$client = getClient($id);
	require('view/client/updateClientView.php');
}

// Mise à jour d'un client
function updateClient($nom, $prenom, $commune, $responsable, $id)
{
    $affectedLines = changeClient($nom, $prenom, $commune, $responsable, $id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le client !');
    }
    else {
        header('Location: index.php?entity=client&action=listClients');
    }
}

// Suppression d'un client
function deleteClient($id)
{
    $affectedLines = eraseClient($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le client !');
    }
    else {
        header('Location: index.php?entity=client&action=listClients');
    }
}

?>