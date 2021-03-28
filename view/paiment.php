<?php 
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

// récupération info post

if(isset($_POST['prix']) && !empty($_POST['prix'])){
    
    require_once('../vendor/autoload.php');
    $prix = (float)$_POST['prix']; // le float permet de vérifier le type
    // on instancie stripe
    \Stripe\Stripe::setApiKey('sk_test_51IKUynKWS3ZgsIjcO3ntL9tOY3bTU7E987jiDikuVrHBXqtSzkpz4Bzx0zFYEpkKLPkjaRGoRJzIurCBZ9wkzVna00IJo7PfSy');
    
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $prix * 100 ,
        'currency' => 'eur'
        ]);
        
        echo '<pre>';
        var_dump($intent);
        echo '</pre>';
        die();
    }
    
    
    ?>
    <script src='../js/script.js'></script>
<main>


</main>