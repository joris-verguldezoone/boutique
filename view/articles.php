<?php
//LIBRARIES
ob_start(); // pour mes fonction qui s'éxécutent pendant les headerlocation
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/Controller/Display.php');
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
<main>

<?php
if(!isset($_GET['typeArticleSelected'])){

    $controllerDisplay = new \Controller\Display(); // impression composante 
    
    $controllerDisplay->displayComposant();
    
        // var_dump($controllerDisplay);
        // echo "cc";
    
    }
    if(isset($_GET['typeArticleSelected'])){

    $controllerDisplay = new \Controller\Display();
    var_dump($_GET);
    $controllerDisplay->displayOneTypeOfArticle('id_type',$_GET['typeArticleSelected']);
}

    
    
    ?>
    <?php
    
    // $controllerDisplay->displayArticles(); // impression 
    ?>

</main>
<?php 
ob_end_flush();
?>