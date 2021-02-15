<?php

namespace Controller;

require_once($utils);

require_once("Controller.php");

class Profil extends Controller{

    

    public function profil($login, $password, $confirm_password, $email)
    {

        $controllerProfil = new \Controller\Profil();

        $this->login = $controllerProfil->secure($_POST['login']);
        $this->password = $controllerProfil->secure($_POST['password']);        //securisé    
        $this->email = $controllerProfil->secure($_POST['email']);
        $confirm_password = $controllerProfil->secure($_POST['confirm_password']);                 

        echo $this->login."login<br/>";
        echo $this->password."password<br/>";
        echo $this->email."email<br/>";
        echo $this->anniversaire."anniversaire<br/>";
        echo $this->id."id<br/>";

        $errorLog = null;

        if (!empty($login) && !empty($password) && !empty($confirm_password) && !empty($email)) { // si les champs sont vides alors $errorLog

            $login_len = strlen($login);
            $password_len = strlen($password);
            $confirm_password_len = strlen($confirm_password);
            $email_len = strlen($email);
            if (($login_len >= 2) && ($password_len  >= 5) && ($confirm_password_len >= 4) && ($email_len>=7)) 
            { // limite minimum de caractere

                if (($login_len <= 30) && ($password_len <= 30) && ($confirm_password_len <= 30) && ($email_len<=30)) 
                { // limite maximum de caractere

                    $modelProfil = new \Model\Profil();
                    $fetch_utilisateur = $modelProfil->selectAllWhere('utilisateurs','login',$login); // je trouve mon id en dehors des session 

                    $new_name = $modelProfil->alreadyTakenCheck('utilisateurs','login',$login); // mon nouveau pseudo existe-t-il ? 
                    $new_email = $modelProfil->alreadyTakenCheck('utilisateurs','email',$email);

                    if (!$new_name || $login == $_SESSION['utilisateur']['login']) {
                        if (!$new_email || $email == $_SESSION['utilisateur']['email']) {
                            if ($_POST['password'] == $_POST['confirm_password']) {

                                $cryptedpassword = password_hash($password, PASSWORD_BCRYPT);
                                $controllerProfil->secure($login); 
                                $controllerProfil->secure($cryptedpassword);
                                // jcrois faudra faire une requete pour actualiser les info pcq la il temenik
                                
                                $newSession = $modelProfil->update($login, $cryptedpassword, $email, $fetch_utilisateur['id']); // GG WP
                                echo "changement(s) effectué(s)";
                                $_SESSION['utilisateur'] = $newSession;
                            } 
                            else {
                                $errorLog = "<p>Confirmation du mot de passe incorrect</p>";
                            }
                        }else{
                            $errorLog = "Cet email est déjà utilisé par un autre utilisateur";
                        }
                    } 
                    else {
                        $errorLog = "<p'>identifiant déjà pris </p>";
                    }
                } 
                else {
                    $errorLog = "<p>mdp et identifiant limités a 30 caractères</p>";
                }
            } 
            else {
                $errorLog = "<p>2 caracteres minimum pour le login et 5 pour le mot de passe</p>";
            }
        }
         else {
            $errorLog = "<p>Veuillez entrer des caracteres dans les champs</p>";
        }
    echo $errorLog;
    }
}