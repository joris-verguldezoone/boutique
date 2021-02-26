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
    public function insertArticle($titre,$presentation,$description,$image,$image_2,$image_3,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation)
    {
        
        $id_utilisateur = $_SESSION['utilisateur']['id'];
        $temps = time();
        $date = date('Y-m-d H:i:s', $temps);
        $sql = "INSERT INTO articles (titre ,presentation ,description ,image, image_2, image_3,prix ,id_utilisateur ,id_type ,id_gamme ,id_marque ,id_generation ,date ) VALUES (:titre ,:presentation ,:description ,:image, :image_2 , :image_3, :prix ,:id_utilisateur ,:id_type ,:id_gamme,:id_marque ,:id_generation ,:date)";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':titre',$titre,\PDO::PARAM_STR);
        $result->bindvalue(':presentation',$presentation,\PDO::PARAM_STR);
        $result->bindvalue(':description',$description,\PDO::PARAM_STR);
        $result->bindvalue(':image',$image,\PDO::PARAM_STR);
        $result->bindvalue(':image_2',$image_2,\PDO::PARAM_STR);
        $result->bindvalue(':image_3',$image_3,\PDO::PARAM_STR);
        $result->bindvalue(':prix',$prix,\PDO::PARAM_INT);
        $result->bindvalue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT); //special
        $result->bindvalue(':id_type',$id_type,\PDO::PARAM_INT);
        $result->bindvalue(':id_gamme',$id_gamme,\PDO::PARAM_INT);
        $result->bindvalue(':id_marque',$id_marque,\PDO::PARAM_INT);
        $result->bindvalue(':id_generation',$id_generation,\PDO::PARAM_INT);
        $result->bindvalue(':date',$date,\PDO::PARAM_STR); //special
    
        $result->execute();
    }
    public function typeUpdate($id,$nom,$img){
        $sql = "UPDATE type SET nom =:nom, image =:img WHERE id =:id";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':id',$id,\PDO::PARAM_INT);
        $result->bindvalue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindvalue(':img',$img,\PDO::PARAM_STR);
        
        $result->execute();
        
    }
    public function updateUtilisateur($id,$nom,$prenom,$login,$email,$image,$id_droits,$anniversaire,$id_adresse){
        $dateTime = new \DateTime();

        $dateTime = \DateTime::createFromFormat('d/m/Y', $anniversaire);
        // var_dump($anniversaire);

        // $tsAnniversaire = strtotime($anniversaire);
        
        // var_dump($tsAnniversaire);
        // $dateTime->format('Y-m-d');
	
        $sql = "UPDATE utilisateurs SET id = :id, nom = :nom, prenom = :prenom ,login = :login ,email = :email,image = :image,id_droits = :id_droits,anniversaire = :anniversaire,id_adresse = :id_adresse WHERE id=:id";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id',$id,\PDO::PARAM_INT);
        $result->bindValue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindValue(':prenom',$prenom,\PDO::PARAM_STR);
        $result->bindValue(':login',$login,\PDO::PARAM_STR);
        $result->bindValue(':email',$email,\PDO::PARAM_STR);
        $result->bindValue(':image',$image,\PDO::PARAM_STR);
        $result->bindValue(':id_droits',$id_droits,\PDO::PARAM_INT);
        $result->bindValue(':anniversaire',$anniversaire,\PDO::PARAM_STR);
        $result->bindValue(':id_adresse',$id_droits,\PDO::PARAM_INT);
        
        $result->execute();
    
    }




}

