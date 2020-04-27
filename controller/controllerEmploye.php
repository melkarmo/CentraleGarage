<?php

// Affiche la liste des employés
function listEmployes()
{
    $employes = getEmployes();
    require('view/employe/listEmployesView.php');
}

// Affiche le formulaire de création d'un employé
function createEmployeForm()
{
	require('view/employe/createEmployeView.php');
}

// Crée un employé
function createEmploye($nom, $prenom)
{
    $affectedLines = addEmploye($nom, $prenom);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer l\'employe !');
    }
    else {
        header('Location: index.php?entity=employe&action=listEmployes');
    }
}

// Affiche le formulaire de mise à jour d'un employé
function updateEmployeForm($id)
{
	$employe = getEmploye($id);
	require('view/employe/updateEmployeView.php');
}

// Met à jour un employé
function updateEmploye($nom, $prenom, $id)
{
    $affectedLines = changeEmploye($nom, $prenom, $id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'employe !');
    }
    else {
        header('Location: index.php?entity=employe&action=listEmployes');
    }
}

// Supprimer un employé
function deleteEmploye($id)
{
    $affectedLines = eraseEmploye($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer l\'employe !');
    }
    else {
        header('Location: index.php?entity=employe&action=listEmployes');
    }
}

?>