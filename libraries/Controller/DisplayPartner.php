<?php
namespace Controller;

require_once('Controller.php');

class DisplayPartner extends Controller{


    public function displayAllBrand($id_brand){
        $model = new \Model\DisplayPartner();
        $tab = $model->selectAllWhereFetchAll('marque', 'id', $id_brand);
        var_dump($tab);
    }


    public function displayAllEditor($id_editor){
        $model = new \Model\DisplayPartner();
        
    }

    public function displayOneBrand($id_brand){
        $model = new \Model\DisplayPartner();
        $tab = $model->selectAllWhereFetchAll('marque', 'id', $id_brand);
        var_dump($tab);
    }


    public function displayOneEditor($id_editor){
        $model = new \Model\DisplayPartner();
        
    }


}


?>