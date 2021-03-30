<?php
ob_start();
//LIBRARIES
$utils = "../libraries/config/utils.php";
$bdd = "../libraries/config/bdd.php";
$Http = "../libraries/config/Http.php";
require_once('../libraries/Model/Profil.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/Controller/Profil.php');
require_once('../libraries/Controller/DisplayProfil.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Model/Display.php');
require_once('../libraries/Controller/Panier.php');
require_once('../libraries/Model/Panier.php');


//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/paiement.css";
$Pagenom = "Paiement";
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


if(isset($_POST['prix']) && !empty($_POST['prix'])){
    require_once('../vendor/autoload.php');
    $prix = (float)$_POST['prix'];
    $controller = new \Controller\Panier();
    $prixConfirmation = $controller->sumPrice($_SESSION['utilisateur']['id']);
    if($prix == $prixConfirmation){

    

    \Stripe\Stripe::setApiKey('sk_test_51IKUynKWS3ZgsIjcO3ntL9tOY3bTU7E987jiDikuVrHBXqtSzkpz4Bzx0zFYEpkKLPkjaRGoRJzIurCBZ9wkzVna00IJo7PfSy');

    $intent = \Stripe\PaymentIntent::create([
        'amount' => $prix * 100,
        'currency' => 'eur'
    ]);

    // echo '<pre>';
    // var_dump($intent);
    // echo '</pre>';
    // die();
    }
    else{
        echo 'va hacker ta grand mere deuh pas';
    }
}
else{
    header('Location: panier.php');
}


?>
<main>
    <form method='POST'> <!-- en js donc pas d'action -->
        <h3>Paiement sécurisé</h3>
        <div id='errors'></div> 
        <!-- contiendra les msg d'erreur de paiment -->
        <input type='text' id='card-owner-name' placeholder='titulaire de la carte'> 
        <div id='card-elements'></div> 
        <!-- info de carte -->
        <div id='card-errors' role='alert'></div>
        <!-- erreur relative a la carte, fausse/ expiration etc -->
        <button id='card-button' type='button' name='test' data-secret="<?= $intent['client_secret'] ?>">Procéder au paiement</button>
    </form>
</main>
<?php
// var_dump($intent);
// var_dump($_SESSION['adresseSelected']);

 
ob_end_flush();

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";
require_once('../require/html_/footer.php');
?>
<script src='https://js.stripe.com/v3/'></script>
<script src='../libraries/js/script.js'></script>