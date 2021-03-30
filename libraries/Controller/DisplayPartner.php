<?php
namespace Controller;

require_once('Controller.php');

class DisplayPartner extends Controller{


    public function displayAllBrand(){
        $model = new \Model\DisplayPartner();
        $tab = $model->selectAll('marque');
        // var_dump($tab);
        $i = 0; 
        
        $temp = 1; 
        echo '<section class="rowSection">';
        foreach($tab as $value){
            if($temp == 4){ //  ?a c'est le fun qui peut me test svp ??
                $temp = 1;
            }
            echo "
                    <form action='marque.php' method='get' class='form_article'>
                        <button type='submit' class='buttom_comp' name='marqueSelected' value= '".$tab[$i]['id']."'>
                            <img class='dimension_image' src='".$value['image']."'>
                            <span class='typo_comp'>".$value['nom']."</span>
                        </button>
                    </form>            
            
            ";
            if($temp % 3 === 0 ){
                echo '</section>';
                echo '<section  class="rowSection">';
            } 
            
            $temp++;
            $i++;
        }
    }



    public function displayAllEditeur(){
        $model = new \Model\DisplayPartner();
        $tab = $model->selectAll('editeur');
        // var_dump($tab);
        $i = 0; 
        
        $temp = 1; 
        echo '<section class="rowSection">';
        foreach($tab as $value){
            if($temp == 4){ //  ?a c'est le fun qui peut me test svp ??
                $temp = 1;
            }
            echo "
                    <form action='editeur.php' method='get' class='form_article'>
                        <button type='submit' class='buttom_comp' name='editorSelected' value= '".$tab[$i]['id']."'>
                            <img class='dimension_image' src='".$value['image']."'>
                            <span class='typo_comp'>".$value['nom']."</span>
                        </button>
                    </form>            
            
            ";
            if($temp % 3 === 0 ){
                echo '</section>';
                echo '<section  class="rowSection">';
            } 
            
            $temp++;
            $i++;
        }
    }

    public function DisplayOneBrand($id){
        $modelArticle = new \Model\Display();
        $tab = $modelArticle->selectOne('marque', '*', 'id' ,$id );
        
            $modelArticle = new \Model\Article();

        foreach($tab as $key => $value){
            echo" 
            <section>  
                <div class='box_article_titre'>
                    <h1 class='titre_article'>".$value['nom']."</h1>
                </div>
                <div class='flex_presentation'>
                    <div class='flex_box_image_article'>            
                        <img class='img_article_principale' src='".$value['image']."'>
                    </div>
                </div>
                <div class='flex_presentation_description'>
                    <h1 class='titre_article'>Description</h1>
                    <p class='suite_presentation_article'>".$value['description']."</p>
                </div>
            </section>";
        }
    }


    public function DisplayOneEditor($id){
        $modelArticle = new \Model\Display();
        $tab = $modelArticle->selectOne('editeur', '*', 'id' ,$id );
        
            $modelArticle = new \Model\Article();

        foreach($tab as $key => $value){
            echo" 
            <section>  
                <div class='box_article_titre'>
                    <h1 class='titre_article'>".$value['nom']."</h1>
                </div>
                <div class='flex_presentation'>
                    <div class='flex_box_image_article'>            
                        <img class='img_article_principale' src='".$value['image']."'>
                    </div>
                </div>
                <div class='flex_presentation_description'>
                    <h1 class='titre_article'>Description</h1>
                    <p class='suite_presentation_article'>".$value['description']."</p>
                </div>
            </section>";
        }
    }



}


?>