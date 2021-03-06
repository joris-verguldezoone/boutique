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
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';

require('../require/html_/header.php');

?>
<main>
<?php

?>
        <form class="block" method="POST" action="connexion.php">
            <h1><u>Connexion</u></h1>

            <article>
                <label for="login" name="login" class="inp">
                    <input type="text" id="ConnexionLogin" name="login" placeholder="&nbsp;">
                    <span class="label">Login</span>
                    <span class="focus-bg"></span>
                </label>
                <label for="password" name="password" class="inp">
                    <input type="password" id="ConnexionLogin" name="password" placeholder="&nbsp;">
                    <span class="label">Password</span>
                    <span class="focus-bg"></span>
                </label>
            </article>

            <input type="submit" id="ConnexionSubmit" value="register" name="register">
        </form>
        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Connexion(); // prend pas le bon
    $newUser->connect($_POST['login'], $_POST['password']);
}
ob_end_flush();