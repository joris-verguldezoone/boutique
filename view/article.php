<?php
//LIBRARIES
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Display.php');
require_once('../libraries/Model/Display.php');
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Article";
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
<main>
	<?php
$controllerDisplay = new \Controller\Display();

$controllerDisplay->displayOneArticle($_GET['articleSelected']);

var_dump($_GET);
echo "cc";
?>

</main>