<?php 
ob_start();
//LIBRARIES
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
require('../libraries/Model/Profil.php');
require('../libraries/config/utils.php');
require('../libraries/Controller/Profil.php');
require('../libraries/Controller/DisplayProfil.php');
require_once('../libraries/Controller/DisplayArticle.php');
require('../libraries/Model/Display.php');


//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/profil.css";
$Pagenom = "Profil";
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
$marques = 'marques.php';
$editeurs = 'editeurs.php';
//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';
require('../require/html_/header.php');

$newUserModel = new \Model\Profil();
$newUserController = new \Controller\Profil();
$Http = new \Http();
?>

<main class='main'> 
    <section id='global1'>
    <article id="profil_box_info">
    <div id="flex_box_profil">
    <form class="block" method="POST" action="profil.php">
        <article class='InfoGenerales'>
            <h3>Mon profil</h3>
        <div id="profil_photo">
                <img class='img_profil' src='<?php echo $_SESSION['utilisateur']['image'];?>'>
                <div id="profil_input_photo">
                    <label for="login" id="profil_titre_photo"></label>
                    <input type="text" id="profilimage" name="image" value="<?php echo $_SESSION['utilisateur']['image'];?>">
                </div>
            </div>
            <div id="center_info_profil">
                <div class="flex_input_profil">
            <label for="login">Login</label>
                <input type="text" id="profilLogin" name="login" value="<?php echo $_SESSION['utilisateur']['login'];?>"><br>
            </div>
            <div id="input_flex_prenom">
            <div class="flex_input_profil">
            <label for="password">Mot de passe</label>
                <input type="password" id="profilPassword" name="password" placeholder="&nbsp;"><br>
            </div>
            <div class="flex_input_profil">
            <label for="confirm_password">Confirm. mot de passe</label>
                <input type="password" id="profilConfirm_password" name="confirm_password" ><br>
            </div>
            </div>
            <div class="flex_input_profil">
            <label for="email">Email</label>
                <input type="email" id="inscriptionEmail" name="email" value="<?php echo $_SESSION['utilisateur']['email'];?>"><br>
                </div>
                <div class="button_center_profil">

                <input type="submit" id="profilSubmit" value="update" name="update">
            </div>
            </div>

            <?php

    if (isset($_POST['update'])) {
        $newUserController->profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email'], $_POST['image']);
        $Http->redirect('profil.php');
    }
    ?>
        </form>

<!-- INFO PERSONNEL -->

    <form class="block" method="POST" action="profil.php">
        <article class='InfoSupplementaire'>
        <h3>Mes informations personnelles</h3>

        <div id="profil_info_perso">
            <div class="profil_info_flex">
            <label for="nom">Nom</label>
                <input type="text" id="profilNom" name="nom" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['nom'];?>"><br />
            </div>
            <div class="profil_info_flex">
            <label for="prenom">Prenom</label>
                <input type="text" id="profilPrenom" name="prenom" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['prenom'];?>"><br />
            </div>
            </div>
            <div class="profil_info_flex">
            <label for="anniversaire">Anniversaire</label>
                <input type="date" id="profilAnniv" name="anniversaire" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['anniversaire'];?>"><br />
            </div>
            <div class="button_center_profil">
            <input type="submit" id="profilSubmit" value="Modifier" name="updateInfoPersonnel">
            </div>
        </article>
        </article>
        <?php

        if (isset($_POST['updateInfoPersonnel'])) {
            $newUserController->updateInfoPersonnel($_POST['nom'], $_POST['prenom'], $_POST['anniversaire']);
            $Http->redirect('profil.php');
            
        }
        ?>
    </form>
    </div>

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
        echo '</section>';
        echo '<section id="global2">';
        // On vérifie si l'utilisateur possède déjà une adresse pour l'afficher et éviter les erreurs 
        $fetch = $controllerDisplayProfil->historiqueAchat($_SESSION['utilisateur']['id']);
        echo '</section>';
        ?>



</main>
<?php

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";

require('../require/html_/footer.php');

ob_end_flush();
?>