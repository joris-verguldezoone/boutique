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
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';

require('../require/html_/header.php');

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