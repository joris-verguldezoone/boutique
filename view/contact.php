<?php
//LIBRARIES
ob_start(); // pour mes fonction qui s'éxécutent pendant les headerlocation
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Display.php');

require_once('../libraries/Controller/Display.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/DisplayArticle.php');
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/contact.css";
$Pagenom = "Contact";
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
$contact = "contact.php";

$autocomplete_path = "../libraries/js/header.js";

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
    <form method='POST'>
        <button onclick='sendNewGroupChat()' type='button' id='enableChat'>Créer un nouveau billet</button>
        <textarea cols="25" rows='5' placeholder='Mot de passe perdu' id="objet"></textarea>
    </form>
    <section id="chat_section">
        <div id="all_chat_container">
            <!-- <input type="text" id="searchUser" placeholder="Admin"> -->
        </div>

        <section id="chat_reader">
            <div id='user_to_message'></div>
            <div id='show_conversation'></div>
            <textarea id="textarea_ID" rows="10" cols="100">  </textarea>
            <input type='button' id='sendMessage' value='Envoyer' onclick=''>
        </section>
    </section>

    <script src="../libraries/js/chat.js"></script>
</main>

<?php
// il me reste tout ça a faire: commande     commentaires   liste_de_souhait    adress      carte_bleu      likedislike     notation    panier 4
$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";
require_once('../require/html_/footer.php');
ob_end_flush();
?>