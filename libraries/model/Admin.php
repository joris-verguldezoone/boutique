<?php

namespace Model;

require_once('Model.php');

class Admin extends Model{

    public function insertBrand($nom, $image, $description){
        $sql = "INSERT INTO marque (nom, image, description) VALUES (:nom , :image , :description) ";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindValue(':image',$image,\PDO::PARAM_STR);
        $result->bindValue(':description',$description,\PDO::PARAM_STR);
        $result->execute();
    }
    public function insertEditor($nom, $image, $description){
        $sql = "INSERT INTO editeur (nom, image, description) VALUES (:nom , :image , :description) ";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindValue(':image',$image,\PDO::PARAM_STR);
        $result->bindValue(':description',$description,\PDO::PARAM_STR);
        $result->execute();
    }
    public function insertArticle($titre,$presentation,$description,$image,$image_2,$image_3,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation,$id_editeur)
    {
        
        $id_utilisateur = $_SESSION['utilisateur']['id'];
        $temps = time();
        $date = date('Y-m-d H:i:s', $temps);

        $sql = "INSERT INTO articles (titre ,presentation ,description ,image, image_2, image_3,prix ,id_utilisateur ,id_type ,id_gamme ,id_marque ,id_generation ,date, id_editeur ) 
                VALUES (:titre ,:presentation ,:description ,:image, :image_2 , :image_3, :prix ,:id_utilisateur ,:id_type ,:id_gamme,:id_marque ,:id_generation ,:date, :id_editeur)";

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
        $result->bindvalue(':id_editeur',$id_editeur,\PDO::PARAM_STR); //special
    
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
    public function updateUtilisateur($id,$nom,$prenom,$login,$email,$image,$id_droits,$anniversaire){
        $dateTime = new \DateTime();

        $dateTime = \DateTime::createFromFormat('d/m/Y', $anniversaire);
        // var_dump($anniversaire);

        // $tsAnniversaire = strtotime($anniversaire);
        
        // var_dump($tsAnniversaire);
        // $dateTime->format('Y-m-d');
	
        $sql = "UPDATE utilisateurs SET id = :id, nom = :nom, prenom = :prenom ,login = :login ,email = :email,image = :image,id_droits = :id_droits,anniversaire = :anniversaire WHERE id=:id";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id',$id,\PDO::PARAM_INT);
        $result->bindValue(':nom',$nom,\PDO::PARAM_STR);
        $result->bindValue(':prenom',$prenom,\PDO::PARAM_STR);
        $result->bindValue(':login',$login,\PDO::PARAM_STR);
        $result->bindValue(':email',$email,\PDO::PARAM_STR);
        $result->bindValue(':image',$image,\PDO::PARAM_STR);
        $result->bindValue(':id_droits',$id_droits,\PDO::PARAM_INT);
        $result->bindValue(':anniversaire',$anniversaire,\PDO::PARAM_STR);
        
        $result->execute();
    }
    public function modifyArticleAdmin($id,$titre, $presentation, $description, $image ,$image_2 ,$image_3, $note, $prix, $id_utilisateur, $id_type, $id_gamme, $id_marque, $id_generation ,$promo, $date , $vues ,$likey ,$id_editeur){
        
        $sql = "UPDATE articles SET titre = :titre, presentation= :presentation, description= :description, image = :image ,image_2 = :image_2
        ,image_3 = :image_3,note = :note, prix = :prix, id_utilisateur = :id_utilisateur, id_type = :id_type, id_gamme = :id_gamme,
        id_marque = :id_marque, id_generation = :id_generation , promo = :promo, date = :date , vues = :vues ,likey = :likey
        ,id_editeur = :id_editeur WHERE id = :id"; 
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id',$id,\PDO::PARAM_INT);
        $result->bindvalue(':titre',$titre,\PDO::PARAM_STR);
        $result->bindvalue(':presentation',$presentation,\PDO::PARAM_STR);
        $result->bindvalue(':description',$description,\PDO::PARAM_STR);
        $result->bindvalue(':image',$image,\PDO::PARAM_STR);
        $result->bindvalue(':image_2',$image_2,\PDO::PARAM_STR);
        $result->bindvalue(':image_3',$image_3,\PDO::PARAM_STR);
        $result->bindvalue(':note',$note,\PDO::PARAM_INT);
        $result->bindvalue(':prix',$prix,\PDO::PARAM_INT);
        $result->bindvalue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT); //special
        $result->bindvalue(':id_type',$id_type,\PDO::PARAM_INT);
        $result->bindvalue(':id_gamme',$id_gamme,\PDO::PARAM_INT);
        $result->bindvalue(':id_marque',$id_marque,\PDO::PARAM_INT);
        $result->bindvalue(':id_generation',$id_generation,\PDO::PARAM_INT);
        $result->bindvalue(':promo',$promo,\PDO::PARAM_INT);
        $result->bindvalue(':date',$date,\PDO::PARAM_STR); //special
        $result->bindvalue(':vues',$vues,\PDO::PARAM_INT); //special
        $result->bindvalue(':likey',$likey,\PDO::PARAM_STR); //special
        $result->bindvalue(':id_editeur',$id_editeur,\PDO::PARAM_INT); //special
        
        $result->execute();
    }




}

