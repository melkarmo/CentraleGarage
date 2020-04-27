<?php

// Afficher la liste des communes
function listCommunes()
{
    $communes = getCommunes();
    require('view/commune/listCommunesView.php');
}

// Affichage du formulaire de création d'une commune
function createCommuneForm()
{
	require('view/commune/createCommuneView.php');
}

// Création d'une commune
function createCommune($nom)
{
    $affectedLines = addCommune($nom);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer la commune !');
    }
    else {
        header('Location: index.php?entity=commune&action=listCommunes');
    }
}

// Affichage du formulaire de mise à jour d'une commune
function updateCommuneForm($id)
{
	$commune = getCommune($id);
	require('view/commune/updateCommuneView.php');
}

// Mise à jour d'une commune
function updateCommune($nom, $id)
{
    $affectedLines = changeCommune($nom, $id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier la commune !');
    }
    else {
        header('Location: index.php?entity=commune&action=listCommunes');
    }
}

// Suppresion d'une commune
function deleteCommune($id)
{
    $affectedLines = eraseCommune($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer la commune !');
    }
    else {
        header('Location: index.php?entity=commune&action=listCommunes');
    }
}

?>