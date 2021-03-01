<?php


echo "
<!DOCTYPE HTML>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='$headerCss'>
    <link rel='stylesheet' href='$pageCss'>
    <link rel='icon' type='png' href='../images/logo.png' />    
    <title>$Pagenom</title>
</head>
<body>
    <header>
<!--
<a class='a_header' href='$index'>Index</a>

<a class='a_header' href='$inscription'>Inscription</a>
<a class='a_header' href='$connexion'>Connexion</a>

<a class='a_header' href='$profil'>Profil</a>

<a class='a_header' href='$articles'>Articles</a>
<a class='a_header' href='$commande'>Commande</a>
<a class='a_header' href='$panier'>Panier</a>

<a class='a_header' href='$admin'>Admin</a>
<a class='a_header' href='$deconnexion'>Déconnexion</a>-->
        <nav>
            <div id='menu' style='margin-left:150px;'>
                <ul class='niveau1'>
                    <li class='sousmenu'><a href='#'>Nos produits</a>
                        <ul class='niveau2'>
                            <li class='sousmenu'><a href='#'>Carte Graphique</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>Processeur</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>                    
                            <li class='sousmenu'><a href='#'>Stockage</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>RAM</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>Ecran</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>PC Portable</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>PC Fixe</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>Alimentation</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>
                            <li class='sousmenu'><a href='#'>Carte mère</a>
                                <ul class='niveau3'>
                                    <li><a href='#'>NVIDIA</a></li>
                                    <li><a href='#'>AMD</a></li>
                                </ul>
                            </li>                    
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>    
";

?>
