<?php
ob_start();
require_once("../libraries/config/utils.php");
$Http = "../libraries/config/Http.php";
// require('../libraries/config/utils.php');
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Display.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/model/Article.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Controller/Panier.php');
require_once('../libraries/model/Panier.php');
require_once('../libraries/config/Http.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Article";
$footer = "../css/footer.css";
$logo = "../images/logo.jpg";
$chemin_logo = "../index.php";
$logo_header = "../images/logo.jpg";
//PATHS
$autocomplete_path = "../libraries/js/header.js";

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


$carteGraphique = 'articles.php?carteGraphique';
$processeur = 'articles.php?processeur';
$stockage = 'articles.php?stockage';
$ram = 'articles.php?ram';
$ecran = 'articles.php?ecran';
$portable = 'articles.php?portable';
$pcFixe = 'articles.php?pcFixe';
$alimentation = 'articles.php?alimentation';
$carteMere = 'articles.php?carteMere';
//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';

require_once('../require/html_/header.php');
session_destroy();
header('Location: ' . $index);
ob_end_flush();
