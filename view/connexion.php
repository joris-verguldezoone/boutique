<?php
ob_start();
//LIBRARIES
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
$utils = "../libraries/config/utils.php";
require('../libraries/Model/Connexion.php');
require('../libraries/Model/Display.php');
require('../libraries/config/utils.php');
require('../libraries/Controller/Connexion.php');
require_once('../libraries/Controller/DisplayArticle.php');


//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/connexion.css";
$Pagenom = "Connexion";
$footer = "../css/footer.css";
$logo = "../images/logo.jpg";
$chemin_logo = "../index.php";
$logo_header = "../images/logo.jpg";

$autocomplete_path = "../libraries/js/header.js";

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
$contact = "contact.php";

//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';
$headerJS = '../libraries/js/header.js';

require('../require/html_/header.php');
// var_dump($_SESSION);
?>
<main>
    <h1>Connectez-vous !</h1>
    <div id="test">
        <article id="bloc_inscription">
            <form class="block" method="POST" action="connexion.php">
                <div>
                    <label for="login" name="login" class="inp">Login</label><br>
                    <input type="text" id="ConnexionLogin" name="login" placeholder="&nbsp;">
                </div>
                <div>
                    <label for="password" name="password" class="inp">Password</label><br>
                    <input type="password" id="ConnexionLogin" name="password" placeholder="&nbsp;">
                </div>
                <input type="submit" id="ConnexionSubmit" value="register" name="register">
            </form>
        </article>
    </div>
    <meta name="google-signin-client_id" content="1005217148028-lc9gsl07v3enlepc7ld5uut8cj0sqbl9.apps.googleusercontent.com">
    <section class="container">
        <section class="connection-button">
            <!-- <img class="connection-illustration img-fluid" src="{{ BASE_PATH }}/View/images/login-picture.svg" alt="connection illustration"> -->
            <br>
            <h1 class="text-banner">Join your Plateforme friend's</h1>
            <a href="#" onclick="signOut();">Sign out</a>
            <br>
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </section>
    </section>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="../libraries//js//googleOauth.js"></script>
</main>
<?php

if (isset($_POST['register'])) {

    $newUser = new \Controller\Connexion(); // prend pas le bon
    $newUser->connect($_POST['login'], $_POST['password']);
}
ob_end_flush();

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";

require('../require/html_/footer.php');

?>