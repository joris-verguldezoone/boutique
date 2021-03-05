<?php
namespace Controller;

require_once('Controller.php');

class DisplayArticle extends Controller{

    public function transfertID($nomTable) // pour tricher pcq le header autogénéré fallait y penser à la conception de la bdd s/o les sous categories(gammes)
    { // cette fonction sert à ne pas utiliser directement le model dans la view 
        $model = new \Model\Display();
       $all_ID = $model->selectOneColumn($nomTable,'id'); 

       return $all_ID;
    }
    public function displayArticlesBy($get, $column){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->FetchAllselectAllWhere('articles' , $column , $get);
        // var_dump($tab);
        $i = 0; 
        // var_dump($tab);
        
        $temp = 1; 
        echo '<section class="rowSection">';
        foreach($tab as $value){
            if($temp == 4){ //  ?a c'est le fun qui peut me test svp ??
                $temp = 1;
            }
            echo "<form action='article.php' method='get' class='form_article'>";
            echo "<button type='submit' class='buttom_comp' name='articleSelected' value= '".$tab[$i]['id']."'>";
          
               
            
                echo "<p class='typo_comp'>". $tab[$i]['titre'] ."<u></u></p>";

            // echo "<p class='typo_comp'><u>".$titre."</u></p>";
                echo "<img src='".$tab[$i]['image']."' class='dimension_image'>";
           
            // echo $value[2]."<br />";
            // echo $value[3]."<br />";
            // echo "<img src='$value[5]'>";
            // echo "<img src='$value[6]'>";
            // echo $value[7]."<br />";
            echo $tab[$i]['note']."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
            echo $tab[$i]['prix']."€<br />";  
            echo $tab[$i]['date']."<br />";
            echo "</button>";
            echo "</form>";
            
            if($temp % 3 === 0 ){
                echo '</section>';
                echo '<section  class="rowSection">';
            } 
            
            $temp++;
            $i++;
        }

    }
}