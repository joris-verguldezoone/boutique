<?php
//LIBRARIES
ob_start();
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/http.php";
// $Http = "../libraries/config/Http.php";
require_once('../libraries/Model/Inscription.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/Inscription.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/model/Display.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/inscription.css";
$Pagenom = "Inscription";
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
<main>
    <h1>Inscrivez-vous !</h1>
<div id="test">
<article id="bloc_inscription">
    <form class="block" method="POST" action="inscription.php">
            <div>
                <div>
                    <label for="login" name="login" class="inp">Login</label><br>
                        <input type="text" id="ConnexionLogin" name="login" placeholder="&nbsp;" required>
                </div>
                <div>
                    <label for="password" name="password" class="inp">Password</label><br>
                        <input type="password" id="ConnexionLogin" name="password" placeholder="&nbsp;" required>
                </div>
            </div>
            <div>
                <div>
                    <label for="confirm_password" name="password" class="inp">Confirm Password</label><br>
                        <input type="password" id="inscriptionConfirm_password" name="confirm_password" placeholder="&nbsp;" required>
                </div>
                <div>
            <label for="email" name="email" class="inp">Email</label><br>
                <input type="email" id="inscriptionEmail" name="email" placeholder="&nbsp;" required>
                </div>
            </div>
            
        <input type="submit" id="inscriptionSubmit" value="register" name="register">
        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Inscription(); // prend pas le bon
    $newUser->register($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
}

        ?>
        </form>
        </article>
        </div>


    </main>
<?php
//FOOTER

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";

require('../require/html_/footer.php');

ob_end_flush();

?>