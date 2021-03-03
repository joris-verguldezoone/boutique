<?php
//LIBRARIES
ob_start();
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/http.php";
// $Http = "../libraries/config/Http.php";
require('../libraries/Model/Inscription.php');
require('../libraries/config/utils.php');
require('../libraries/Controller/Inscription.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/inscription.css";
$Pagenom = "Inscription";
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
    <form class="block" method="POST" action="inscription.php">
        <h1><u>Inscription</u></h1>

        <article>
            <label for="login" name="login" class="inp">
                <span class="label">Login</span>
                <input type="text" id="ConnexionLogin" name="login" placeholder="&nbsp;" required>
                <span class="focus-bg"></span>
            </label>
            <label for="password" name="password" class="inp">
                <span class="label">Password</span>
                <input type="password" id="ConnexionLogin" name="password" placeholder="&nbsp;" required>
                <span class="focus-bg"></span>
            </label></br>
            <label for="confirm_password" name="password" class="inp">
                <span class="label">Confirm Password</span>
                <input type="password" id="inscriptionConfirm_password" name="confirm_password" placeholder="&nbsp;" required>
                <span class="focus-bg"></span>
            </label>
            <label for="email" name="email" class="inp">
                <span class="label">Email</span>
                <input type="email" id="inscriptionEmail" name="email" placeholder="&nbsp;" required>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="inscriptionSubmit" value="register" name="register">

        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Inscription(); // prend pas le bon
    $newUser->register($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
}

        ?>
        </form>
    </main>
<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
ob_end_flush();
?>