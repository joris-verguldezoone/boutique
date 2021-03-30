<?php

namespace Controller;

require_once('Controller.php');

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
        echo "<div class='mise_en_page_panier'>
        <h2>Mon Panier</h2>";
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
    echo "</div>";
            
    
            
             // il faut incorporer le choix de l'adresse de paiement avant cette etape et 
                    // faire un récapitulatif de paiement et historique 
          
                    // ADRESSE 
        echo "<div class='adress_block'>";
          $controllerDisplayProfil = new \Controller\DisplayProfil();
          $controllerDisplayProfil->displayAdressPanier();
        echo "</div>";
        var_dump($_POST);
        
        // foreach($tab as $value){
        //     $id_utilisateur = $value['id_utilisateur'];
        //     $id_article = $value['id_article'];
        //     $image_article = $value['image_article'];
        //     $titre = $value['titre'];
        //     $prix = $value['prix'];
            
        //     $model->insertCommande($id_utilisateur, $id_article, $image_article, $titre, $prix, $_POST['profilAdressSelect']);
        echo "<span class='prix'>Montant Total:".$sumPrix."€</span>";


        if(isset($_POST['profilAdressSelect'])){
           
            echo "<form action='paiement.php' method='POST'>
            <button type='submit' class='paiement_button' id='prix' name='prix' value='".$sumPrix."'><span>Proceder au paiement</span></button>
            
            </form>";
            $_SESSION['adresseSelected'] = $_POST['profilAdressSelect'];

        }
        else{
           echo "
        <button type='submit' class='paiement_button_disabled' id='prix' name='prix' ><span>Proceder au paiement</span></button>";
        }

        echo "<p class='p_indication'>Veuillez choisir une adresse parmis celle(s) que vous avez renseigné</p>";
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