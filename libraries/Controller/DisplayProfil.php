<?php

namespace Controller;

class DisplayProfil {

    public function displayAdress(){
        $newUserModel = new \Model\Profil();
        $ControllerProfil = new \Controller\Profil();
        $answer = $newUserModel->alreadyTakenCheck('adresse', 'id_utilisateur', $_SESSION['utilisateur']['id']);
        if(!$answer){
          echo'
        <form class="block" method="POST" action="profil.php">
        <article>
            <label for="nom" class="">Nom</label>
                <input type="text" id="AdresseNom" name="nom" >
            <label for="prenom" > Prenom </label>
                <input type="text" id="AdressePrenom" name="prenom" >
         
            <label for="batiment" > Batiment </label>
                <input type="text" id="AdresseBatiment" name="batiment">
        
            <label for="rue" >Rue </label>
                <input type="text" id="AdresseRue" name="rue">
              
            <label for="code_postal"> Code Postal </label>
                <input type="text" id="AdresseCodePostal" name="code_postal" >
              
            <label for="ville"> Ville </label>
                <input type="text" id="AdresseVille" name="ville">
                
            <label for="pays"> Pays </label>
                <input type="text" id="AdressePays" name="pays">
                
            <label for="info_sup"> Informations supplémentaire </label>
                <input type="text" id="AdresseInfoSup" name="info_sup">
            <label for="telephone"> Téléphone </label>
                <input type="tel" id="AdresseTelephone" name="telephone" >
        </article>

        <input type="submit" id="profilSubmit" value="Modifier" name="insertAdress">
        </form>';
      }
      elseif($answer == true){
        echo "<section class='adressMenuBlock'></section>";
        echo "<section class='adressMenuBlock'></section>";
        $fetchAdress = $newUserModel->fetchAdress();
          echo'
        <section class="adressMenuBlock">
            <form class="block" method="POST" action="profil.php">
            <article>
                <label for="nom" class="">Nom</label>
                    <input type="text" id="AdresseNom" name="nom" value="" >
                <label for="prenom" > Prenom </label>
                    <input type="text" id="AdressePrenom" name="prenom" >
            
                <label for="batiment" > Batiment </label>
                    <input type="text" id="AdresseBatiment" name="batiment">
            
                <label for="rue" >Rue </label>
                    <input type="text" id="AdresseRue" name="rue">
                
                <label for="code_postal"> Code Postal </label>
                    <input type="text" id="AdresseCodePostal" name="code_postal" >
                
                <label for="ville"> Ville </label>
                    <input type="text" id="AdresseVille" name="ville">
                    
                <label for="pays"> Pays </label>
                    <input type="text" id="AdressePays" name="pays">
                    
                <label for="info_sup"> Informations supplémentaire </label>
                    <input type="text" id="AdresseInfoSup" name="info_sup">
                <label for="telephone"> Téléphone </label>
                    <input type="tel" id="AdresseTelephone" name="telephone" >
            </article>

            <input type="submit" id="profilSubmit" value="Modifier" name="insertAdress">
            </form>
        </section>';
    }
    if (isset($_POST['insertAdress'])) {
        // $newUserController->adresseInsertVerif
        echo 'form';
        $ControllerProfil->createAdresse($_POST['nom'], $_POST['prenom'], $_POST['batiment'], $_POST['rue'], $_POST['code_postal'], $_POST['ville'], $_POST['pays'], $_POST['info_sup'], $_POST['telephone']);
    }
    }
}

?>