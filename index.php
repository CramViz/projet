<?php
require_once ('includes/fonctionsBDD.php');
require_once ('includes/head.php');
session_start();
if (isset($_POST["mail"])&&isset($_POST["mdp"])){
    $mail = $_POST["mail"];
    $mdp= $_POST["mdp"];
    $ret = verifMdp($mail, $mdp);
    if ($ret){
        $_SESSION["mail"] = $mail; 
        $_SESSION["idRevendeur"] = $ret["id"];
        header('location:pageListeCategorie.php');
    }
    else {
        echo "Login ou mot de passe incorrect, veuillez resaisir";
    }
}
?>
<body>
<div class="container">
<div class="row align-items-end">
    <div class="col-4"> <img src="images/MeubleDesign.png" class="img-fluid"/></div>
    <div class="col-8 text-primary display-4"> Identification</div>    
</div>
<form action="index.php" method="post">
<div class="row">
<div class="col-4"><label for="mail">Saisir votre adresse mail :</label></div>
<div class="col-8"><input type="mail" name="mail" id="mail" size="40" /></div>
</div>
<div class="row">
<div class="col-4"><label for="mdp"> Saisir votre mot de passe :</label></div>
<div class="col-8"><input type="password" name="mdp" size="40" id="mdp" /></div>
</div>
 <br />
 <input type="submit" class="btn btn-primary" value="Continuer" /><br/>
</form>
</div>
</body>
</html>
