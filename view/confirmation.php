<?php
//LIBRARIES
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Admin.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Controller/DisplayPartner.php');
require_once('../libraries/Model/DisplayPartner.php');
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/confirmation.css";
$Pagenom = "Confirmation d'achat";
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

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";

require('../require/html_/header.php');

?>

<main>
    <div id="confirmation_check">
        <i class="far fa-check-circle"></i>
    </div>
    <div id="text_confirmation">
        <span>Merci d'avoir commandé chez nous !</span>
    </div>
    <div id="href_confirmation">
        <div>
            <a href="articles.php?All_Articles" class="encadre_confirmation">Revenir aux articles</a>
        </div>
        <div>
            <a href="profil.php" class="encadre_confirmation">Voir votre historique</a>
        </div>
    </div>
</main>

<?php
require('../require/html_/footer.php');
?>