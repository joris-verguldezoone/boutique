<?php 
//LIBRARIES
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
require('../libraries/Model/Profil.php');
require('../libraries/config/utils.php');
require('../libraries/Controller/Profil.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/profil.css";
$Pagenom = "Profil";
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
    <form class="block" method="POST" action="profil.php">
        <h1><u>Profil</u></h1>

        <article>
            <label for="login" name="login" class="inp">
                <input type="text" id="profilLogin" name="login" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['login'];?>">
                <span class="label">New Login</span>
                <span class="focus-bg"></span>
            </label>
            <label for="password" name="password" class="inp">
                <input type="password" id="profilPassword" name="password" placeholder="&nbsp;">
                <span class="label">New Password</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="confirm_password" name="password" class="inp">
                <input type="password" id="profilConfirm_password" name="confirm_password" placeholder="&nbsp;">
                <span class="label">Confirm New Password</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" name="email" class="inp">
                <input type="text" id="inscriptionEmail" name="email" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['email'];?>">
                <span class="label">New Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="update" name="update">
            <?php

    if (isset($_POST['update'])) {
        var_dump($_SESSION);
        $newUser = new \Controller\Profil(); 
        $newUser->profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
    }
    ?>
        </form>
</main>