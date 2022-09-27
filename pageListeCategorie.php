<?php
  require_once('includes/testConnexion.php');
  require_once ('includes/fonctionsBDD.php');
  require_once ('includes/head.php');
?>
<body>
<div class="container">
  <div class="row">
      <div class="col-4"> <img src="images/MeubleDesign.png" class="img-fluid"/></div>
      <div class="col-8 text-primary display-3"> Choisir votre produit</div>    
  </div>
<form action="ajoutPanier.php" method="post">
  <div class="row">
    <div class="col-4" align="right"> Sélectionner la catégorie : <br /></div>
    <div class="col-8">
      <select id="listeCategorie" size="4" class="form-select"  >
      <?php
          $lesCategories = getLesCategories();
          foreach ($lesCategories as $categorie) {
            echo "<option value = '".$categorie['ca_id']."'>".$categorie['ca_libelle']."</option>";
          }
      ?>
      </select> 
    </div>
  </div>
  <div class="row">
    <div class="col-4" align="right">Choisir le produit :</div>
    <div class="col-8">
            <select id="listeProduit" name ="listeProduit" size="4" class="form-select" >
            </select>  
    </div>       
  </div>
  <div class="row mt-2">
    <div class="col-4" align="right">Prix : </div>
    <div class="col-8" id = "idPrix" > </div>
  </div>
  <div>
  <img src="" id="image1">
  <img src="" id="image2">
  </div>
  
  <div class="row mt-2">
    <div class="col-4" align="right">Saisir la quantité commandée : </div>
    <div class="col-8" class="align-middle"> <input type = "numeric" id="quantite" name = "quantite" size="2"/> </div>
  </div>
  <div class="row mt-2">
    <div class="col-4" align="right"></div>
    <div class="col-8" class="align-middle">  <input type="submit" class ="btn btn-danger" value="Ajouter au panier" /> </div>
  </div>  
    
</form>
<input type="button" class ="btn btn-primary" value="Voir le panier" id="btnpanier"/><br/> 
</div>
</body>
</html> 
<script>
  let listeCategorie = document.getElementById("listeCategorie");
  listeCategorie.addEventListener("click", recupProduit);
  let listeProduit = document.getElementById("listeProduit");
  listeProduit.addEventListener("change", recupPrix);
  let btnpanier = document.getElementById("btnpanier");
  btnpanier.addEventListener("click", allerAuPanier);
  function allerAuPanier() {
    location.href = "visualiserPanier.php";
  }
  function recupProduit(){   
    let listeCategorie = document.getElementById("listeCategorie");
    let idCategorie = listeCategorie.value;
	  fetch("serviceWeb\\getProduitsCateg.php?idCategorie="+ idCategorie)
	  .then(response => response.json())
	  .then(data => {
			  let listeProduit = document.getElementById("listeProduit");
			  listeProduit.length = data.length;
			  for (let i = 0 ; i < data.length ; i++){
					listeProduit.options[i].text = data[i]["pr_libelle"];
          listeProduit.options[i].value = data[i]["pr_id"]; 
			  }
	  })
	  .catch(function (error) {
			console.log('Request failed', error);
	});
  } 
  function recupPrix(){
    let listeProduit = document.getElementById("listeProduit");
    let idProduit = listeProduit.value;
	  fetch("serviceWeb\\getPrixProduit.php?idProduit="+ idProduit)
	  .then(response => response.json())
	  .then(data => {
			  let idPrix = document.getElementById("idPrix");
			  idPrix.innerHTML = data[0]["pr_prix"];
        let image1 = document.getElementById("image1");
        let image2 = document.getElementById("image2");
        image1.src = "images/"+data[0]["image1"];
        image2.src = "images/"+data[0]["image2"];
        }
	  )
	  .catch(function (error) {
			console.log('Request failed', error);
	});
  }   
  </script>

