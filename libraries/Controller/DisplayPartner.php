<?php
namespace Controller;

require_once('Controller.php');

class DisplayPartner extends Controller{

    public function displayBrand($id_brand){
        $model = new \Model\DisplayPartner();
        $tab = $model->selectAllWhereFetchAll('marque', 'id', $id_brand);
        var_dump($tab);
    }


    public function displayEditor($id_editor){
        $model = new \Model\DisplayPartner();
        
    }

}


?>