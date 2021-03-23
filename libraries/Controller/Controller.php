<?php

namespace Controller; // sisi le boss

abstract Class Controller{ // spoiler il controlle tout
    
    protected $id;
    protected $nom = "";
    protected $prenom = "";
    protected $login = "";
    protected $email = "";
    protected $password = "";
    protected $id_droits;
    protected $anniversaire ="";
    protected $id_adresse = "";
    const PAR_PAGE = 5;
    const DEFAULT_PRODUCT_IMAGE = 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg';

    // articles
    // protected $id_type;
    // protected $id_generation;
    // protected $id_gamme;
    // protected $id_marque;


    public function __construct()
    {
        $this->id;
        $this->nom = "";
        $this->prenom = "";
        $this->login = "";
        $this->email = "";
        $this->password = "";
        $this->id_droits;
        $this->anniversaire ="";
        $this->id_adresse = "";

        // $this->id_type;
        // $this->var ;
        // $this->id_gamme;
        // $this->id_marque;

    }
    
    public function secure($var) // le sang de la veine
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }
    public function characterLimit($value, $numberLimit){ // on estime 150 pour une description 15 pour un mot avec lequel on ne souhaite pas interagir

        $rest = substr($value, 0, $numberLimit);   // limit le nbr de caractere dans une chaine
        $rest = substr_replace($rest, '...', -3);
       return $rest;
    }
   public function descriptionLimit($value){

    $rest = substr($value, 0, 150);   // limit le nbr de caractere dans une chaine
    $rest = substr_replace($rest, '...', -3);
   return $rest;
}


}

















?>