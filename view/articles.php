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
$pageCss = "../css/articles.css";
$Pagenom = "Articles";
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
?>
<main>
                    <!--  test   -->

    <section class='flex_mise_en_page'>
        <aside class='aside_search_bar'>
            <details open>
            <summary>Carte Graphique</summary>
            
            <form method='GET' action="">
                <p>Marque</p>
                <article class='flex_form_aside_nav'>
                        <p>NVIDIA</p>
                        <p>AMD</p>
                    </div>
                </article>
                <p>Generation</p>
                <article class='flex_form_aside_nav'>
                    <div>
                     6000 15 2000 17
                        <input type="checkbox" id="RTX_3000" name="RTX_3000" value='1'>
                        <label for="RTX_3000">RTX 3000</label>
                    </div>
                    <div>
                        <input type="checkbox" id="RX_6000" name="RX_6000" value='15'>
                        <label for="RX_6000">6000</label>
                    </div>
                </article>
                <article class='flex_form_aside_nav'>
                    <div>
                        <input type="checkbox" id="RTX_2000" name="RTX_2000" value='17'>
                        <label for="RTX_2000">RTX 2000</label>
                    </div>
                    <div>
                        <input type="checkbox" id="RX_5000" name="RX_5000" value='13'>
                        <label for="RX_5000">RX 5000</label>
                    </div>
                </article>
                <article class='flex_form_aside_nav'>
                    <div>
                        <input type="checkbox" id="GTX_1000" name="GTX_1000" value='16'>
                        <label for="GTX_1000">GTX 1000</label>
                    </div>
                    <div>
                    <p></p>
                    </div>
                </article>

                <input type='submit' name='search_GC'>


                    <!--  test   -->
            </form>
            
</details>
            <details open>
            <summary>Processeur</summary>
            
            <form method='GET' action="">
                <p>Marque</p>
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
            
            <form method='GET' action="">
                <p>Chipset</p>
                <div>
                    <input type="checkbox" id="intel" name="intel"
                        >
                    <label for="intel">INTEL</label>
                </div>
                <div>
                    <input type="checkbox" id="RYZEN" name="RYZEN"
                        >
                    <label for="RYZEN">RYZEN</label>
                </div>
            </form>
            </details>
            <details open>
            <summary>Stockage</summary>
            
            <form method='GET' action="">
                <p>Gamme</p>
                <div>
                    <input type="checkbox" id="nvme" name="nvme"
                        >
                    <label for="nvme">NVME</label>
                </div>
                <div>
                    <input type="checkbox" id="ssd" name="ssd"
                        >
                    <label for="ssd">SSD</label>
                </div>
                <div>
                    <input type="checkbox" id="hdd" name="hdd"
                        >
                    <label for="hdd">HDD</label>
                </div>
            </form>
            </details>
            <details open>
            <summary>PC</summary>
            
            <form method='GET' action="">
                <p>Marque</p>
                <div>
                    <input type="checkbox" id="fixe" name="fixe"
                        >
                    <label for="fixe">FIXE</label>
                </div>
                <div>
                    <input type="checkbox" id="portable" name="portable"
                        >
                    <label for="portable">PORTABLE</label>
                </div>
            </form>
            </details>
        </aside>
        <section class='artcles_presentation'>
<?php

$controllerDisplay = new \Controller\DisplayArticle(); // impression composante 

if((isset($_GET['typeSelected'])) && (isset($_GET['marqueSelected']))){
    
    $controllerDisplay->displayArticlesByTypeAndBrandOrGamme('id_type' , 'id_marque' ,$_GET['typeSelected'], $_GET['marqueSelected']);
}

if((isset($_GET['gammeSelected'])) && (isset($_GET['typeSelected']))){
    
    $controllerDisplay->displayArticlesByTypeAndBrandOrGamme('id_gamme' , 'id_type' ,$_GET['gammeSelected'], $_GET['typeSelected']);
}







                // $tab = [$_GET['RTX_3000'] , $_GET['RX_6000'] , $_GET['RTX_2000'] , $_GET['RX_5000'] , $_GET['GTX_1000']];
                // $i = 0;
                // if(isset($_GET['RTX_3000'])){
                    //     $tab[] .= $_GET['RTX_3000'];
                //     // $i++;
                //     var_dump($tab);
                // }
                // if(isset($_GET['RX_6000'])){
                    //     $tab[] .= $_GET['RX_6000'];
                    // }
                    // if(isset($_GET['RTX_2000'])){
                        //     $tab[] .= $_GET['RTX_2000'];
                        // }
                        // if(isset($_GET['RX_5000'])){
                            //     $tab[] .= $_GET['RX_5000'];
                            // }
                            // if(isset($_GET['GTX_1000'])){
                                //     $tab[] .= $_GET['GTX_1000'];
                                // }


                if(isset($_GET['search_GC'])){
                    $controllerDisplay = new \Controller\DisplayArticle();
                    $result = $controllerDisplay->transitOneColumn($_GET);
                    
                    // var_dump($result);
                }
                

                // $result = "(";
                // foreach($tab as $value){
                //     $result .= "'".$value ."',"; 
                    
                //     $i++;
                // }
                
                // $result = substr($result, 0, -1);

                // $result .= ")";
                // var_dump($result);
                
        


// if(isset($_GET['typeSelected'])){
    
//     $controllerDisplay->displayArticlesBy($_GET['typeSelected'], 'id_type');
// }
// if(isset($_GET['marqueSelected'])){
    
//     $controllerDisplay->displayArticlesBy($_GET['marqueSelected'], 'id_marque');
// }
// if(isset($_GET['gammeSelected'])){
    
//     $controllerDisplay->displayArticlesBy($_GET['gammeSelected'], 'id_gamme');
// }



// if(!isset($_GET['articleSelected']) && !isset($_GET['typeSelected'])){

//     $controllerDisplay = new \Controller\Display(); // impression composante 
    
//     $controllerDisplay->displayArticles();
    
//     // var_dump($controllerDisplay);
//     // echo "cc";
    
// }
// if(isset($_GET['articleSelected'])){
    
//     $controllerDisplay = new \Controller\Display();
//     //var_dump($_GET);
//     $controllerDisplay->displayOneTypeOfArticle('id_type',$_GET['articleSelected']);
// }

// $controllerDisplay->diSsplayComposant();
    
    
    ?>
    <?php
    
    // $controllerDisplay->displayArticles(); // impression 
    ?>  </section>
    </section>
</main>
<?php 

$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";

require('../require/html_/footer.php');

ob_end_flush();
?>