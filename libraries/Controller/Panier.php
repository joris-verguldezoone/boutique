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
    public function displayPanier($id_utilisateur){ // on display aussi la somme totale a payer
        $model = new \Model\Panier();
        $tab = $model->selectAllWhereFetchAll('panier','id_utilisateur',$id_utilisateur);
        echo "<table>";
        // $sumPrix = 0;
                // var_dump($tab);
            foreach($tab as $value){
                echo "  <tr>
                            <td><img class='img_panier' src='".$value['image_article']."'></td>
                            <td>".$value['titre']."</td>
                            <td>".$value['prix']."€</td>

                            <form action='' method='GET'>
                                <td><button type='submit' id='suppr_element_panier' name='suppr_element_panier' value='".$value['id']."'>Supprimer</button></td>
                            </form>
                        </tr>";
                        if(isset($_GET['suppr_element_panier'])){
                            $model->deleteOneWhereId('panier',$_GET['suppr_element_panier']);
                            $Http = new \http();
                            $Http->redirect('panier.php');
                        }
                        $controller = new \Controller\Panier();
                        $sumPrix = $controller->sumPrice($id_utilisateur); 
                        // $sumPrix += $int = intval($value['prix']);
                        
            }
            echo "</table>";
            echo "<span>Montant Total:".$sumPrix."€</span>";
            echo "Veuillez choisir une adresse parmis celle(s) que vous avez renseigné";
            $controllerProfil = new \Controller\Profil();
            $allAdresses = $controllerProfil->displayAdress($id_utilisateur);

            
            echo "<form action='paiement.php' method='POST'>
                    <button type='submit' id='prix' name='prix' value='".$sumPrix."'><span>Proceder au paiement</span></button>
                    
                    </form>"; // il faut incorporer le choix de l'adresse de paiement avant cette etape et 
                    // faire un récapitulatif de paiement et historique 
        
    }
    public function sumPrice($id_utilisateur){ // on fait une fonction a part pour la sécurité et double vérification du montant a payer 
        $model = new \Model\Panier();
        $tab = $model->selectAllWhereFetchAll('panier','id_utilisateur',$id_utilisateur);
        $sumPrix = 0;

        foreach($tab as $value){
            $sumPrix += $int = intval($value['prix']);
        }
        return $sumPrix;
    }

}



?>