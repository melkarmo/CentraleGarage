<?php

// Routeur spécifique à la page de gestion de l'entité Employe

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listEmployes') {
		listEmployes();
	}
	elseif ($_GET['action'] == 'createEmployeForm') {
		createEmployeForm();
	}
	elseif ($_GET['action'] == 'createEmploye') {
		if (!empty($_POST['nom']) && !empty($_POST['prenom'])) {
			createEmploye($_POST['nom'], $_POST['prenom']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'updateEmployeForm') {
		if (!empty($_GET['id'])) {
			updateEmployeForm((int) $_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant d\'employe envoyé';
		}
	}
	elseif ($_GET['action'] == 'updateEmploye') {
		if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['idemploye'])) {
			updateEmploye($_POST['nom'], $_POST['prenom'], (int) $_POST['idemploye']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'deleteEmploye') {
		if (!empty($_GET['id'])) {
			deleteEmploye($_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant d\'employe envoyé';
		}
	}
}
else {
	listEmployes();
}

?>