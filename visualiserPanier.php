<?php
require_once('includes/testConnexion.php');
require_once ('includes/fonctionsBDD.php');
require_once ('class/panier.php');
require_once ('includes/head.php');
?>
<body>
<div class="container">
  <div class="row align-items-end">
      <div class="col-4"> <img src="images/MeubleDesign.png" class="img-fluid"/></div>
      <div class="col-8 text-primary h3"> Votre panier</div>    
  </div>
<?php
$p = new Panier();
$panier = $p->getPanier();
if (count($panier)==0){
        echo "<p class=display-2>panier vide</p>";
        header("refresh:3;url=pageListeCategorie.php");
}
else {
?>
<div class="row">
    <div class="col-6 border border-secondary h4">Libellé produit</div>
    <div class="col-3 border border-secondary h4">Quantité</div>
    <div class="col-3 border h4"> </div>
</div>
<?php
foreach ($_SESSION['panier'] as $id => $quantite){
    echo "<div class='row'>";
    $produit = getProduit($id);
    echo "<div class='col-6 border border-secondary'>".$produit["pr_libelle"]."</div>";
    echo "<div class='col-3 border border-secondary'>".$quantite."</div> ";
    $ancre = "<a href='supprimerProduitPanier.php?id=".$produit["pr_id"]."'>supprimer</a>";
    echo "<div class='col-3 border border-secondary'>$ancre</div>";
    echo "</div>";
}
?>
<br />
<form action ="validerPanier.php" method="post">
    <input type ="submit" class="btn btn-primary" value ="Valider le panier">
    </input>
</form>
<?php
}
?>
</div>
</body>
</html>