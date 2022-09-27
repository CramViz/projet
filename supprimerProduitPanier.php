<?php
require_once('includes/testConnexion.php');
require_once ('class/panier.php');
$id=$_GET["id"];
$panier= new Panier();
$panier->retirer($id);
header('location:visualiserPanier.php');