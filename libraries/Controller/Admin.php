<?php

namespace Controller;

require_once('Controller.php');
class Admin extends Controller{

    public function verifyAndInsertOne($nomTable, $colonne, $value){
        $modelAdmin = new \Model\Admin();
        $count = $modelAdmin->alreadyTakenCheck($nomTable , $colonne, $value);
        if(!$count){
            $modelAdmin->insertOneValue($nomTable, $colonne, $value);
        }else{
            echo "Cette donnée existe déjà";
        }
    }
    public function verifyAndInsertTwo($nomTable, $colonne,$colonne2, $value, $value2){
        $modelAdmin = new \Model\Admin();
        
        $count = $modelAdmin->alreadyTakenCheck($nomTable , $colonne, $value);
        if(!$count){
            $modelAdmin->insertTwoValue($nomTable, $colonne,$colonne2, $value,$value2);
        }else{
            echo "Cette donnée existe déjà";
        }
    }
    public function verifyAndInsertThree($nomTable, $colonne1,$colonne2,$colonne3,$value1, $value2, $value3){
        $modelAdmin = new \Model\Admin();
        
        $count = $modelAdmin->alreadyTakenCheck($nomTable , $colonne1, $value1);
        if(!$count){
            $modelAdmin->insertThreeValue($nomTable, $colonne1, $colonne2, $colonne3, $value1, $value2, $value3);
        }else{
            echo "Cette donnée existe déjà";
        }
    }
    public function verifyAndInsertFour($nomTable, $colonne1,$colonne2,$colonne3,$colonne4,$value1, $value2, $value3,$value4){
        $modelAdmin = new \Model\Admin();
        
        $count = $modelAdmin->alreadyTakenCheck($nomTable , $colonne1, $value1);
        if(!$count){
            $modelAdmin->insertTwoValue($nomTable, $colonne1,$colonne2,$colonne3,$colonne4,$value1, $value2, $value3,$value4);
        }else{
            echo "Cette donnée existe déjà";
        }
    }
    public function createWithThreeValues($nomTable,$colonne1,$colonne2,$colonne3, $nom, $id_type, $id_marque)
    {
        echo "<br/>".$nomTable."<br />";
        echo $colonne1."<br />";
        echo $colonne2."<br />";
        echo $colonne3."<br />";
        echo $nom."<br />";
        echo $id_type."<br />";
        echo $id_marque."<br />";

        $modelAdmin = new \Model\Admin();
        $count = $modelAdmin->alreadyTakenCheck($nomTable , "nom", $nom);
        echo 'test'.$count.'test';
        if(!$count)
        {
            $modelAdmin->insertThreeValue($nomTable,$colonne1,$colonne2,$colonne3, $nom, $id_type, $id_marque);
        }
        else
        {
            echo 'wrrronggg uuhhg';
        }
    }
        public function createWithFourValues($nomTable,$colonne1,$colonne2,$colonne3, $colonne4, $nom, $id_type, $id_marque, $id_editeur)
    {
        $modelAdmin = new \Model\Admin();
        $count = $modelAdmin->alreadyTakenCheck($nomTable , "nom", $nom);
        echo $count.'test';
        if(!$count)
        {
            $modelAdmin->insertThreeValue($nomTable,$colonne1,$colonne2,$colonne3, $colonne4, $nom, $id_type, $id_marque, $id_editeur);
        }
        else
        {
            echo 'wrrronggg uuhhg';
        }
    }
    public function createArticle($titre,$presentation,$description,$image,$image_2,$image_3,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation, $id_editeur)
    {    
        $controllerAdmin = new \Controller\Admin();
        $titre = $controllerAdmin->secure($titre);
        $presentation = $controllerAdmin->secure($presentation);
        $description = $controllerAdmin->secure($description);
        $image = $controllerAdmin->secure($image);
        $image_2 = $controllerAdmin->secure($image_2);
        $image_3 = $controllerAdmin->secure($image_3);

        $prix = $controllerAdmin->secure($prix);
        $id_utilisateur = $controllerAdmin->secure($id_utilisateur);
        $id_type = $controllerAdmin->secure($id_type);
        $id_gamme = $controllerAdmin->secure($id_gamme);
        $id_marque = $controllerAdmin->secure($id_marque);
        $id_generation = $controllerAdmin->secure($id_generation);
        $id_editeur = $controllerAdmin->secure($id_editeur);
        
        if(!empty($titre) && !empty($presentation) && !empty($description) && !empty($image) && !empty($prix) && !empty($id_type)){
            
            $titre_len = strlen($titre);
            $description_len = strlen($description);
            $image_len = strlen($image);
            $image_2_len = strlen($image_2);
            $image_3_len = strlen($image_3);
            echo 'passed';
            if(($titre_len >= 0) && ($description_len >= 0) && ($image_len >= 0)){
                if(($titre_len <= 50) && ($description_len <= 3000) && ($image_len <= 255) && ($image_2_len <= 255) && ($image_3_len <= 255)){
                    $modelAdmin = new \Model\Admin();
                    if(empty($image_2)){
                        $image_2 = self::DEFAULT_PRODUCT_IMAGE;
                    }
                    if(empty($image_3)){
                        $image_3 = self::DEFAULT_PRODUCT_IMAGE;
                    }
                    $modelAdmin->insertArticle($titre,$presentation,$description,$image,$image_2,$image_3,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation, $id_editeur);
                    echo 'controller passed';
                }
                else{
                    $errorLog = "Titre 50 caractere maximum, description 3000, image 255";
                }
            }
            else $errorLog = "Titre 3 caracteres minimum, description 25, image 5";
        }
        else $errorLog = "Veuillez entrer des caracteres dans les champs";
    }    
}














?>