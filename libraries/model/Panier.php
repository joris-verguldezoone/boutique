<?php

namespace Model;

require_once("Model.php");

class Panier extends Model {

    public function addElement($id_article,$id_utilisateur,$image_article,$titre, $prix){
       $sql = "INSERT INTO panier (id_article,id_utilisateur,image_article,titre,prix) VALUES (:id_article,:id_utilisateur,:image_article,:titre,:prix)";
       $result = $this->pdo->prepare($sql);
       $result->bindValue(':id_article',$id_article,\PDO::PARAM_INT);
       $result->bindValue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT);
       $result->bindValue(':image_article',$image_article,\PDO::PARAM_STR);
       $result->bindValue(':titre',$titre,\PDO::PARAM_STR);
       $result->bindValue(':prix',$prix,\PDO::PARAM_INT);

       $result->execute();

    //    $fetch = $this->selectAllWhere('panier','id_utilisateur',$_SESSION['utilisateur']['id']);
        // a faire plus tard si l'on veut faire un panier sans etre connecté 
    //    return $fetch;

    }

}

?>