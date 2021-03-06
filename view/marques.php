<?php
//LIBRARIES
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Admin.php');
require_once('../libraries/config/utils.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/Controller/DisplayArticle.php');
require_once('../libraries/Controller/DisplayPartner.php');
require_once('../libraries/Model/DisplayPartner.php');
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/marques.css";
$Pagenom = "Marques";
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

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";
$headerJS = '../libraries/js/header.js';


require('../require/html_/header.php');

?>
<main>

    <section class='flex_mise_en_page'>
        <aside class='aside_search_bar'>
            <div class='aside_mise_en_page'>
                <details open>
                    <summary>Carte Graphique</summary>
                    <span class='titre_aside_style'>Generation</span>
                    <form method='GET' action="" class="form_aside">
                        <div>
                            <input type="checkbox" id="GTX_1000" name="GTX_1000" value='16'>
                            <label for="GTX_1000">GTX 1000</label>
                        </div>
                        <div>
                            <input type="checkbox" id="RTX_2000" name="RTX_2000" value='17'>
                            <label for="RTX_2000">RTX 2000</label>
                        </div>
                        <div>
                            <input type="checkbox" id="RTX_3000" name="RTX_3000" value='1'>
                            <label for="RTX_3000">RTX 3000</label>
                        </div>
                        <div>
                            <input type="checkbox" id="RX_5000" name="RX_5000" value='13'>
                            <label for="RX_5000">RX 5000</label>
                        </div>
                        <div>
                            <input type="checkbox" id="RX_6000" name="RX_6000" value='15'>
                            <label for="RX_6000">RX 6000</label>
                        </div>
                        <div class='bouton'>
                            <input type='submit' name='search_GC' class="button_aside">
                        </div>
                        </article>
                    </form>
                </details>
                <details open>
                    <summary>Processeur</summary>
                    <span class='titre_aside_style'>Marque</span>

                    <form method='GET' action="" class="form_aside">
                        <div>
                            <input type="checkbox" id="intel" name="intel">
                            <label for="intel">INTEL</label>
                        </div>
                        <div>
                            <input type="checkbox" id="RYZEN" name="RYZEN">
                            <label for="RYZEN">RYZEN</label>
                        </div>
                    </form>
                </details>

                <details open>
                    <summary>Carte mère</summary>
                    <span class='titre_aside_style'>Chipset</span>

                    <form method='GET' action="" class="form_aside">
                        <div>
                            <input type="checkbox" id="intel" name="intel">
                            <label for="intel">INTEL</label>
                        </div>
                        <div>
                            <input type="checkbox" id="RYZEN" name="RYZEN">
                            <label for="RYZEN">RYZEN</label>
                        </div>
                    </form>
                </details>
                <details open>
                    <summary>Stockage</summary>
                    <span class='titre_aside_style'>Gamme</span>

                    <form method='GET' action="" class="form_aside">
                        <div>
                            <input type="checkbox" id="nvme" name="nvme">
                            <label for="nvme">NVME</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ssd" name="ssd">
                            <label for="ssd">SSD</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hdd" name="hdd">
                            <label for="hdd">HDD</label>
                        </div>
                    </form>
                </details>
                <details open>
                    <summary>PC</summary>
                    <span class='titre_aside_style'>Ordinateur</span>
                    <form method='GET' action="" class="form_aside_ordi">
                        <div>
                            <input type="checkbox" id="fixe" name="fixe">
                            <label for="fixe">FIXE</label>
                        </div>
                        <div>
                            <input type="checkbox" id="portable" name="portable">
                            <label for="portable">PORTABLE</label>
                        </div>
            </div>
            </form>
            </details>
        </aside>
        <section class='artcles_presentation'>
            <?php

            $controllerDisplay = new \Controller\DisplayArticle(); // impression composante 

            if ((isset($_GET['typeSelected'])) && (isset($_GET['marqueSelected']))) {

                $controllerDisplay->displayArticlesByTypeAndBrandOrGamme('id_type', 'id_marque', $_GET['typeSelected'], $_GET['marqueSelected']);
            }

            if ((isset($_GET['gammeSelected'])) && (isset($_GET['typeSelected']))) {

                $controllerDisplay->displayArticlesByTypeAndBrandOrGamme('id_gamme', 'id_type', $_GET['gammeSelected'], $_GET['typeSelected']);
            }

            if (isset($_GET['search_GC'])) {
                $controllerDisplay = new \Controller\DisplayArticle();
                $result = $controllerDisplay->transitOneColumn($_GET);
            }
            ?>
            <section class='block_presentation'>
                <?php

                $controller = new \Controller\DisplayPartner();
                $tab = $controller->displayAllBrand();
                // var_dump($tab);

                ?>

            </section>
</main>
<?php


require('../require/html_/footer.php');
?>