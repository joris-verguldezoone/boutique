<?php
namespace Controller;

require_once('Controller.php');

class DisplayArticle extends Controller{
    public function transitOneColumn($tab_form){
        $tab = array();
                                
        foreach($tab_form as $value){
            array_push($tab, $value);
            $key = array_search($tab_form['search_GC'], $tab);
            if (false !== $key) { // permet d'enlever la valeur de $_GET['search_GC'] qui renvoit les valeurs mal configurés (id = 0 en sql) et les affichaient par erreur
                unset($tab[$key]);
            }
        }

        $checkBoxSearch = new \Model\Display();
        $result = $checkBoxSearch->selectCheckBox($tab);
        if($result != "Ne correspond à aucun élément , il ne doit plus y avoir de stock ou l'article n'existe plus"){
            $this->displayArticlesByTab($result);
            var_dump($result);
        }
        elseif($result == "Ne correspond à aucun élément , il ne doit plus y avoir de stock ou l'article n'existe plus"){
            echo "Ne correspond à aucun élément , il ne doit plus y avoir de stock ou l'article n'existe plus";
        }

        return $result;
    }
    public function displayArticlesByTab($tab){
        
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
    public function displayArticlesByTypeAndBrandOrGamme($colonne,$colonne2,$value1,$value2){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->FetchAllselectAllWhereTypeAndBrandOrGamme($colonne,$colonne2,$value1,$value2);
        // var_dump($tab);
        $i = 0; 
        var_dump($tab);
        
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