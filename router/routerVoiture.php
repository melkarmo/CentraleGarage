<?php

// Routeur spécifique à la page de gestion de l'entité Voiture

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listVoitures') {
		listVoitures();
	}
	elseif ($_GET['action'] == 'createVoitureForm') {
		createVoitureForm();
	}
	elseif ($_GET['action'] == 'createVoiture') {
		if (!empty($_POST['immatriculation']) && !empty($_POST['marque']) && !empty($_POST['type']) && !empty($_POST['annee']) && !empty($_POST['kilometres']) && !empty($_POST['proprietaire'])) {
			createVoiture($_POST['immatriculation'], $_POST['marque'], $_POST['type'], (int) $_POST['annee'], (int) $_POST['kilometres'], (int) $_POST['proprietaire']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'updateVoitureForm') {
		if (!empty($_GET['id'])) {
			updateVoitureForm((int) $_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de voiture envoyé';
		}
	}
	elseif ($_GET['action'] == 'updateVoiture') {
		if (!empty($_POST['immatriculation']) && !empty($_POST['marque']) && !empty($_POST['type']) && !empty($_POST['annee']) && !empty($_POST['kilometres']) && !empty($_POST['proprietaire']) && !empty($_POST['idvoiture'])) {
			updateVoiture($_POST['immatriculation'], $_POST['marque'], $_POST['type'], (int) $_POST['annee'], (int) $_POST['kilometres'], (int) $_POST['proprietaire'], (int) $_POST['idvoiture']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'deleteVoiture') {
		if (!empty($_GET['id'])) {
			deleteVoiture($_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de voiture envoyé';
		}
	}
}
else {
	listVoitures();
}

?>