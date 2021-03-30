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

//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$articles = "articles.php";
$commande = "commande.php";
$panier = "panier.php";
$admin = "admin.php";
$deconnexion = "../index.php?off=1";

//HEADER
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
    
if($rowCount >= 1){ 
    
    $controller->displayPanier($_SESSION['utilisateur']['id']);
  
      

}
else{
    echo '
        <div>
            <span>Votre panier est vide</span>
        </div>';
    }
?>

</main>
<?php
ob_end_flush();
?>