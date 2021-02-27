<?php 
//LIBRARIES
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
require('../libraries/Model/Profil.php');
require('../libraries/config/utils.php');
require('../libraries/Controller/Profil.php');
require('../libraries/Controller/DisplayProfil.php');


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

$newUserModel = new \Model\Profil();
$newUserController = new \Controller\Profil();
var_dump($_POST);

?>

<main>
    <form class="block" method="POST" action="profil.php">
        <h1><u>Profil</u></h1>

        <article>
            <label for="login" class="inp">
                <input type="text" id="profilLogin" name="login" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['login'];?>">
                <span class="label">New Login</span>
                <span class="focus-bg"></span>
            </label>
            <label for="password" class="inp">
                <input type="password" id="profilPassword" name="password" placeholder="&nbsp;">
                <span class="label">New Password</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="confirm_password" class="inp">
                <input type="password" id="profilConfirm_password" name="confirm_password" placeholder="&nbsp;">
                <span class="label">Confirm New Password</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" class="inp">
                <input type="text" id="inscriptionEmail" name="email" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['email'];?>">
                <span class="label">New Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="update" name="update">
            <?php

    if (isset($_POST['update'])) {
        $newUserController->profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
    }
    ?>
        </form>

<!-- INFO PERSONNEL -->

    <form class="block" method="POST" action="profil.php">

        <article>
            <label for="nom" class="inp">
                <input type="text" id="profilNom" name="nom" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['nom'];?>">
                <span class="label">Nom</span>
                <span class="focus-bg"></span>
            </label>
            <label for="prenom" class="inp">
                <input type="text" id="profilPrenom" name="prenom" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['prenom'];?>">
                <span class="label">Prénom</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="anniversaire" class="inp">
                <input type="date" id="profilAnniv" name="anniversaire" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['anniversaire'];?>">
                <span class="label">Anniv</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" class="inp">
                <input type="text" id="profilEmail" name="email" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['email'];?>">
                <span class="label">Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="Modifier" name="updateInfoPersonnel">

        <?php

        if (isset($_POST['updateInfoPersonnel'])) {
            $newUserModel->update($_POST['nom'], $_POST['prenom'], $_POST['anniversaire'], $_POST['email']);
        }
        ?>
    </form>

    <!-- CARTE BLEU -->

    <!-- <form class="block" method="POST" action="">
        <article>
            <label for="type_carte" class="inp">
                <input type="text" id="CarteBleuType_carte" name="type_carte" placeholder="&nbsp;" value="">
                <span class="label">Type de carte</span>
                <span class="focus-bg"></span>
            </label>
            <label for="titulaire" class="inp">
                <input type="text" id="CarteBleuTitulaire" name="titulaire" placeholder="&nbsp;" value=" ">
                <span class="label">Titulaire de la carte</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="numero" class="inp">
                <input type="text" id="CarteBleuNumero" name="numero" placeholder="&nbsp;" value="  ">
                <span class="label">Numéro de carte</span>
                <span class="focus-bg"></span>
            </label>
            <label for="codeSecurite" class="inp">
                <input type="text" id="CarteBleuCodeSecurite" name="codeSecurite" placeholder="&nbsp;">
                <span class="label">Code de sécurité</span>
                <span class="focus-bg"></span>
            </label>
            <label for="date" class="inp">
                <input type="date" id="CarteBleuDate" name="date" placeholder="&nbsp;" value="">
                <span class="label">Date d'expiration</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="Modifier" name="update_carte_bleu">
        <input type="submit" id="profilSubmit" value="Enregistrer" name="insert_carte_bleu">

        <?php
//         if (isset($_POST['update_carte_bleu'])) {
//             $newUserModel->updateCarteBleu($_POST['type_carte'], $_POST['titulaire'], $_POST['numero'], $_POST['codeSecurite'], $_POST['date']);
//         }
// var_dump($_POST);
//         if (isset($_POST['insert_carte_bleu'])){
//             $newUserModel->InsertCarteBleu($_POST['type_carte'], $_POST['titulaire'], $_POST['numero'], $_POST['codeSecurite'], $_POST['date']);
//         }
        ?>
    </form> -->

    <!-- ADRESSE -->

    

        <?php
        $controllerDisplayProfil = new \Controller\DisplayProfil();
        $controllerDisplayProfil->displayAdress();
        
        // On vérifie si l'utilisateur possède déjà une adresse pour l'afficher et éviter les erreurs 
      
        ?>



</main>