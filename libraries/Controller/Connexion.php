<?php

namespace Controller;



require($Http);
require_once($utils);
require("Controller.php");
class Connexion extends Controller
{
    public function connect($login, $password)
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $errorLog = null;

        if (!empty($login) && !empty($password)) { // il faut remplir les champs sinon $errorLog

            $modelConnexion = new \Model\Connexion();
            $ControllerConnexion = new \Controller\Connexion();

            $login = $ControllerConnexion->secure($login);
            $password = $ControllerConnexion->secure($password);

            $fetch = $modelConnexion->existenceCheck($login); // savoir si le compte existe pour etre connecté
            if ($fetch) {
                $passwordSql = $modelConnexion->passwordVerifySql($login);

                if (password_verify($password, $passwordSql['password'])) {
                    $_SESSION['connected'] = true;
                    $utilisateur = $modelConnexion->selectAllWhere('utilisateurs', 'login', $login);
                    $_SESSION['utilisateur'] = $utilisateur; // la carte d'identité de l'utilisateur à été créer et initialisé dans une $_SESSION

                    $this->id = $utilisateur['utilisateur']['id'];
                    $this->nom = $utilisateur['utilisateur']['nom'];
                    $this->prenom = $utilisateur['utilisateur']['prenom'];
                    $this->login = $utilisateur['utilisateur']['login'];
                    $this->email = $utilisateur['utilisateur']['email'];
                    $this->password = $utilisateur['utilisateur']['password'];
                    $this->id_droits = $utilisateur['utilisateur']['id_droits'];
                    $this->anniversaire = $utilisateur['utilisateur']['anniversaire'];

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

    public function isConnected()
    {
    }
}
