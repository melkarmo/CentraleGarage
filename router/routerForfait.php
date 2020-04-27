<?php

// Routeur spécifique à la page de gestion de l'entité Forfait

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listForfaits') {
		listForfaits();
	}
	elseif ($_GET['action'] == 'createForfaitForm') {
		createForfaitForm();
	}
	elseif ($_GET['action'] == 'createForfait') {
		if (!empty($_POST['description']) && !empty($_POST['prix'])) {
			createForfait($_POST['description'], (int) $_POST['prix']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'updateForfaitForm') {
		if (!empty($_GET['id'])) {
			updateForfaitForm((int) $_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de forfait envoyé';
		}
	}
	elseif ($_GET['action'] == 'updateForfait') {
		if (!empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['idforfait'])) {
			updateForfait($_POST['description'], (int) $_POST['prix'], (int) $_POST['idforfait']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'deleteForfait') {
		if (!empty($_GET['id'])) {
			deleteForfait($_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de forfait envoyé';
		}
	}
}
else {
	listForfaits();
}

?>