<?php

// Routeur spécifique à la page de gestion de l'entité Client

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listClients') {
		listClients();
	}
	elseif ($_GET['action'] == 'createClientForm') {
		createClientForm();
	}
	elseif ($_GET['action'] == 'createClient') {
		if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['commune']) && !empty($_POST['responsable'])) {
			createClient($_POST['nom'], $_POST['prenom'], (int) $_POST['commune'], (int) $_POST['responsable']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'updateClientForm') {
		if (!empty($_GET['id'])) {
			updateClientForm((int) $_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de client envoyé';
		}
	}
	elseif ($_GET['action'] == 'updateClient') {
		if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['commune']) && !empty($_POST['responsable']) && !empty($_POST['idclient'])) {
			updateClient($_POST['nom'], $_POST['prenom'], (int) $_POST['commune'], (int) $_POST['responsable'], (int) $_POST['idclient']);
		}
		else {
			echo 'Erreur : tous les champs ne sont pas remplis !';
		}
	}
	elseif ($_GET['action'] == 'deleteClient') {
		if (!empty($_GET['id'])) {
			deleteClient($_GET['id']);
		}
		else {
			echo 'Erreur : aucun identifiant de client envoyé';
		}
	}
}
else {
	listClients();
}

?>