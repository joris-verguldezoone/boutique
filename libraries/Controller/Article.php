<?php

namespace Controller;

class Article{

    public function displayComposant(){
        $modelDisplay = new \Model\Article();
        $tab = $modelDisplay->findAllType();
var_dump($tab);

        foreach($tab as $value){
            
            echo $value[0]; // peut etre en hidden input
            echo $value[1];
            echo "<img src='$value[2]'>";  
        }
    }
    public function displayArticles(){
        $modelDisplay = new \Model\Article();
        $tab = $modelDisplay->findAllArticles();
        $i = 0; 
        foreach($tab as $value){
            
            echo $value[1]."<br />";; // peut etre en hidden input
            echo $value[2]."<br />";;
            echo $value[3]."<br />";;
            echo "<img src='$value[4]'>";
            echo "<img src='$value[5]'>";
            echo "<img src='$value[6]'>";
            echo $value[7]."<br />";;
            echo $value[8]."<br />";;
            echo $value[10]."<br />";;
            echo $value[11]."<br />";;
            echo $value[12]."<br />";;
            echo $value[13]."<br />";;
            echo $value[15]."<br />";;

        }
    }


}

?>