<?php
// require_once($headerNavDisplay); // controller et model de display 
$controllerDisplayArticle = new \Controller\DisplayArticle();
$allType = $controllerDisplayArticle->transfertID('type');
$allGamme = $controllerDisplayArticle->transfertID('gamme');
$allMarque = $controllerDisplayArticle->transfertID('marque');

var_dump($allMarque);
echo "
<!DOCTYPE HTML>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='$headerCss'>
    <link rel='stylesheet' href='$pageCss'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css'/>

    <link rel='icon' type='png' href='../images/logo.png' />    
    <title>$Pagenom</title>
</head>
<body>
    <header>
        <nav>
            <div id='menu' style='margin-left:150px;'>
                <ul class='niveau1'>
                    <li class='sousmenu'><a href='#'>Nos produits &nbsp; <i class='fas fa-chevron-down' class='fleche_menu'></i></a>
                        <ul class='niveau2'>
                        <li class='sousmenu'><a href='".$typePath."=".$allType[0]['id']."'>Processeur</a>
                            <ul class='niveau3'>
                                <li><a href='".$marquePath."=".$allMarque[3]['id']."'>Intel</a></li>
                                <li><a href='".$marquePath."=".$allMarque[2]['id']."'>AMD</a></li>
                            </ul>
                        </li>                    
                            <li class='sousmenu'><a href='".$typePath."=".$allType[1]['id']."'>Carte Graphique</a>
                                <ul class='niveau3'>
                                    <li><a href='".$marquePath."=".$allMarque[4]['id']."'>NVIDIA</a></li>
                                    <li><a href='".$marquePath."=".$allMarque[2]['id']."'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='".$typePath."=".$allType[2]['id']."'>Carte mère</a>
                                <ul class='niveau3'>
                                    <li><a href='".$marquePath."=".$allMarque[3]['id']."'>Intel</a></li>
                                    <li><a href='".$marquePath."=".$allMarque[2]['id']."'>AMD</a></li>
                                </ul>
                            </li>                    
                            <li class='sousmenu'><a href='".$typePath."=".$allType[3]['id']."'>Alimentation</a>
                                <ul class='niveau3'>
                                    <li><a href='".$typePath."=".$allGamme[0]['id']."'>520</a></li>
                                    <li><a href='".$typePath."=".$allGamme[0]['id']."'>750</a></li>
                                    <li><a href='".$typePath."=".$allGamme[0]['id']."'>850</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='".$typePath."=".$allType[4]['id']."'>PC Fixe</a>
                                <ul class='niveau3'>
                                    <li><a href='".$typePath."=".$allGamme[0]['id']."'>Bas de gamme</a></li>
                                    <li><a href='".$typePath."=".$allGamme[0]['id']."'>Moyen de gamme</a></li>
                                    <li><a href='".$typePath."=".$allGamme[0]['id']."'>Haut de gamme</a></li>
                                    </ul>
                            </li>
                            <li class='sousmenu'><a href='".$typePath."=".$allType[5]['id']."'>PC Portable</a>
                                    <ul class='niveau3'>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>Bas de gamme</a></li>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>Moyen de gamme</a></li>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>Haut de gamme</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='".$typePath."=".$allType[6]['id']."'>Ecran</a>
                                <ul class='niveau3'>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>60ips</a></li>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>144ips</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='".$typePath."=".$allType[7]['id']."'>RAM</a>
                                <ul class='niveau3'>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>2000</a></li>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>3000</a></li>
                                </ul>
                            </li>
                                <li class='sousmenu'><a href='".$typePath."=".$allType[8]['id']."'>Stockage</a>
                                    <ul class='niveau3'>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>NVME</a></li>
                                        <li><a href=".$typePath."=".$allGamme[0]['id']."'>SSD</a></li>
                                        <li><a href='".$typePath."=".$allGamme[0]['id']."'>HDD</a></li>
                                    </ul>
                                </li>
                        </ul>
                        </li>
                        </ul>
                        </div>
                        <div class='logo_header'>
                        <i class='fas fa-user' class='profil_logo'></i>
                        </div>
                        <div>
                        <i class='fas fa-shopping-cart' class='shopping_logo'></i>
                        </div>
                        </nav>
                        ";
                        
?>
