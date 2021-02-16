<?php

namespace Model;

require_once('Model.php');

class Admin extends Model{

    public function insertBrand($nom, $id_image, $description){
        $sql = "INSERT INTO marque (nom, id_image, description) VALUES (:nom , :id_image , :description) ";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindValue(':id_image',$id_image,\PDO::PARAM_INT);
        $result->bindValue(':description',$description,\PDO::PARAM_STR);
        $result->execute();
    }
    

}

?>