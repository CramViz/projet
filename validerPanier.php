
<?php
require_once('includes/testConnexion.php');
require_once ('includes/fonctionsBDD.php');
require_once ('class/panier.php');
$date = date("Y-m-d H:i:s");
$idRevendeur = $_SESSION["idRevendeur"];
$idCommande = insertCommandeDernierNum($date, $idRevendeur);
if ($idCommande != null)  {
    foreach ($_SESSION['panier'] as $idProduit => $quantite){
        insertLigneCommande($idCommande,$idProduit,$quantite);
    }
}
$panier = new Panier();
$panier->vider();
unset($_SESSION["mail"]);
unset($_SESSION["idRevendeur"]);
header('location:index.php');
?>