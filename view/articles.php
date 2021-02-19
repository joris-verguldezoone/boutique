<?php
$bdd = "../libraries/config/bdd.php";

require_once('../libraries/Controller/Article.php');
require_once('../libraries/Model/Article.php');


?>



<main>

<?php

$controllerDisplay = new \Controller\Article();

$controllerDisplay->displayComposant();

var_dump($controllerDisplay);
echo "cc";
?>


</main>