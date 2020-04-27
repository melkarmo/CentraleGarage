<?php

// Affiche la liste des réparations
function listReparations()
{
    $reparations = getReparations();
    require('view/reparation/listReparationsView.php');
}

// Affiche du formulaire de création d'une réparation
function createReparationForm()
{
    $forfaits = getForfaits();
    $employes = getEmployes();
    $voitures = getVoitures();
	require('view/reparation/createReparationView.php');
}

// Crée une réparation
function createReparation($description, $prix, $technicien, $voiture)
{
    $affectedLines = addReparation($description, $prix, $technicien, $voiture);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer la reparation !');
    }
    else {
        header('Location: index.php?entity=reparation&action=listReparations');
    }
}

// Crée une réparation forfaitaire
function createReparationByForfait($forfait, $technicien, $voiture)
{
    $response = getForfait($forfait);
    createReparation($response['description'], $response['prix'], $technicien, $voiture);
}

// Affiche le formulaire de mise à jour d'une réparation
function updateReparationForm($id)
{
    $forfaits = getForfaits();
    $employes = getEmployes();
    $voitures = getVoitures();
	$reparation = getReparation($id);
	require('view/reparation/updateReparationView.php');
}

// Mise à jour d'un réparation
function updateReparation($description, $prix, $technicien, $voiture, $id)
{
    $affectedLines = changeReparation($description, $prix, $technicien, $voiture, $id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier la reparation !');
    }
    else {
        header('Location: index.php?entity=reparation&action=listReparations');
    }
}
// Mise à jour d'un réparation par forfait
function updateReparationByForfait($forfait, $technicien, $voiture, $id)
{
    $response = getForfait($forfait);
    updateReparation($response['description'], $response['prix'], $technicien, $voiture, $id);
}

// Supprime une réparation
function deleteReparation($id)
{
    $affectedLines = eraseReparation($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le client !');
    }
    else {
        header('Location: index.php?entity=reparation&action=listReparations');
    }
}

?>