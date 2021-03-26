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
    header('Location: panier.php');
}


?>
<main>
    <form method='POST'> <!-- en js donc pas d'action -->

        <div id='errors'></div> 
        <!-- contiendra les msg d'erreur de paiment -->
        <input type='text' id='card-owner-name' placeholder='titulaire de la carte'> 
        <div id='card-elements'></div> 
        <!-- info de carte -->
        <div id='card-errors' role='alert'></div>
        <!-- erreur relative a la carte, fausse/ expiration etc -->
        <button id='card-button' type='button' data-secret="<?= $intent['client_secret'] ?>">Procéder au paiement</button>
    </form>
</main>
<script src='https://js.stripe.com/v3/'></script>
<script src='../libraries/js/script.js'></script>
<?php
ob_end_flush();
?>