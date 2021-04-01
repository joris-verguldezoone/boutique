<?php
//LIBRARIES
// $utils = "../libraries/config/utils.php";
ob_start();
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/DisplayProfil.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Model/Display.php');
require_once('../libraries/Controller/Panier.php');
require_once('../libraries/Model/Panier.php');
require_once('../libraries/config/http.php');
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/commande.css";
$Pagenom = "Commande";
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



$model = new \Model\Panier();
$tab = $model->selectAllWhereFetchAll('panier','id_utilisateur',$_SESSION['utilisateur']['id']);

foreach($tab as $value){

    $id_utilisateur = $value['id_utilisateur'];
    $id_article = $value['id_article'];
    $image_article = $value['image_article'];
    $titre = $value['titre'];
    $prix = $value['prix'];
    
    $model->insertCommande($id_utilisateur, $id_article, $image_article, $titre, $prix, $_SESSION['adresseSelected']);
}
    $model->deleteOneWhereId('panier' ,$_SESSION['utilisateur']['id']);

$http = new \Http();
$http->redirect('confirmation.php');

ob_end_flush();
?>

