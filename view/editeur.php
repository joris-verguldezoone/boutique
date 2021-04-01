<?php
//LIBRARIES
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Admin.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Controller/DisplayPartner.php');
require_once('../libraries/Model/Display.php');
require_once('../libraries/Model/Article.php');
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/marque.css";
$Pagenom = "Editeur";
$footer = "../css/footer.css";
$logo = "../images/logo.jpg";
$chemin_logo = "../index.php";
$logo_header = "../images/logo.jpg";
//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$articles = "articles.php";
$commande = "commande.php";
$panier = "panier.php";
$admin = "admin.php";
$deconnexion = "deconnexion.php";
$marques = 'marques.php';
$editeurs = 'editeurs.php';
//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';
require('../require/html_/header.php');
?>

<?php

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";


?>

<main>
    <?php

        $controllerDisplay = new \Controller\DisplayPartner();
        if(isset($_GET['editorSelected'])){
            $controllerDisplay->displayOneEditor($_GET['editorSelected']);

        }

    ?>

</main>
<?php
require('../require/html_/footer.php');

?>