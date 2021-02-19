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
    public function displaySelect($nomTable){
        $modelAdmin = new \Model\Admin();
       $tab = $modelAdmin->selectAllNom($nomTable);
        var_dump($tab);
        $i = 0;
        foreach($tab as $key => $value)
       {
        echo "<option value='".$value[0]."'>".$value[1]."</option>";
       }
    }
    public function createBrand($nom, $id_image, $description){
        $modelAdmin = new \Model\Admin();
        $count = $modelAdmin->alreadyTakenCheck("marque" , "nom", $nom);
        if(!$count){
            $modelAdmin->insertBrand($nom, $id_image,$description);

        }else{
            echo "Cette donnée existe déjà";
        }
    }
    public function createWithThreeValues($nomTable, $nom, $id_type, $id_marque)
    {
        $modelAdmin = new \Model\Admin();
        $count = $modelAdmin->alreadyTakenCheck($nomTable , "nom", $nom);
        echo $count.'test';
        if(!$count)
        {
            $modelAdmin->insertThreeValue($nomTable,'nom','id_type','id_marque', $nom, $id_type, $id_marque);
        }
        else
        {
            echo 'wrrronggg uuhhg';
        }
// 	titre1	description2	image3	note	prix4	id_type5	id_gamme6	id_marque7	id_generation8	promo	date9
    }
    public function createArticle($titre,$presentation,$description,$image,$image_2,$image_3,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation)
    {    
        $controllerAdmin = new \Controller\Admin();
        $titre = $controllerAdmin->secure($titre);
        $presentation = $controllerAdmin->secure($presentation);
        $description = $controllerAdmin->secure($description);
        $image = $controllerAdmin->secure($image);
        $prix = $controllerAdmin->secure($titre);
        $id_utilisateur = $controllerAdmin->secure($titre);
        $id_type = $controllerAdmin->secure($titre);
        $id_gamme = $controllerAdmin->secure($titre);
        $id_marque = $controllerAdmin->secure($titre);
        $id_generation = $controllerAdmin->secure($titre);
        if(!empty($titre) && !empty($presentation) && !empty($description) && !empty($image) && !empty($prix) && !empty($id_type)){
$titre_len = strlen($titre);
            $description_len = strlen($description);
            $image_len = strlen($image);
            echo 'passed';
            if(($titre_len >= 0) && ($description >= 0) && ($image_len >= 0)){
                if(($titre_len <= 50) && ($description <= 3000) && ($image_len <= 255)){
                    $modelAdmin = new \Model\Admin();
                    $modelAdmin->insertArticle($titre,$presentation,$description,$image,$image_2,$image_3,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation);
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