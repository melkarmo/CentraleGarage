<?php

// Routeur spécifique à la page de gestion de l'entité Commune

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listCommunes') {
		listCommunes();
	}
	elseif ($_GET['action'] == 'createCommuneForm') {
		createCommuneForm();
	}
	elseif ($_GET['action'] == 'createCommune') {
		if (!empty($_POST['nom'])) {
			createCommune($_POST['nom']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'updateCommuneForm') {
		if (!empty($_GET['id'])) {
			updateCommuneForm((int) $_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de commune envoyé';
		}
	}
	elseif ($_GET['action'] == 'updateCommune') {
		if (!empty($_POST['nom']) && !empty($_POST['idcommune'])) {
			updateCommune($_POST['nom'], (int) $_POST['idcommune']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'deleteCommune') {
		if (!empty($_GET['id'])) {
			deleteCommune($_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de commune envoyé';
		}
	}
}
else {
	listCommunes();
}

?>