<?php
//LIBRARIES


//CSS
$bdd = "libraries/config/bdd.php";
$headerCss = "css/header.css";
$pageCss = "css/index.css";
$Pagenom = "Accueil";
$footer = "css/footer.css";
$logo = "images/logo.jpg";
$chemin_logo = "index.php";
$logo_header = "images/logo.jpg";
require('libraries/Controller/Display.php');
require('libraries/Model/Article.php');
require_once('libraries/config/utils.php');
require_once('libraries/config/http.php');
require_once('libraries/model/Display.php');
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

//HEADER
$all_ArticlesPath = 'view/articles.php?';
$typePath = 'view/articles.php?typeSelected';
$marquePath = 'view/articles.php?marqueSelected';
$gammePath =  'view/articles.php?gammeSelected';




require('require/html_/header.php');


?>
<main>

<div id="content">
    <img src="images/13909_b.jpg" alt="Image Index" id="img_index">
</div>
<?php
$controllerArticle = new \Controller\DisplayArticle();
$controllerArticle->showFivePopularArticles(); 
?>
</main>

<?php


$chronopost = "images/chronopost.png";
$colissimo = "images/colissimo.png";
$mention = "view/mention.php";

require('require/html_/footer.php');

?>