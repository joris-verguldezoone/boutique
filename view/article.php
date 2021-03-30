<?php
//LIBRARIES
// ob_start();
require_once("../libraries/config/utils.php");
$Http = "../libraries/config/Http.php";
// require('../libraries/config/utils.php');
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Display.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/model/Article.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Controller/Panier.php');
require_once('../libraries/model/Panier.php');

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

$carteGraphique = 'articles.php?carteGraphique';
$processeur = 'articles.php?processeur';
$stockage = 'articles.php?stockage';
$ram = 'articles.php?ram';
$ecran = 'articles.php?ecran';
$portable = 'articles.php?portable';
$pcFixe = 'articles.php?pcFixe';
$alimentation = 'articles.php?alimentation';
$carteMere = 'articles.php?carteMere';
//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';
require('../require/html_/header.php');
?>
<main>
<!--<form action='' method='POST'>
	<button name='likeArticle' type='submit'>coucou</button>
</form>-->
<!-- <form action='' method='POST'>
	<button name='likeArticle' type='submit'>coucou</button>
</form> -->
	<?php
$controllerDisplay = new \Controller\DisplayArticle();
if(isset($_GET['articleSelected'])){
	$controllerDisplay->displayOneArticle($_GET['articleSelected']);

}

$model = new \Model\Article();
$coucou = $model->detectLike($_SESSION['utilisateur']['id'],$_GET['articleSelected']);
// var_dump($coucou);


// var_dump($_GET);
// echo "cc";

if(isset($_GET['like'])){ // c'est pas bien de le mettre ici , par contre tout est binder pour pas que l'on puisse vraiment hack, le seul hack
	// serait de changer qui like quel article en mettant des chiffres au pif 
	// a refactoriser dans un controller avec des conditions
	$model = new \Model\Article();
	$model->like($_GET['articleSelected'], $_SESSION['utilisateur']['id']);
	echo 'like envoyé';
}
// var_dump($_SESSION);
// var_dump($_POST);

if(isset($_POST['ajoutPanier'])){
	$controllerPanier = new \Controller\Panier();
	$controllerPanier->addElement($_GET['articleSelected'], $_SESSION['utilisateur']['id']);
}
// if(isset($_POST['NoteArticle'])){
// 	$model = new \Model\Article();
// 	$model->note($_GET['articleSelected'], $_SESSION['utilisateur']['id']);
// }
// ob_end_flush();
?>
</main>


<?php

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";
require('../require/html_/footer.php');

?>