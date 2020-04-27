<?php

// Affiche la liste des forfaits
function listForfaits()
{
    $forfaits = getForfaits();
    require('view/forfait/listForfaitsView.php');
}

// Affiche le formulaire de création d'un forfait
function createForfaitForm()
{
	require('view/forfait/createForfaitView.php');
}

// Crée un forfait
function createForfait($description, $prix)
{
    $affectedLines = addForfait($description, $prix);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer le forfait !');
    }
    else {
        header('Location: index.php?entity=forfait&action=listForfaits');
    }
}

// Affiche le formulaire de mise à jour d'un forfait
function updateForfaitForm($id)
{
	$forfait = getForfait($id);
	require('view/forfait/updateForfaitView.php');
}

// Mise à jour d'un forfait
function updateForfait($description, $prix, $id)
{
    $affectedLines = changeForfait($description, $prix, $id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le forfait !');
    }
    else {
        header('Location: index.php?entity=forfait&action=listForfaits');
    }
}

// Suppression d'un forfait
function deleteForfait($id)
{
    $affectedLines = eraseForfait($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le forfait !');
    }
    else {
        header('Location: index.php?entity=forfait&action=listForfaits');
    }
}

?>