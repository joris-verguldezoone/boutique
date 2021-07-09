<?php

namespace Controller;

require_once('controller.php');

class Commentaire extends Controller
{
    public function insertComment($titre, $commentaire, $id_utilisateur, $articleSelected, $login)
    {

        $titre = $this->secure($titre);
        $commentaire = $this->secure($commentaire);
        $id_utilisateur = $this->secure($id_utilisateur);
        $articleSelected = $this->secure($articleSelected);

        $titre_str = strlen($titre);
        $commentaire_str = strlen($titre);

        if ($titre_str > 1) {
            if ($commentaire_str) {
                $model = new \model\Commentaire;


                $model->insertComment($titre, $commentaire, $id_utilisateur, $articleSelected, $login);
            }
        }
    }
}
