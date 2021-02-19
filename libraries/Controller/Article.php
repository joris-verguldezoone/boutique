<?php

namespace Controller;

class Article{

    public function displayComposant(){
        $modelDisplay = new \Model\Article();
        $tab = $modelDisplay->displayAllType();
$i = 0;
var_dump($tab);
echo("<br/>");

        foreach($tab as $value){
            
            echo $value[0]; // peut etre en hidden input
            echo $value[1];
            echo "<img src='$value[2]'>";
            
        }

    }


}

?>