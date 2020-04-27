<?php

// Affichage de la liste des voitures
function listVoitures()
{
    $voitures = getVoitures();
    require('view/voiture/listVoituresView.php');
}

// Affichage du formulaire de création d'un voiture
function createVoitureForm()
{
    $clients = getClients();
	require('view/voiture/createVoitureView.php');
}

// Création d'une voiture
function createVoiture($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire)
{
    $affectedLines = addVoiture($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer la voiture !');
    }
    else {
        header('Location: index.php?entity=voiture&action=listVoitures');
    }
}

// Affichage du formulaire de mise à jour d'une voiture
function updateVoitureForm($id)
{
    $clients = getClients();
	$voiture = getVoiture($id);
	require('view/voiture/updateVoitureView.php');
}

// Mise à jour d'une voiture
function updateVoiture($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire, $id)
{
    $affectedLines = changeVoiture($immatriculation, $marque, $type, $annee, $kilometres, $proprietaire, $id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier la voiture !');
    }
    else {
        header('Location: index.php?entity=voiture&action=listVoitures');
    }
}

// Suppression d'une voiture
function deleteVoiture($id)
{
    $affectedLines = eraseVoiture($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le client !');
    }
    else {
        header('Location: index.php?entity=voiture&action=listVoitures');
    }
}

?>