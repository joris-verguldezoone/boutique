<?php
//LIBRARIES
ob_start(); // pour mes fonction qui s'éxécutent pendant les headerlocation
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/Controller/Display.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/DisplayArticle.php');
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

$typePath = 'articles.php?typeSelected';

//HEADER
require('../require/html_/header.php');
?>
<main>
    <aside>
        <form>

        </form>
    </aside>

<?php



if(isset($_GET['typeSelected'])){
    $controllerDisplay = new \Controller\Display(); // impression composante 
    
    $controllerDisplay->displayArticlesByType($_GET['typeSelected']);
}
if(!isset($_GET['articleSelected']) && !isset($_GET['typeSelected'])){

    $controllerDisplay = new \Controller\Display(); // impression composante 
    
    $controllerDisplay->displayArticles();
    
    // var_dump($controllerDisplay);
    // echo "cc";
    
}
if(isset($_GET['articleSelected'])){
    
    $controllerDisplay = new \Controller\Display();
    //var_dump($_GET);
    $controllerDisplay->displayOneTypeOfArticle('id_type',$_GET['articleSelected']);
}

// $controllerDisplay->diSsplayComposant();
    
    
    ?>
    <?php
    
    // $controllerDisplay->displayArticles(); // impression 
    ?>

</main>
<?php 
ob_end_flush();
?>