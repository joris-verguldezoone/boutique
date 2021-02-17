<?php

namespace Model;

require_once('Model.php');

class Admin extends Model{

    public function insertBrand($nom, $image, $description){
        $sql = "INSERT INTO marque (nom, image, description) VALUES (:nom , :image , :description) ";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindValue(':image',$image,\PDO::PARAM_INT);
        $result->bindValue(':description',$description,\PDO::PARAM_STR);
        $result->execute();
    }
    public function insertArticle($titre,$presentation,$description,$image,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation)
    {
        
        $id_utilisateur = $_SESSION['utilisateur']['id'];
        $temps = time();
        $date = date('Y-m-d H:i:s', $temps);
        $sql = "INSERT INTO articles (titre ,presentation ,description ,image ,prix ,id_utilisateur ,id_type ,id_gamme ,id_marque ,id_generation ,date ) VALUES (:titre ,:presentation ,:description ,:image,:prix ,:id_utilisateur ,:id_type ,:id_gamme,:id_marque ,:id_generation ,:date)";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':titre',$titre,\PDO::PARAM_STR);
        $result->bindvalue(':presentation',$presentation,\PDO::PARAM_STR);
        $result->bindvalue(':description',$description,\PDO::PARAM_STR);
        $result->bindvalue(':image',$image,\PDO::PARAM_STR);
        $result->bindvalue(':prix',$prix,\PDO::PARAM_INT);
        $result->bindvalue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT); //special
        $result->bindvalue(':id_type',$id_type,\PDO::PARAM_INT);
        $result->bindvalue(':id_gamme',$id_gamme,\PDO::PARAM_INT);
        $result->bindvalue(':id_marque',$id_marque,\PDO::PARAM_INT);
        $result->bindvalue(':id_generation',$id_generation,\PDO::PARAM_INT);
        $result->bindvalue(':date',$date,\PDO::PARAM_STR); //special
        var_dump($sql);
        var_dump($result);
        $result->execute();
        // while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){

        //     $tableau[$i][] = $fetch['titre'];
        //     $tableau[$i][] = $fetch['presentation'];
        //     $tableau[$i][] = $fetch['description'];
        //     $tableau[$i][] = $fetch['image'];
        //     $tableau[$i][] = $fetch['prix'];
        //     $tableau[$i][] = $fetch['id_utilisateur'];
        //     $tableau[$i][] = $fetch['id_type'];
        //     $tableau[$i][] = $fetch['id_gamme'];
        //     $tableau[$i][] = $fetch['id_marque'];
        //     $tableau[$i][] = $fetch['id_generation'];
        //     $tableau[$i][] = $fetch['date'];

        //     $i++;
            
        // }
        // return $tableau;
    }

    // public function kk($nom){
    //     $sql = "SELECT image FROM marque WHERE nom = '$nom'";
    //     $result = $this->pdo->prepare($sql);
    //     $result->bindValue(':nom',$nom ,\PDO::PARAM_STR);
    //     $result->execute();

    //     $fetch = $result->fetch(\PDO::FETCH_ASSOC);
    //     return $fetch;

    // }

}

