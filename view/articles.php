<?php
//LIBRARIES
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Article.php');
require_once('../libraries/Controller/Article.php');
require_once('../libraries/config/utils.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/articles.css";
$Pagenom = "Articles";
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
require('../require/html_/header.php');
?>

<?php

$controllerDisplay = new \Controller\Article(); // impression composante 

    // $controllerDisplay->displayComposant();

    // var_dump($controllerDisplay);
    // echo "cc";



    
    
    
    ?>
<main>
    <?php
    
    $controllerDisplay->displayArticles(); // impression 
    ?>

</main>