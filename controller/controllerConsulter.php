<?php

// Affichage de la liste des clients pour le choix
function choixClient()
{
    $clients = getClients();
    require('view/consulter/choixClient.php');
}

// Affichage de la liste des techniciens pour le choix
function choixTechnicien()
{
    $employes = getEmployes();
    require('view/consulter/choixTechnicien.php');
}

// Affichage des réparations d'un client par son id
function afficherReparationsClient($idClient)
{
    $client = getClient($idClient);
    $reparations = getReparationsByClient($idClient);
    require('view/consulter/reparationsClient.php');
}

// Affichage des réparations d'un technicien par son id
function afficherReparationsTechnicien($idEmploye)
{
    $employe = getEmploye($idEmploye);
    $reparations = getReparationsByTechnicien($idEmploye);
    require('view/consulter/reparationsTechnicien.php');
}

?>