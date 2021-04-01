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
            // var_dump($result);
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
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
            echo $tab[$i]['prix']."€<br />";  
            // echo $tab[$i]['date']."<br />";
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
                    echo "<span class='typo_comp'>". $tab[$i]['titre'] ."</span>";

            // echo "<p class='typo_comp'><u>".$titre."</u></p>";
                    echo "<img src='".$tab[$i]['image']."' class='dimension_image'>";
           
            // echo $value[2]."<br />";
            // echo $value[3]."<br />";
            // echo "<img src='$value[5]'>";
            // echo "<img src='$value[6]'>";
            // echo $value[7]."<br />";
            // echo $tab[$i]['note']."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
                    echo $tab[$i]['prix']."€<br />";  
            //        echo $tab[$i]['date']."<br />";
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
            // echo $tab[$i]['note']."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
            echo "<span class='prix_typo'>".$tab[$i]['prix']."€</span><br />";  
            //echo $tab[$i]['date']."</span><br />";
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
    public function DisplayOneArticle($id){
        $modelArticle = new \Model\Display();
        $tab = $modelArticle->selectOne('articles', '*', 'id' ,$id );
        $like = 0;
        if(isset($_SESSION['utilisateur']['id'])){

            $like = $modelArticle->detectLike($_SESSION['utilisateur']['id'],$id);
            $modelArticle = new \Model\Article();
            $modelArticle->IncrementView($id,$_SESSION['utilisateur']['id']);
        }
            if($like){

                $heartLike = 'far fa-heart';
            }else{
                
                $heartLike = 'fas fa-heart';
            }
        foreach($tab as $key => $value){
            //	id titre presentation description image  image_2 image_3 note prix id_utilisateur id_type  id_gamme  id_marque id_generation promo date 
            echo" <section class='main_article'> 
            
            <div class='box_article_titre'>
                <h1 class='titre_article'>".$value['titre']."</h1>
            </div>
            <div class='flex_presentation'>
                <div class='flex_box_image_article'>            
                    <img class='img_article_principale' src='".$value['image']."'>
                        <div class='img_flex_article'>
                            <picture class='picture_flex'>
                                <img class='img_article_secondaire' src='".$value['image_2']."'>            
                                <img class='img_article_secondaire' src='".$value['image_3']."'>
                            </picture>
                        </div>  
                </div>
            <div class='presention_prix_article'>
            <!-- faire une ancre pour le commentaire ? -->
                <p class='presentation_article'><a href='article.php?articleSelected=".$_GET['articleSelected']."&like='><i class='$heartLike'></i></a><br>".$value['presentation']."</p>
                <section class='prix_article'>
                <p class='box_prix_article_margin'>".$value['prix']."€</p>
                <form method='POST'>
                <button type='submit' id='ajoutPanier' name='ajoutPanier' value='".$value['id']."'><i class='fas fa-cart-plus'></i> Ajouter au panier</button>
                </form>
                <form method='POST'>
                <button type='submit' id='ajoutPanierDirectAchat' name='ajoutPanierDirectAchat' value='".$value['id']."'><i class='fas fa-cart-arrow-down'></i> Acheter</button>
                </form>
                </section>
            </div>
            </div>
            <div class='flex_presentation_description'>
            <p id='date_article'>Posté le ".$value['date']."</p>
                <h1 class='titre_article'>Description</h1>
                <p class='suite_presentation_article'>".$value['description']."</p>
            </div>
             </section>";
      
        }
    }
    public function displayAllArticles(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->selectAll('articles');
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
            // echo $tab[$i]['note']."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
            echo "<span class='prix_typo'>".$tab[$i]['prix']."€</span><br />";  
            // echo $tab[$i]['date']."</span><br />";
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
    public function displayArticleByType($id_type){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->selectAllWhereFetchAll('articles','id_type',$_GET['typeSelected']);
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
            // echo $tab[$i]['note']."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
            echo "<span class='prix_typo'>".$tab[$i]['prix']."€</span><br />";  
            // echo $tab[$i]['date']."</span><br />";
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
    //   public function showFivePopularArticles(){
    //     echo '<h1 id="titre_cate">Nos produits populaires</h2>
    //     <div class="flex_accueil">';

    //     $modelArticle = new \Model\Article();
    //     $tab = $modelArticle->findFivePopularArticles();
    //         foreach($tab as $key => $value)
    //     {
    //         echo"
    //         <div class='box_flex_accueil'>
    //         <span class='typo_comp_accueil'>".$value[1]."</span>
    //         <img class='second_img' src='".$value[4]."'>
    //         <p class='prix_accueil'>".$value[8]."€</p>
    //         </div>";
    //     }

    //     echo '</div>';
    // }
    public function showFivePopularArticles(){
        
        $modelArticle = new \Model\Article();
        $tab = $modelArticle->findFivePopularArticles();

        echo '<h1 id="titre_cate">Nos produits populaires</h2>
        <div class="flex_accueil">';
        $i = 0; 
        // var_dump($tab);
        foreach($tab as $key => $value)
        {             
                echo "<div class='box_flex_accueil'>";
                     echo "<form action='view/article.php' method='get' >";
                         echo "<button type='submit' class='button_accueil_article' name='articleSelected' value= '".$value[0]."'>";
                            echo "<p class='typo_comp'>". $value[1] ."<u></u></p>";
                            echo "<img src='".$value[4]."' class='dimension_image'>";
                            echo "<span class='prix_article_index'>".$value[8]."€</span><br />";  
                        echo "</button>";
                    echo "</form>";
                    echo '</div>';
                
       
                $i++;
            }
            echo '</div>';
        }

    
}