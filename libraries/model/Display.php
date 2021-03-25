<?php

namespace Model;

require_once("Model.php");

class Display extends Model{

    public function selectCheckBox($tab){
        if($tab != null){

            $in  = str_repeat('?,', count($tab) - 1) . '?';
            $sql = "SELECT * FROM articles WHERE id_generation IN ($in)";
            $result = $this->pdo->prepare($sql);
            $result->execute($tab);
            $data = $result->fetchAll();
    
            return $data;
        }
        else{
            return $data = "Ne correspond à aucun élément , il ne doit plus y avoir de stock ou l'article n'existe plus";
        }

        // $sql = "SELECT * FROM articles WHERE id_generation IN (?,?,?)";
        
        // $result = $this->pdo->prepare($sql);
        // $result->execute([$tab]);
    }

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
    public function findAllGamme(){
        $sql = "SELECT * FROM gamme";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['id_type']; 
            $tableau[$i][] = $fetch['id_marque'];     

            $i++;
        }
        return $tableau;
    }
    public function findAllGeneration(){
        $sql = "SELECT * FROM generation";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['id_type']; 
            $tableau[$i][] = $fetch['id_marque'];     

            $i++;
        }
        return $tableau;
    }
    public function findAllMarque(){
        $sql = "SELECT * FROM marque";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['image']; 
            $tableau[$i][] = $fetch['description'];     

            $i++;
        }
        return $tableau;
    }
    public function findAllEditeur(){
        $sql = "SELECT * FROM editeur";
        $result = $this->pdo->prepare($sql);
        $result->execute();
    
        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['image']; 
            $tableau[$i][] = $fetch['description'];     

            $i++;
        }
        
        return $tableau;
    }
    public function findAllArticles(){
        $sql = "SELECT * FROM articles ";
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
            $tableau[$i][] = $fetch['vues'];
            $tableau[$i][] = $fetch['likey'];
            $tableau[$i][] = $fetch['id_editeur'];

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

            $i++;
        }
        return $tableau;
     }










     
}



?>