<?php

namespace Controller;

require_once($utils);
require_once($Http);
require_once("Controller.php");

class Profil extends Controller{

    public function profil($login, $password, $confirm_password, $email)
    {
        $controllerProfil = new \Controller\Profil();

        $this->login = $controllerProfil->secure($_POST['login']);
        $this->password = $controllerProfil->secure($_POST['password']);        //securisé    
        $this->email = $controllerProfil->secure($_POST['email']);
        $confirm_password = $controllerProfil->secure($_POST['confirm_password']);                 

        $errorLog = null;

        $login_len = strlen($login);
        $password_len = strlen($password);
        $confirm_password_len = strlen($confirm_password);
        $email_len = strlen($email);

        $modelProfil = new \Model\Profil();

            if(!empty($login)){
                if($login_len >= 2){
                    if($login_len <= 30){

                        $new_name = $modelProfil->alreadyTakenCheck('utilisateurs','login',$login);
                        
                        if (!$new_name) {

                            $modelProfil->updateOneValue('utilisateurs', 'login','id', $login, $_SESSION['utilisateur']['id']);
                            
                            $fetch_utilisateur = $modelProfil->selectAllWhere('utilisateurs','id',$_SESSION['utilisateur']['id']); // je trouve mon id en dehors des session 
                            $_SESSION['utilisateur'] = $fetch_utilisateur;
                            echo "changement(s) effectué(s) login";

                        }
                    }
                }
            }

            if((!empty($password)) && (!empty($confirm_password)))
            {
                if(($confirm_password_len >= 4) && ($password_len  >= 5))
                {
                    if(($confirm_password_len <= 30) && ($password_len <= 30))
                    {
                        if ($password == $confirm_password) 
                        {

                            $controllerProfil->secure($password);
                            $cryptedpassword = password_hash($password, PASSWORD_BCRYPT);

                            $modelProfil->updateOneValue('utilisateurs', 'password','id', $cryptedpassword, $_SESSION['utilisateur']['id']);

                            $fetch_utilisateur = $modelProfil->selectAllWhere('utilisateurs','id',$_SESSION['utilisateur']['id']); // je trouve mon id en dehors des session 
                            $_SESSION['utilisateur'] = $fetch_utilisateur;
                            echo "changement(s) effectué(s) password";

                        } 
                        
                        else {
                            $errorLog = "<p>Confirmation du mot de passe incorrect</p>";
                        }
                    }
                }
            }

            if(!empty($email)){

                if($email_len>=7){
    
                    if($email_len<=30){
                    $fetch_utilisateur = $modelProfil->selectAllWhere('utilisateurs','login',$login); // je trouve mon id en dehors des session 

                    $new_email = $modelProfil->alreadyTakenCheck('utilisateurs','email',$email);


                    if (!$new_email) {
                        $controllerProfil->secure($email);

                            $modelProfil->updateOneValue('utilisateurs', 'email','id', $email, $_SESSION['utilisateur']['id']);

                            $fetch_utilisateur = $modelProfil->selectAllWhere('utilisateurs','id',$_SESSION['utilisateur']['id']); // je trouve mon id en dehors des session 
                            $_SESSION['utilisateur'] = $fetch_utilisateur;
                            echo "changement(s) effectué(s) email";

                    }else{
                        $errorLog = "Cet email est déjà utilisé par un autre utilisateur";
                    }
                }
            }

            // { // limite minimum de caractere

            //     if ( &&  &&  && ) 
            //     { // limite maximum de caractere

            //         $modelProfil = new \Model\Profil();
            //         $fetch_utilisateur = $modelProfil->selectAllWhere('utilisateurs','login',$login); // je trouve mon id en dehors des session 

            //         $new_name = $modelProfil->alreadyTakenCheck('utilisateurs','login',$login); // mon nouveau pseudo existe-t-il ? 
            //         $new_email = $modelProfil->alreadyTakenCheck('utilisateurs','email',$email);

            //         if (!$new_name || $login == $_SESSION['utilisateur']['login']) {
            //             if (!$new_email || $email == $_SESSION['utilisateur']['email']) {
            //                 if ($_POST['password'] == $_POST['confirm_password']) {

            //                     $cryptedpassword = password_hash($password, PASSWORD_BCRYPT);
            //                     $controllerProfil->secure($new_name); 
            //                     $controllerProfil->secure($cryptedpassword);
            //                     $controllerProfil->secure($new_email);
            //                     // jcrois faudra faire une requete pour actualiser les info pcq la il temenik
                                
            //                     $newSession = $modelProfil->update($login, $cryptedpassword, $email, $fetch_utilisateur['id']); // GG WP
            //                     $_SESSION['utilisateur'] = $newSession;
            //                 } 
                           
        //                 }
        //             } 
        //             else {
        //                 $errorLog = "<p'>identifiant déjà pris </p>";
        //             }
        //         } 
        //         else {
        //             $errorLog = "<p>mdp et identifiant limités a 30 caractères</p>";
        //         }
        //     } 
        //     else {
        //         $errorLog = "<p>2 caracteres minimum pour le login et 5 pour le mot de passe</p>";
        //     }
        // }
        //  else {
        //     $errorLog = "<p>Veuillez entrer des caracteres dans les champs</p>";
        // }
            }
    echo $errorLog;
    }

    public function createAdresse($nom, $prenom, $batiment , $rue , $code_postal, $ville, $pays, $info_sup, $telephone){

        $modelProfil = new \Model\Profil();
        $id_utilisateur = $_SESSION['utilisateur']['id'];
        $errorLog = "";
        $this->secure($nom);
        $this->secure($prenom);
        $this->secure($batiment);
        $this->secure($rue);
        $this->secure($code_postal); // possible erreur a cause de trim()
        $this->secure($ville);
        $this->secure($pays);
        $this->secure($info_sup);
        $this->secure($telephone);
        echo 'nique';
        
        if(!empty($nom) && !empty($prenom) && !empty($batiment) && !empty($rue) && !empty($code_postal) && !empty($ville) && !empty($pays) &&!empty($telephone)){
            $nom_len = strlen($nom);
            $prenom_len = strlen($prenom);
            $batiment_len = strlen($batiment);
            $rue_len = strlen($rue);
            $ville_len = strlen($ville);
            $pays_len = strlen($pays);
            // if (($nom_len >= 2) && ($prenom_len >= 2) && ($batiment_len >= 3) && ($rue_len>=3) && ($ville_len >= 3) && ($pays_len >= 3)){
                // if (($nom_len <= 30) && ($prenom_len <= 30) && ($batiment_len <= 25) && ($rue_len <= 25 ) && ($ville_len  <= 20) && ($pays_len <= 20)){
                $rowCount = $modelProfil->rowCount('adresse','id_utilisateur', $id_utilisateur);
                var_dump($rowCount);

                    echo 'yyyyyyyy';
                    
                    if($rowCount == '3'){ // rowCount revient en string je n'arrive pas a le convertir et un switch c'est pas la vrai solution / la condition est faible
                        echo 'kjjjjjjjjjjko';
                        $modelProfil->adresseInsert($nom, $prenom , $batiment, $rue, $code_postal, $ville, $pays , $info_sup, $telephone);
                        // $Http = new \Http();
                        // $Http->redirect('profil.php');
                    }
                    else  $errorLog = "Vous ne pouvez posséder plus de 3 adresses sur le meme compte";                
                // }
                // else $errorLog = "Vous avez dépassé le nombre de caractères autorisé pour l'un des champs";
            // }
            // else $errorLog = "Veuillez utiliser + de caracteres pour compléter votre adresse ";
        }
        else 
        {
            $errorLog = "Veuillez remplir les champs avant des nous les transmettre";
        }
        echo $errorLog;
        echo'pk';
    }
}