<?php
//LIBRARIES
ob_start();
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Display.php');

require_once('../libraries/Controller/Display.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Model/Panier.php');
require_once('../libraries/config/http.php');
require_once('../libraries/Controller/Panier.php');
require_once('../libraries/Controller/Profil.php');
require_once('../libraries/Controller/DisplayProfil.php');
require_once('../libraries/Model/Profil.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/panier.css";
$Pagenom = "Panier";
$footer = "../css/footer.css";
$logo = "../images/logo.jpg";
$chemin_logo = "../index.php";
$logo_header = "../images/logo.jpg";
//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$articles = "articles.php";
$commande = "commande.php";
$panier = "panier.php";
$admin = "admin.php";
$deconnexion = "deconnexion.php";
$marques = 'marques.php';
$editeurs = 'editeurs.php';
//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';
require('../require/html_/header.php');
// echo "<link rel='stylesheet' href='../css/profil.css'>";

?>
<main>
<!-- <form method='POST' action='paiement.php'>

<label for='prix'> Prix: </label>
<input type='text' id='prix' name='prix'>

<button>Procéder au paiment</button>

</form> -->
<?php
$newUserModel = new \Model\Panier();
$controller = new \Controller\Panier();
$id_utilisateur = $_SESSION['utilisateur']['id'];   
$rowCount = $newUserModel->rowCount('panier','id_utilisateur', $id_utilisateur);
$rowCount = intval($rowCount[0]['COUNT(*)']);
    

// var_dump($fetch);
// echo $fetch[0]['id_adresse'];
if($rowCount >= 1){ 
    
    $controller->displayPanier($_SESSION['utilisateur']['id']);
  
      

}
else{
    echo '
        <div class="paniervide">
            <span >Votre panier est vide</span>
        </div>';
    }
    // var_dump($_SESSION);
?>

</main>
<?php
$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";
require_once('../require/html_/footer.php');
ob_end_flush();
?>