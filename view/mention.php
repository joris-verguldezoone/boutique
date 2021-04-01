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
$pageCss = "../css/mention.css";
$Pagenom = "Mentions légales";
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

?>

<main>
<h1><u>Mentions légales</u></h1>

<div>
    <p>
        Forme de la société : société anonyme<br>
        Capital social : 6 666 666,66 €<br>
        RCS de Lyon : 403 554181<br>
        Siège social : 2 RUE DES ERABLES CS21035 69578 LIMONEST CEDEX FRANCE<br>
        Numéro de TVA : FR 26 403 554181<br>
        Responsable du site web : /<br>
        Directeur de la publication : /<br>
    </p>
    <p>
        <b><u>Groupe LDLC agent d'HPME (Marketplace)</u></b><br>

        La société Groupe LDLC a été mandatée en qualité d’agent de la société HIPAY ME, 
        établissement de monnaie électronique agréé de droit belge, au capital de 
        54.826.000,00 euros, immatriculée au registre des personnes morales sous le numéro 
        0897928802, dont le siège social se situe au 19 Avenue des Volontaires – 1160 
        AUDERGHEM - BELGIQUE) et vous propose à ce titre d’entrer en relation avec la 
        société HIPAY ME afin d’ouvrir un compte de paiement auprès d’HIPAY ME et de 
        conclure avec HIPAY ME une convention de services de paiement pour traiter vos 
        opérations commerciales (CGU). Les CGU seront présentes dans le contrat d'adhésion 
        signé entre le vendeur et Groupe LDLC Les informations relatives à l’agrément 
        délivré par la BNB (Banque Nationale de Belgique) à HIPAY ME peuvent être 
        consultées en cliquant sur le lien suivant.
    </p>
    <p>
            <b><u>Immatriculation ORIAS</u></b><br>

        La société Groupe LDLC est inscrite auprès de l’ORIAS au Registre unique des 
        Intermédiaires en Assurance, Banque et Finance sous le numéro d’immatriculation 
        20009100 en qualité de mandataire non exclusif en opérations de banque et en 
        services de paiement (MOBSP) et de Mandataire d’intermédiaire d’assurance (MIA). 
        Autorité chargée du contrôle : ACPR.
    </p>
    <p>
            <b><u>Propriété intellectuelle</u></b><br>

        Nous vous informons que toute reproduction ou représentation totale ou partielle, 
        par quelque procédé que ce soit, de ce site, des logos, des images pouvant y 
        figurer est interdite sans l’autorisation expresse du Groupe LDLC et constituerait 
        une contrefaçon sanctionnée par les articles L 335-2 et suivants du Code de la 
        propriété intellectuelle.
    </p>
    <p>
            <b><u>Protection des données personnelles</u></b><br>

        Notre politique de protection des données personnelles est disponible ici

        Vous pouvez faire une demande en lien avec le droit d’opposition, le droit d’accès, 
        le droit de rectification, le droit à l’effacement, le droit à la limitation du 
        traitement ou le droit à la portabilité des données ici
    </p>
    <p>
            <b><u>Médiation</u></b><br>

        Conformément à l’article L156-1 du code de la consommation, le consommateur est 
        informé de la possibilité de recourir, en cas de contestation, à une procédure 
        de médiation conventionnelle ou à tout autre mode alternatif de règlement des 
        différends. Le Groupe LDLC adhère à la Fédération du e-commerce et de la vente 
        à distance (FEVAD) et au service de médiation du e-commerce (60 rue la Boétie – 
        75008 PARIS). Le consommateur est également informé de l’existence de la 
        plateforme mise en ligne par la Commission européenne qui a pour objet de 
        recueillir les éventuelles réclamations issues d’un achat en ligne des 
        consommateurs européens et de transmettre ensuite les cas reçus aux médiateurs 
        nationaux compétents.
    </p>
</div>
</main>

<?php

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";

require('../require/html_/footer.php');
?>