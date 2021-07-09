<?php
// require_once($headerNavDisplay); // controller et model de display 
$controllerDisplayArticle = new \Controller\DisplayArticle();
$allType = $controllerDisplayArticle->transfertID('type');
$allGamme = $controllerDisplayArticle->transfertID('gamme');
$allMarque = $controllerDisplayArticle->transfertID('marque');


/*
    Rééditer les url selon si on cherche par gamme ou par marque
    Rééditer les id [0] apres avoir update la bdd
*/
// var_dump($allType);
// var_dump($allGamme);
// var_dump($allMarque);
// var_dump($allMarque[4]['id']);
echo "
<!DOCTYPE HTML>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='$headerCss'>
    <link rel='stylesheet' href='$pageCss'>
    <link rel='stylesheet' href='$footer'>
    <link rel='icon' type='images/icon' href='$logo'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css'/>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap' rel='stylesheet'>
    
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&family=Roboto&display=swap' rel='stylesheet'>
    <title>$Pagenom</title>
    <script src='$autocomplete_path'></script>
</head>
<body>
    <header>
        <nav id='nav_header'>
        <a href='$chemin_logo' id='a_logo_header'><img src='$logo_header' alt='Logo' id='logo'></a>
        <div class='header_menu'>
            <div class='menu'>
                <ul class='niveau1'>
                    <li class='sousmenu'><a href='" . $all_ArticlesPath . "All_Articles'>Nos produits &nbsp; <i class='fas fa-chevron-down' class='fleche_menu'></i></a>
                        <ul class='niveau2'>
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[8]['id'] . "'>Processeur</a>
                                <ul class='niveau3'>
                                    <li><a href='" . $marquePath . "=" . $allMarque[1]['id'] . "&typeSelected=" . $allType[8]['id'] . "'>" . $allMarque[1]['nom'] . "</a></li>
                                    <li><a href='" . $marquePath . "=" . $allMarque[2]['id'] . "?" . $typePath . "=" . $allType[8]['id'] . "'>" . $allMarque[2]['nom'] . "</a></li>
                                </ul>
                            </li>                    
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[0]['id'] . "&All_CG='>Carte Graphique</a>
                                <ul class='niveau3'>
                                    <li><a href='" . $marquePath . "=" . $allMarque[0]['id'] . "&typeSelected=" . $allType[0]['id'] . "'>" . $allMarque[0]['nom'] . "</a></li>
                                    <li><a href='" . $marquePath . "=" . $allMarque[2]['id'] . "&typeSelected=" . $allType[0]['id'] . "'>" . $allMarque[2]['nom'] . "</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[7]['id'] . "'>Carte mère</a>
                                <ul class='niveau3'>
                                    <li><a href='" . $marquePath . "=" . $allMarque[3]['id'] . "'>Intel</a></li>
                                    <li><a href='" . $marquePath . "=" . $allMarque[2]['id'] . "'>AMD</a></li>
                                </ul>
                            </li>                    .
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[6]['id'] . "'>Alimentation</a>
                                <ul class='niveau3'>
                                    <li><a href='" . $typePath . "=" . $allGamme[14]['id'] . "'>" . $allGamme[14]['nom'] . "</a></li>
                                    <li><a href='" . $typePath . "=" . $allGamme[15]['id'] . "'>" . $allGamme[15]['nom'] . "</a></li>
                                    <li><a href='" . $typePath . "=" . $allGamme[16]['id'] . "'>" . $allGamme[16]['nom'] . "</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[5]['id'] . "'>PC Fixe</a>
                                <ul class='niveau3'>
                                    <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>Bas de gamme</a></li>
                                    <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>Moyen de gamme</a></li>
                                    <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>Haut de gamme</a></li>
                                    </ul>
                            </li>
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[4]['id'] . "'>PC Portable</a>
                                    <ul class='niveau3'>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>Bas de gamme</a></li>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>Moyen de gamme</a></li>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>Haut de gamme</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[6]['id'] . "'>Ecran</a>
                                <ul class='niveau3'>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>60ips</a></li>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>144ips</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='" . $typePath . "=" . $allType[1]['id'] . "'>RAM</a>
                                <ul class='niveau3'>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>2000</a></li>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>3000</a></li>
                                </ul>
                            </li>
                                <li class='sousmenu'><a href='" . $typePath . "=" . $allType[8]['id'] . "'>Stockage</a>
                                    <ul class='niveau3'>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>NVME</a></li>
                                        <li><a href=" . $typePath . "=" . $allGamme[0]['id'] . "'>SSD</a></li>
                                        <li><a href='" . $typePath . "=" . $allGamme[0]['id'] . "'>HDD</a></li>
                                    </ul>
                                </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class='menu'>
                <ul class='niveau1'>
                    <li class='sousmenu'><a href='#'>Nos partenaires &nbsp; <i class='fas fa-chevron-down' class='fleche_menu'></a></i>
                        <ul class='niveau2'>

                            <li class='sousmenu'><a href='" . $marques . "'>Marques</a></li>                    
                                
                            <li class='sousmenu'><a href='" . $editeurs . "'>Editeurs</a></li>

                        </ul>
                    </li>
                </ul>
            </div>

        </div>

        <form  class='searchBar' action='" . $articles . "' method='GET'>
        <div id='flex-div-search'>
            <input id='text_search' type='text' name='searchBarText' placeholder='GDDR6X...' autocomplete='off'>
            <div id='matchList'></div>
        </div>
        <button type='submit' id='submitSearchBar' name='submitSearchBar'><i class='fas fa-search searchIcon'></i></button>
        <input type='hidden' id='result' name='result'>

        </form>";


if (isset($_SESSION['connected'])) {
    echo " <div class='header_droit'>";
    if (isset($_SESSION['connected']) && isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['id_droits'] === '100')) {
        echo " 
                <div class='font_profil_panier'>
                    <a href='$admin'><i class='fas fa-user-cog'></i></a>
                </div>";
    }
    echo " <div class='font_profil_panier'>
                    <a href='$profil'><i class='fas fa-user' class='profil_logo'></i></a>
                </div>
            <div class='font_profil_panier'>
                    <a href='$panier'><i class='fas fa-shopping-cart' class='shopping_logo'></i></a>
                </div> 
            </div>  ";
} else {
    echo " 
            <div class='header_droit'>
                <div class='font_profil_panier'>
                    <a href='$connexion'><p class='header_inscription'>Connexion</p></a>
                </div>
                
                <div class='font_profil_panier'>
                    <a href='$inscription'><p class='header_inscription'>Inscription</p></a>
                </div> 
            </div>  ";
}
echo "</nav>
<script src='$headerJS'></script>
</header>";
