<?php

// Routeur spécifique à la page de gestion de l'entité Réparation

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listReparations') {
		listReparations();
	}
	elseif ($_GET['action'] == 'createReparationForm') {
		createReparationForm();
	}
	elseif ($_GET['action'] == 'createReparation') {
		if (!empty($_POST['technicien']) && !empty($_POST['voiture'])) {
			if (empty($_POST['choixForfait']) && !empty($_POST['description']) && !empty($_POST['prix'])) {
				createReparation($_POST['description'], (int) $_POST['prix'], (int) $_POST['technicien'], (int) $_POST['voiture']);
			}
			elseif (!empty($_POST['choixForfait']) && !empty($_POST['forfait'])) {
				createReparationByForfait((int) $_POST['forfait'], (int) $_POST['technicien'], (int) $_POST['voiture']);
			}
			else {
				echo 'Erreur : tous les champs ne sont pas remplis !';
			}
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'updateReparationForm') {
		if (!empty($_GET['id'])) {
			updateReparationForm((int) $_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de reparation envoyé';
		}
	}
	elseif ($_GET['action'] == 'updateReparation') {
		if (!empty($_POST['technicien']) && !empty($_POST['voiture']) && !empty($_POST['idreparation'])) {
			if (empty($_POST['choixForfait']) && !empty($_POST['description']) && !empty($_POST['prix'])) {
				updateReparation($_POST['description'], (int) $_POST['prix'], (int) $_POST['technicien'], (int) $_POST['voiture'], (int) $_POST['idreparation']);
			}
			elseif (!empty($_POST['choixForfait']) && !empty($_POST['forfait'])) {
				updateReparationByForfait((int) $_POST['forfait'], (int) $_POST['technicien'], (int) $_POST['voiture'], (int) $_POST['idreparation']);
			}
			else {
				echo 'Erreur : tous les champs ne sont pas remplis !';
			}
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'deleteReparation') {
		if (!empty($_GET['id'])) {
			deleteReparation($_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de reparation envoyé';
		}
	}
}
else {
	listReparations();
}

?>