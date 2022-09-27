<?php
require_once('includes/testConnexion.php');
require_once ('includes/fonctionsBDD.php');
require_once ('class/panier.php');
$panier = new Panier();
$panier->ajouter($_POST["listeProduit"], $_POST["quantite"]);
header('location:pageListeCategorie.php');
?>