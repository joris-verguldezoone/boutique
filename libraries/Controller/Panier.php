<?php

namespace Controller;

class Panier extends Controller{

    public function AddElement($id_article, $id_utilisateur){
        $model = new \Model\Panier();
        $article = $model->selectAllWhere('articles', 'id', $id_article);
        var_dump($article);
        $titre = $article['titre'];
        $image = $article['image'];
        $prix = $article['prix'];

        $panierEnCours = $model->addElement($id_article,$id_utilisateur,$image,$titre, $prix);
  
        // $_SESSION['panier'][] = $panierEnCours; 

    }

}



?>