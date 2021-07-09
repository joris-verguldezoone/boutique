<?php

namespace Controller;

require_once('Controller.php');

class DisplayProfil extends Controller
{

    public function displayAdress()
    {
        $newUserModel = new \Model\Profil();
        $ControllerProfil = new \Controller\Profil();
        if (isset($_SESSION['utilisateur'])) {

            $id_utilisateur = $_SESSION['utilisateur']['id'];
            $rowCount = $newUserModel->rowCount('adresse', 'id_utilisateur', $id_utilisateur);
            $rowCount = intval($rowCount[0]['COUNT(*)']);
        }
        if (isset($_SESSION['user'])) {
            $id_utilisateur = $_SESSION['user']['sub'];
            $rowCount = $newUserModel->rowCount('adresse', 'id_utilisateur', $id_utilisateur);
            $rowCount = intval($rowCount[0]['COUNT(*)']);
        }
        $rowCount = $newUserModel->rowCount('adresse', 'id_utilisateur', $id_utilisateur);
        $rowCount = intval($rowCount[0]['COUNT(*)']);

        if ($rowCount <= 3) {
            echo '
          <section class="adressMenuBlock">
        <form class="block" method="POST" action="profil.php">
        <h3>Mon adresse</h3>
        <div class="profil_newAdress_flexRow">
        <div class="profil_newAdress_flexColumn">
            <label for="nom" class="">Nom</label>
                <input type="text" id="AdresseNom" name="nom" ><br>
        </div>
        <div class="profil_newAdress_flexColumn">
            <label for="prenom" > Prenom </label>
                <input type="text" id="AdressePrenom" name="prenom"><br>
        </div>
        </div>
        <div class="profil_newAdress_flexColumn">
        <label for="rue" >Rue </label>
            <input type="text" id="AdresseRue" name="rue"><br>
        </div>
        <div class="profil_newAdress_flexColumn">
            <label for="batiment" > Batiment </label>
                <input type="text" id="AdresseBatiment" name="batiment"><br>
        </div>
        <div class="profil_newAdress_flexRow">
        <div class="profil_newAdress_flexColumn">
            <label for="code_postal"> Code Postal </label>
                <input type="text" id="AdresseCodePostal" name="code_postal" ><br>
        </div>
        <div class="profil_newAdress_flexColumn">
            <label for="ville"> Ville </label>
                <input type="text" id="AdresseVille" name="ville"><br>
        </div>
        </div>
        <div class="profil_newAdress_flexRow">
        <div class="profil_newAdress_flexColumn">
            <label for="pays"> Pays </label>
                <input type="text" id="AdressePays" name="pays"><br>
        </div>
        <div class="profil_newAdress_flexColumn">
            <label for="info_sup"> Informations supp </label>
                <input type="text" id="AdresseInfoSup" name="info_sup"><br>
        </div>
        </div>
        <div class="profil_newAdress_flexColumn">
            <label for="telephone"> Téléphone </label>
                <input type="tel" id="AdresseTelephone" name="telephone" ><br>
        </div>
        <div class="button_center_profil">
                <input type="submit" id="profilSubmit" value="Créer" name="insertAdress">
        </div>
        </form>
        </section>
        </article>
        ';
        }
        if ($rowCount >= 1) {
            $fetchAdress = $newUserModel->fetchAdress();
            echo '<section class="btn_display_adress_flex">
        <div class="test">';
            $i = 0;
            $a = 0;
            foreach ($fetchAdress as $value) {
                $a++;
                echo '<form method="GET" action="">
                <button name="' . $value[0] . '" class="button_display_adress" type="submit">Modifier adresse N°' . $a . '</button>
        </form>';
            }


            echo '</div>';
            foreach ($fetchAdress as $value) {
                $i++;
                echo '<div class="test2">';


                if (isset($_GET[$value[0]])) {
                    echo '
          <section class="adressMenuBlock">
              <form class="block" method="POST" action="profil.php">
              <h3>Adresse N°' . $i . '</h3>
              <article>
              <div class="profil_newAdress_flexColumn">
              </div>
              <div class="profil_newAdress_flexRow">
              <div class="profil_newAdress_flexColumn">
                  <label for="nom" class="">Nom</label>
                      <input type="text" id="AdresseNom" name="nom" value="' . $value[2] . '" ><br>
                    </div>
                      <div class="profil_newAdress_flexColumn">  
                      <label for="prenom" > Prenom </label>
                      <input type="text" id="AdressePrenom" name="prenom" value="' . $value[3] . '" ><br>
                    </div>
                    </div>             
                    <div class="profil_newAdress_flexColumn">
                  <label for="rue" >Rue </label>
                      <input type="text" id="AdresseRue" name="rue" value="' . $value[5] . '"><br>
                  </div>
                  <div class="profil_newAdress_flexColumn">
                  <label for="batiment" > Batiment </label>
                      <input type="text" id="AdresseBatiment" name="batiment" value="' . $value[4] . '"><br>
                    </div> 
                  <div class="profil_newAdress_flexRow">
                  <div class="profil_newAdress_flexColumn">
                  <label for="code_postal"> Code Postal </label>
                      <input type="tel" id="AdresseCodePostal" name="code_postal" value="' . $value[6] . '" ><br>
                  </div>
                  <div class="profil_newAdress_flexColumn">
                  <label for="ville"> Ville </label>
                      <input type="text" id="AdresseVille" name="ville" value="' . $value[7] . '"><br>
                      </div>
                      </div>
                      <div class="profil_newAdress_flexRow">
                      <div class="profil_newAdress_flexColumn">
                  <label for="pays"> Pays </label>
                      <input type="text" id="AdressePays" name="pays" value="' . $value[8] . '"><br>
                      </div>
                      <div class="profil_newAdress_flexColumn">
                  <label for="info_sup"> Informations supp </label>
                      <input type="text" id="AdresseInfoSup" name="info_sup" value="' . $value[9] . '"><br>
                        </div>
                        </div>
                        <div class="profil_newAdress_flexColumn">
                      <label for="telephone"> Téléphone </label>
                      <input type="tel" id="AdresseTelephone" name="telephone" value="' . $value[10] . '" ><br>
                      </div>
              <div class="button_center_profil">
              <button type="submit" id="modifierAdressForm" value="' . $value[0] . '" name="profilAdressModify">Modifier</button>
              <button type="submit" id="profilAdressDelete" value="' . $value[0] . '" name="profilAdressDelete">Supprimer</button>

              </div>
              </article>
              </form>
          </section>
          </section>
          ';
                }
                // $nom, $prenom, $batiment, $rue, $code_postal, $pays, $ville, $info_sup, $tel
                echo '</div>';
                if (isset($_POST['profilAdressModify'])) {
                    $newUserModel->updateAdresse($_POST['nom'], $_POST['prenom'], $_POST['batiment'], $_POST['rue'], $_POST['code_postal'], $_POST['ville'], $_POST['pays'], $_POST['info_sup'], $_POST['telephone'], $_POST['profilAdressModify']);
                    echo $_POST['nom'] . '<br />', $_POST['prenom'] . '<br />', $_POST['batiment'] . '<br />', $_POST['rue'] . '<br />', $_POST['code_postal'] . '<br />', $_POST['ville'] . '<br />', $_POST['pays'] . '<br />', $_POST['info_sup'] . '<br />', $_POST['telephone'] . '<br />', $_POST['profilAdressModify'] . '<br />';
                }
                if (isset($_POST['profilAdressDelete'])) {
                    $newUserModel->deleteOneWhereId('adresse', $_POST['profilAdressDelete']);
                }
            }
        }
        if (isset($_POST['insertAdress'])) {
            // $newUserController->adresseInsertVerif
            $ControllerProfil->createAdresse($_POST['nom'], $_POST['prenom'], $_POST['batiment'], $_POST['rue'], $_POST['code_postal'], $_POST['ville'], $_POST['pays'], $_POST['info_sup'], $_POST['telephone']);
        }
    }

    public function displayAdressPanier()
    {
        $newUserModel = new \Model\Profil();
        $ControllerProfil = new \Controller\Profil();

        if (isset($_SESSION['utilisateur'])) {

            $id_utilisateur = $_SESSION['utilisateur']['id'];
            $rowCount = $newUserModel->rowCount('adresse', 'id_utilisateur', $id_utilisateur);
        }
        if (isset($_SESSION['user'])) {
            $id_utilisateur = $_SESSION['user']['sub'];
            $rowCount = $newUserModel->rowCount('adresse', 'id_utilisateur', $id_utilisateur);
        }
        $rowCount = intval($rowCount[0]['COUNT(*)']);

        if ($rowCount <= 3) {
            echo "<div class='adress_block'>";

            echo '
            
            <section class="adressMenuBlock">
          <form class="block" method="POST" action="profil.php">
          <h3>Mon adresse</h3>
          <div class="profil_newAdress_flexRow">
          <div class="profil_newAdress_flexColumn">
              <label for="nom" class="">Nom</label>
                  <input type="text" id="AdresseNom" name="nom" ><br>
          </div>
          <div class="profil_newAdress_flexColumn">
              <label for="prenom" > Prenom </label>
                  <input type="text" id="AdressePrenom" name="prenom"><br>
          </div>
          </div>
          <div class="profil_newAdress_flexColumn">
          <label for="rue" >Rue </label>
              <input type="text" id="AdresseRue" name="rue"><br>
          </div>
          <div class="profil_newAdress_flexColumn">
              <label for="batiment" > Batiment </label>
                  <input type="text" id="AdresseBatiment" name="batiment"><br>
          </div>
          <div class="profil_newAdress_flexRow">
          <div class="profil_newAdress_flexColumn">
              <label for="code_postal"> Code Postal </label>
                  <input type="text" id="AdresseCodePostal" name="code_postal" ><br>
          </div>
          <div class="profil_newAdress_flexColumn">
              <label for="ville"> Ville </label>
                  <input type="text" id="AdresseVille" name="ville"><br>
          </div>
          </div>
          <div class="profil_newAdress_flexRow">
          <div class="profil_newAdress_flexColumn">
              <label for="pays"> Pays </label>
                  <input type="text" id="AdressePays" name="pays"><br>
          </div>
          <div class="profil_newAdress_flexColumn">
              <label for="info_sup"> Informations supp </label>
                  <input type="text" id="AdresseInfoSup" name="info_sup"><br>
          </div>
          </div>
          <div class="profil_newAdress_flexColumn">
              <label for="telephone"> Téléphone </label>
                  <input type="tel" id="AdresseTelephone" name="telephone" ><br>
          </div>
          <div class="button_center_profil">
                  <input type="submit" id="profilSubmit" value="Créer" name="insertAdress">
          </div>
          </form>
          </section>
          </article>
          ';
        }
        if ($rowCount >= 1) {
            $fetchAdress = $newUserModel->fetchAdress();
            echo '<section class="btn_display_adress_flex">
          <div class="test">';
            $i = 0;
            $a = 0;
            foreach ($fetchAdress as $value) {
                $a++;
                echo '<form method="GET" action="">
                  <button name="' . $value[0] . '" class="button_display_adress" type="submit">Selectionner l adresse N°' . $a . '</button>
          </form>';
            }


            echo '</div>';
            foreach ($fetchAdress as $value) {
                $i++;
                echo '<div class="paiement">';


                if (isset($_GET[$value[0]])) {
                    echo '
            <section class="adressMenuBlock">
                <form class="block" method="POST" action="panier.php">
                <h3>Adresse N°' . $i . '</h3>
                <article>
                <div class="profil_newAdress_flexColumn">
                </div>
                <div class="profil_newAdress_flexRow">
                <div class="profil_newAdress_flexColumn">
                    <label for="nom" class="">Nom</label>
                        <input type="text" id="AdresseNom" name="nom" value="' . $value[2] . '" ><br>
                      </div>
                        <div class="profil_newAdress_flexColumn">  
                        <label for="prenom" > Prenom </label>
                        <input type="text" id="AdressePrenom" name="prenom" value="' . $value[3] . '" ><br>
                      </div>
                      </div>             
                      <div class="profil_newAdress_flexColumn">
                    <label for="rue" >Rue </label>
                        <input type="text" id="AdresseRue" name="rue" value="' . $value[5] . '"><br>
                    </div>
                    <div class="profil_newAdress_flexColumn">
                    <label for="batiment" > Batiment </label>
                        <input type="text" id="AdresseBatiment" name="batiment" value="' . $value[4] . '"><br>
                      </div> 
                    <div class="profil_newAdress_flexRow">
                    <div class="profil_newAdress_flexColumn">
                    <label for="code_postal"> Code Postal </label>
                        <input type="tel" id="AdresseCodePostal" name="code_postal" value="' . $value[6] . '" ><br>
                    </div>
                    <div class="profil_newAdress_flexColumn">
                    <label for="ville"> Ville </label>
                        <input type="text" id="AdresseVille" name="ville" value="' . $value[7] . '"><br>
                        </div>
                        </div>
                        <div class="profil_newAdress_flexRow">
                        <div class="profil_newAdress_flexColumn">
                    <label for="pays"> Pays </label>
                        <input type="text" id="AdressePays" name="pays" value="' . $value[8] . '"><br>
                        </div>
                        <div class="profil_newAdress_flexColumn">
                    <label for="info_sup"> Informations supp </label>
                        <input type="text" id="AdresseInfoSup" name="info_sup" value="' . $value[9] . '"><br>
                          </div>
                          </div>
                          <div class="profil_newAdress_flexColumn">
                        <label for="telephone"> Téléphone </label>
                        <input type="tel" id="AdresseTelephone" name="telephone" value="' . $value[10] . '" ><br>
                        </div>
                <div class="button_center_profil">
  
              <button type="submit" id="profilAdressSelect" value="' . $value[0] . '" name="profilAdressSelect">Confirmer</button>
              </form>
          </section>
          </section>';
                    echo "</div>";
                }
            }
        }
        if (isset($_POST['insertAdress'])) {
            // $newUserController->adresseInsertVerif
            $ControllerProfil->createAdresse($_POST['nom'], $_POST['prenom'], $_POST['batiment'], $_POST['rue'], $_POST['code_postal'], $_POST['ville'], $_POST['pays'], $_POST['info_sup'], $_POST['telephone']);
        }
    }
    public function historiqueAchat($id_utilisateur)
    {
        $model = new \Model\Profil();
        $fetchCommande = $model->selectAllWhereFetchAll('commande', 'id_utilisateur', $id_utilisateur);

        $fetchAdress = $model->selectAllWhereFetchAll('adresse', 'id', $fetchCommande[0]['id_adresse']);
        // return $fetchCommande;
        // il manque un if pour vérifier si l'adress change dans un foreach ou quoi 

        $date = new \DateTime();
        // $date=date_create("2013-03-15");
        // echo ;

        echo '<section class="section_historique">';
        echo "<h2>Mon historique des commandes</h2>";

        $page = 1;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $pageArticles = '';



        echo "<table>";
        for ($i = (self::PAR_PAGE) * ($page - 1); $i < self::PAR_PAGE * $page && $i < count($fetchCommande); $i++) {
            while (isset($fetchCommande)) {

                // echo $dateFormated;
                echo "<div class='mise_en_page_panier'>";
                // $sumPrix = 0;
                echo "  <tr>
                            <td><img class='img_panier' src='" . $fetchCommande[$i]['image_article'] . "'></td>
                            <td class='titre_article_commande'>" . $fetchCommande[$i]['titre'] . "</td>
                            <td class='prix_article_commande'>" . $fetchCommande[$i]['prix'] . "€</td>
                            <td class='font_date'>" . $fetchCommande[$i]['date'] . "</td>
                            
                                    
                        </tr>";
                break;
            }
        }
        echo "</section>";
        echo "</table>";

        // echo "</table>";
        $page_item = '';
        $start = 0;

        $limite = " limite " . $start . "," . self::PAR_PAGE;

        $row_count = count($fetchCommande);
        if (!empty($row_count)) {
            $page_count = ceil($row_count / self::PAR_PAGE);
            if ($page_count > 1) {
                for ($i = 1; $i <= $page_count; $i++) {
                    if ($i == $page) {
                        $page_item .=  "<section class='pageNumber'><a href='profil.php?Articles=?&page=$i'>$i</a>  </section> ";
                    } else {
                        $page_item .=  "<section class='pageNumber'><a href='profil.php?Articles=?&page=$i'>$i</a>  </section> ";
                    }
                }
            }
            $page_item .= '</div>';
        }

        echo "<form method='get' action='admin.php' class='pagination'>";

        echo $page_item;

        echo "</form>";
    }

    public function getAllLike($id_utilisateur)
    {
        $model = new \Model\Profil();
        $result_like = $model->selectAllWhereFetchAll('likey', 'id_utilisateur', $id_utilisateur);
        // var_dump($result_like);

        $tab = array();
        if (!empty($result_like)) {
            // echo 'coucou';
            foreach ($result_like as $value) {

                $tab[] .= $value['id_article'];
            }
            // var_dump($tab);
            $result = $model->multipleSelect($tab, 'articles', 'id');
            // echo $tab[0]['image'];
            echo '<div class="like_container">
            <h2>Contenu aimé</h2>';
            foreach ($result as $value) {
                echo '<img class="like_img" src="' . $value['image'] . '" alt="image d un article" >';
                echo "<p class='titre_article_commande'>" . $value['titre'] . "</p>";
                echo "<p class='prix_article_commande'>" . $value['prix'] . "€</p>";
            }
            echo '</div>';
            // var_dump($result);
        } else {
            echo '<div class="like_container"><h2> Contenu aimé </h2><br /><p>aucun résultat</p>';
        }
    }
}
