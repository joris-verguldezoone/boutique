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
        <form class="block" method="POST" action="profil.php">
        <article class="adressMenuBlock">
            <label for="nom" class="">Nom</label>
                <input type="text" id="AdresseNom" name="nom" ><br />
            <label for="prenom" > Prenom </label>
                <input type="text" id="AdressePrenom" name="prenom"><br />
         
            <label for="batiment" > Batiment </label>
                <input type="text" id="AdresseBatiment" name="batiment"><br />
        
            <label for="rue" >Rue </label>
                <input type="text" id="AdresseRue" name="rue"><br />
              
            <label for="code_postal"> Code Postal </label>
                <input type="text" id="AdresseCodePostal" name="code_postal" ><br />
              
            <label for="ville"> Ville </label>
                <input type="text" id="AdresseVille" name="ville"><br />
                
            <label for="pays"> Pays </label>
                <input type="text" id="AdressePays" name="pays"><br />
                
            <label for="info_sup"> Informations supplémentaire </label>
                <input type="text" id="AdresseInfoSup" name="info_sup"><br />
            <label for="telephone"> Téléphone </label>
                <input type="tel" id="AdresseTelephone" name="telephone" ><br />
        </article>

        <input type="submit" id="profilSubmit" value="Modifier" name="insertAdress"><br />
        </form>';
      }
      if($rowCount >=1){
        $fetchAdress = $newUserModel->fetchAdress();
        foreach($fetchAdress as $value){
            echo '<form method="GET" action="">
                <button name="'.$value[0].'" class="button_display_adress" type="submit">Modifier adresse</button>
        </form>';
        if(isset($_GET[$value[0]])){ 
            echo'
          <section class="adressMenuBlock">
              <form class="block" method="POST" action="profil.php">
              <article>
                  <label for="nom" class="">Nom</label>
                      <input type="text" id="AdresseNom" name="nom" value="'.$value[2].'" >
                  <label for="prenom" > Prenom </label>
                      <input type="text" id="AdressePrenom" name="prenom" value="'.$value[3].'" >
              
                  <label for="batiment" > Batiment </label>
                      <input type="text" id="AdresseBatiment" name="batiment" value="'.$value[4].'">
              
                  <label for="rue" >Rue </label>
                      <input type="text" id="AdresseRue" name="rue" value="'.$value[5].'">
                  
                  <label for="code_postal"> Code Postal </label>
                      <input type="text" id="AdresseCodePostal" name="code_postal" value="'.$value[6].'" >
                  
                  <label for="ville"> Ville </label>
                      <input type="text" id="AdresseVille" name="ville" value="'.$value[7].'">
                      
                  <label for="pays"> Pays </label>
                      <input type="text" id="AdressePays" name="pays" value="'.$value[8].'">
                      
                  <label for="info_sup"> Informations supplémentaire </label>
                      <input type="text" id="AdresseInfoSup" name="info_sup" value="'.$value[9].'">
                  <label for="telephone"> Téléphone </label>
                      <input type="tel" id="AdresseTelephone" name="telephone" value="'.$value[10].'" >
              </article>
  
              <input type="submit" id="profilAdressModify" value="Modifier" name="profilAdressModify">
              <input type="submit" id="profilAdressDelete" value="Supprimer" name="profilAdressDelete">
              </form>
          </section>';
        }
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
          echo'
        <form class="block" method="POST" action="profil.php">
        <article class="adressMenuBlock">
            <label for="nom" class="">Nom</label>
                <input type="text" id="AdresseNom" name="nom" ><br />
            <label for="prenom" > Prenom </label>
                <input type="text" id="AdressePrenom" name="prenom"><br />
         
            <label for="batiment" > Batiment </label>
                <input type="text" id="AdresseBatiment" name="batiment"><br />
        
            <label for="rue" >Rue </label>
                <input type="text" id="AdresseRue" name="rue"><br />
              
            <label for="code_postal"> Code Postal </label>
                <input type="text" id="AdresseCodePostal" name="code_postal" ><br />
              
            <label for="ville"> Ville </label>
                <input type="text" id="AdresseVille" name="ville"><br />
                
            <label for="pays"> Pays </label>
                <input type="text" id="AdressePays" name="pays"><br />
                
            <label for="info_sup"> Informations supplémentaire </label>
                <input type="text" id="AdresseInfoSup" name="info_sup"><br />
            <label for="telephone"> Téléphone </label>
                <input type="tel" id="AdresseTelephone" name="telephone" ><br />
        </article>

        <input type="submit" id="profilSubmit" value="Modifier" name="insertAdress"><br />
        </form>';
      }
      if($rowCount >=1){
        $fetchAdress = $newUserModel->fetchAdress();
        foreach($fetchAdress as $value){
            echo '<section class="adress_section_button_form_block"><form method="GET" action="">
                <button name="'.$value[0].'" class="adminInterface" type="submit">Selectionner cette adresse</button>
        </form>';
        if(isset($_GET[$value[0]])){ 
            echo'
          <section class="adressMenuBlock">
              <form class="block" method="POST" action="panier.php">
              <article>
                  <label for="nom" class="">Nom</label>
                      <input type="text" id="AdresseNom" name="nom" value="'.$value[2].'" >
                  <label for="prenom" > Prenom </label>
                      <input type="text" id="AdressePrenom" name="prenom" value="'.$value[3].'" >
              
                  <label for="batiment" > Batiment </label>
                      <input type="text" id="AdresseBatiment" name="batiment" value="'.$value[4].'">
              
                  <label for="rue" >Rue </label>
                      <input type="text" id="AdresseRue" name="rue" value="'.$value[5].'">
                  
                  <label for="code_postal"> Code Postal </label>
                      <input type="text" id="AdresseCodePostal" name="code_postal" value="'.$value[6].'" >
                  
                  <label for="ville"> Ville </label>
                      <input type="text" id="AdresseVille" name="ville" value="'.$value[7].'">
                      
                  <label for="pays"> Pays </label>
                      <input type="text" id="AdressePays" name="pays" value="'.$value[8].'">
                      
                  <label for="info_sup"> Informations supplémentaire </label>
                      <input type="text" id="AdresseInfoSup" name="info_sup" value="'.$value[9].'">
                  <label for="telephone"> Téléphone </label>
                      <input type="tel" id="AdresseTelephone" name="telephone" value="'.$value[10].'" >
              </article>
  
              <button type="submit" id="profilAdressSelect" value="'.$value[0].'" name="profilAdressSelect">Confirmer</button>
              </form>
          </section>
          </section>';
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