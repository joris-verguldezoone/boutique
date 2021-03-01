<?php
//LIBRARIES

require_once("../libraries/config/utils.php");
$Http = "../libraries/config/Http.php";
// require('../libraries/config/utils.php');
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Display.php');
require_once('../libraries/Model/Display.php');
require_once('../libraries/model/Article.php');

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
<form action='' method='POST'>
	<button name='likeArticle' type='submit'>coucou</button>
</form>
<!-- <form action='' method='POST'>
	<button name='likeArticle' type='submit'>coucou</button>
</form> -->
	<?php
$controllerDisplay = new \Controller\Display();

$controllerDisplay->displayOneArticle($_GET['articleSelected']);



var_dump($_GET);
echo "cc";

if(isset($_POST['likeArticle'])){
	$model = new \Model\Article();
	$model->like($_GET['articleSelected'], $_SESSION['utilisateur']['id']);
}
// if(isset($_POST['NoteArticle'])){
// 	$model = new \Model\Article();
// 	$model->note($_GET['articleSelected'], $_SESSION['utilisateur']['id']);
// }
?>


</main>