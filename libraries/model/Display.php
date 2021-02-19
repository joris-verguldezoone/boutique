<?php

namespace Model;

require_once("Model.php");

class Display extends Model{

    public function findAllType(){
        $sql = "SELECT * FROM type";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['image'];     
            $i++;
        }
        return $tableau;
    }
    public function findAllArticles(){
        $sql = "SELECT * FROM articles";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['titre'];
            $tableau[$i][] = $fetch['presentation'];
            $tableau[$i][] = $fetch['description'];
            $tableau[$i][] = $fetch['image'];
            $tableau[$i][] = $fetch['image_2'];
            $tableau[$i][] = $fetch['image_3'];
            $tableau[$i][] = $fetch['note'];
            $tableau[$i][] = $fetch['prix'];
            $tableau[$i][] = $fetch['id_utilisateur'];
            $tableau[$i][] = $fetch['id_type'];
            $tableau[$i][] = $fetch['id_gamme'];
            $tableau[$i][] = $fetch['id_marque'];
            $tableau[$i][] = $fetch['id_generation'];
            $tableau[$i][] = $fetch['promo'];
            $tableau[$i][] = $fetch['date'];

            $i++;
        }
        return $tableau;
    }
    public function findAllUsers(){
     
        $sql= "SELECT * FROM utilisateurs";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i=0;   
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
         $tableau[$i][] = $fetch['id'];
         $tableau[$i][] = $fetch['nom'];
         $tableau[$i][] = $fetch['prenom'];
         $tableau[$i][] = $fetch['login'];
         $tableau[$i][] = $fetch['email'];
         $tableau[$i][] = $fetch['password'];
         $tableau[$i][] = $fetch['image'];
         $tableau[$i][] = $fetch['id_droits'];
         $tableau[$i][] = $fetch['anniversaire'];
         $tableau[$i][] = $fetch['id_adresse'];
        }
        return $tableau;
     }
}



?>