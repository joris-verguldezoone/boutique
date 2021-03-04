<?php
//LIBRARIES


//CSS
$bdd = "libraries/config/bdd.php";
$headerCss = "css/header.css";
$pageCss = "css/index.css";
$Pagenom = "Accueil";
$footer = "css/footer.css";
require('libraries/Controller/Display.php');
require('libraries/Model/Article.php');
require_once('libraries/config/utils.php');
require_once('libraries/config/http.php');
require_once('libraries/Controller/DisplayArticle.php');

//PATHS
$index = "index.php";
$inscription = "view/inscription.php";
$connexion = "view/connexion.php";
$profil = "view/profil.php";
$articles = "view/articles.php";
$commande = "view/commande.php";
$panier = "view/panier.php";
$admin = "view/admin.php";
$deconnexion = "index.php?off=1";

//HEADER NAV
$carteGraphique = 'view/articles.php?carteGraphique';
$processeur = 'view/articles.php?processeur';
$stockage = 'view/articles.php?stockage';
$ram = 'view/articles.php?ram';
$ecran = 'view/articles.php?ecran';
$portable = 'view/articles.php?portable';
$pcFixe = 'view/articles.php?pcFixe';
$alimentation = 'view/articles.php?alimentation';
$carteMere = 'view/articles.php?carteMere';




require('require/html_/header.php');
$controllerArticle = new \Controller\Display();
$controllerArticle->showFivePopularArticles(); 

$ok = strlen('https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg');
echo $ok."fdp";
?>
<main>

<?php

?>


</main>