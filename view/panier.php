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
?>
<main>
<!-- <form method='POST' action='paiement.php'>

<label for='prix'> Prix: </label>
<input type='text' id='prix' name='prix'>

<button>Procéder au paiment</button>

</form> -->
<?php

$controller = new \Controller\Panier();
$controller->displayPanier($_SESSION['utilisateur']['id']);

?>

</main>
<?php
ob_end_flush();
?>