<?php

namespace Controller;

require_once('Controller.php');
class Admin extends Controller{

    public function verifyAndInsertOne($nomTable, $colonne, $value){
        $modelInsert = new \Model\Admin();
        $count = $modelInsert->alreadyTakenCheck($nomTable , $colonne, $value);
        if(!$count){

            $modelInsert->insertOneValue($nomTable, $colonne, $value);
        }else{
            echo "Cette donnée existe déjà";
        }

    }



}












?>