<?php

namespace Controller;
require($Http);
require_once($utils);

class Connexion
{
    public $login = "";
    public $password = "";
    
    public function connect($login, $password)
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $errorLog = null;

        if (!empty($login) && !empty($password)) { // il faut remplir les champs sinon $errorLog

            $modelConnection = new \Models\Connexion();

            $login = $modelConnection->secure($login);
            $password = $modelConnection->secure($password);

            $fetch = $modelConnection->ifDoesntExist($login); // savoir si le compte existe pour etre connecté
            if ($fetch) {
                $passwordSql = $modelConnection->passwordVerifySql($login);

                if (password_verify($password, $passwordSql['password'])) {
                    $_SESSION['connected'] = true;
                    $utilisateur = $modelConnection->findAll($login);
                    $_SESSION['utilisateur'] = $utilisateur; // la carte d'identité de l'utilisateur à été créer et initialisé dans une $_SESSION
                    $Http = new \Http();
                    $Http->redirect('profil.php'); // GG WP
                } else {
                    $errorLog = "<p class='alert alert-danger' role='alert'>Mot de passe incorrect</p>";
                }
            } else {
                $errorLog = "<p class='alert alert-danger' role='alert'>Identifiant incorrect</p>";
            }
        } else {
            $errorLog = "<p class='alert alert-danger' role='alert'>Veuillez entrer des caracteres dans les champs</p>";
        }
        echo $errorLog; // on aurait pu mettre un return mais flemme :-) pour un prochain projet
    }

}
