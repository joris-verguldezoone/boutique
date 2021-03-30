<?php

namespace Controller;

class DisplayProfil {

    public function displayAdress(){
        $newUserModel = new \Model\Profil();
        $ControllerProfil = new \Controller\Profil();
        $id_utilisateur = $_SESSION['utilisateur']['id'];   
        $rowCount = $newUserModel->rowCount('adresse','id_utilisateur', $id_utilisateur);
        $rowCount = intval($rowCount[0]['COUNT(*)']);
            
            if($rowCount <= 3){ 
          echo'
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
      if($rowCount >=1){
        $fetchAdress = $newUserModel->fetchAdress();
        echo'<section class="btn_display_adress_flex">
        <div class="test">';
        $i = 0;
        $a = 0;
        foreach($fetchAdress as $value){
            $a++;
            echo '<form method="GET" action="">
                <button name="'.$value[0].'" class="button_display_adress" type="submit">Modifier adresse N°'.$a.'</button>
        </form>';
    }


        echo'</div>';
        foreach($fetchAdress as $value){
           $i++;
        echo '<div class="test2">';

        
        if(isset($_GET[$value[0]])){ 
            echo'
          <section class="adressMenuBlock">
              <form class="block" method="POST" action="profil.php">
              <h3>Adresse N°'. $i .'</h3>
              <article>
              <div class="profil_newAdress_flexColumn">
              </div>
              <div class="profil_newAdress_flexRow">
              <div class="profil_newAdress_flexColumn">
                  <label for="nom" class="">Nom</label>
                      <input type="text" id="AdresseNom" name="nom" value="'.$value[2].'" ><br>
                    </div>
                      <div class="profil_newAdress_flexColumn">  
                      <label for="prenom" > Prenom </label>
                      <input type="text" id="AdressePrenom" name="prenom" value="'.$value[3].'" ><br>
                    </div>
                    </div>             
                    <div class="profil_newAdress_flexColumn">
                  <label for="rue" >Rue </label>
                      <input type="text" id="AdresseRue" name="rue" value="'.$value[5].'"><br>
                  </div>
                  <div class="profil_newAdress_flexColumn">
                  <label for="batiment" > Batiment </label>
                      <input type="text" id="AdresseBatiment" name="batiment" value="'.$value[4].'"><br>
                    </div> 
                  <div class="profil_newAdress_flexRow">
                  <div class="profil_newAdress_flexColumn">
                  <label for="code_postal"> Code Postal </label>
                      <input type="tel" id="AdresseCodePostal" name="code_postal" value="'.$value[6].'" ><br>
                  </div>
                  <div class="profil_newAdress_flexColumn">
                  <label for="ville"> Ville </label>
                      <input type="text" id="AdresseVille" name="ville" value="'.$value[7].'"><br>
                      </div>
                      </div>
                      <div class="profil_newAdress_flexRow">
                      <div class="profil_newAdress_flexColumn">
                  <label for="pays"> Pays </label>
                      <input type="text" id="AdressePays" name="pays" value="'.$value[8].'"><br>
                      </div>
                      <div class="profil_newAdress_flexColumn">
                  <label for="info_sup"> Informations supp </label>
                      <input type="text" id="AdresseInfoSup" name="info_sup" value="'.$value[9].'"><br>
                        </div>
                        </div>
                        <div class="profil_newAdress_flexColumn">
                      <label for="telephone"> Téléphone </label>
                      <input type="tel" id="AdresseTelephone" name="telephone" value="'.$value[10].'" ><br>
                      </div>
              <div class="button_center_profil">
              <input type="submit" id="profilAdressModify" value="Modifier" name="profilAdressModify">
              <input type="submit" id="profilAdressDelete" value="Supprimer" name="profilAdressDelete">
              </div>
              </article>
              </form>
          </section>
          </section>
          ';
        }

        echo '</div>';
          if(isset($_POST['profilAdressModify'])){
              $newUserModel->deleteOneWhereId('adresse',$value[0]);
          }
          if(isset($_POST['profilAdressDelete'])){
              $newUserModel->deleteOneWhereId('adresse',$value[0]);
          }
        }
    }
    if (isset($_POST['insertAdress'])) {
        // $newUserController->adresseInsertVerif
        $ControllerProfil->createAdresse($_POST['nom'], $_POST['prenom'], $_POST['batiment'], $_POST['rue'], $_POST['code_postal'], $_POST['ville'], $_POST['pays'], $_POST['info_sup'], $_POST['telephone']);
    }
    }

    public function displayAdressPanier(){
        $newUserModel = new \Model\Profil();
        $ControllerProfil = new \Controller\Profil();
        $id_utilisateur = $_SESSION['utilisateur']['id'];   
        $rowCount = $newUserModel->rowCount('adresse','id_utilisateur', $id_utilisateur);
        $rowCount = intval($rowCount[0]['COUNT(*)']);
            
        if($rowCount <= 3){ 
            echo "<div class='adress_block'>";

            echo'
            
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
        if($rowCount >=1){
          $fetchAdress = $newUserModel->fetchAdress();
          echo'<section class="btn_display_adress_flex">
          <div class="test">';
          $i = 0;
          $a = 0;
          foreach($fetchAdress as $value){
              $a++;
              echo '<form method="GET" action="">
                  <button name="'.$value[0].'" class="button_display_adress" type="submit">Selectionner l adresse N°'.$a.'</button>
          </form>';
      }
  
  
          echo'</div>';
          foreach($fetchAdress as $value){
             $i++;
          echo '<div class="paiement">';
  
          
          if(isset($_GET[$value[0]])){ 
              echo'
            <section class="adressMenuBlock">
                <form class="block" method="POST" action="panier.php">
                <h3>Adresse N°'. $i .'</h3>
                <article>
                <div class="profil_newAdress_flexColumn">
                </div>
                <div class="profil_newAdress_flexRow">
                <div class="profil_newAdress_flexColumn">
                    <label for="nom" class="">Nom</label>
                        <input type="text" id="AdresseNom" name="nom" value="'.$value[2].'" ><br>
                      </div>
                        <div class="profil_newAdress_flexColumn">  
                        <label for="prenom" > Prenom </label>
                        <input type="text" id="AdressePrenom" name="prenom" value="'.$value[3].'" ><br>
                      </div>
                      </div>             
                      <div class="profil_newAdress_flexColumn">
                    <label for="rue" >Rue </label>
                        <input type="text" id="AdresseRue" name="rue" value="'.$value[5].'"><br>
                    </div>
                    <div class="profil_newAdress_flexColumn">
                    <label for="batiment" > Batiment </label>
                        <input type="text" id="AdresseBatiment" name="batiment" value="'.$value[4].'"><br>
                      </div> 
                    <div class="profil_newAdress_flexRow">
                    <div class="profil_newAdress_flexColumn">
                    <label for="code_postal"> Code Postal </label>
                        <input type="tel" id="AdresseCodePostal" name="code_postal" value="'.$value[6].'" ><br>
                    </div>
                    <div class="profil_newAdress_flexColumn">
                    <label for="ville"> Ville </label>
                        <input type="text" id="AdresseVille" name="ville" value="'.$value[7].'"><br>
                        </div>
                        </div>
                        <div class="profil_newAdress_flexRow">
                        <div class="profil_newAdress_flexColumn">
                    <label for="pays"> Pays </label>
                        <input type="text" id="AdressePays" name="pays" value="'.$value[8].'"><br>
                        </div>
                        <div class="profil_newAdress_flexColumn">
                    <label for="info_sup"> Informations supp </label>
                        <input type="text" id="AdresseInfoSup" name="info_sup" value="'.$value[9].'"><br>
                          </div>
                          </div>
                          <div class="profil_newAdress_flexColumn">
                        <label for="telephone"> Téléphone </label>
                        <input type="tel" id="AdresseTelephone" name="telephone" value="'.$value[10].'" ><br>
                        </div>
                <div class="button_center_profil">
  
              <button type="submit" id="profilAdressSelect" value="'.$value[0].'" name="profilAdressSelect">Confirmer</button>
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
}

?>