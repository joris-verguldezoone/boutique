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
            echo 'fuck';
        }
    }
}













?>