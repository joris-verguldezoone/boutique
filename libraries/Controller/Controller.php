<?php

namespace Controller; // sisi le boss

abstract class Controller
{ // spoiler il controlle tout

    protected $id;
    protected $nom = "";
    protected $prenom = "";
    protected $login = "";
    protected $email = "";
    protected $password = "";
    protected $id_droits;
    protected $anniversaire = "";
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
        $this->anniversaire = "";
        $this->id_adresse = "";

        // $this->id_type;
        // $this->var ;
        // $this->id_gamme;
        // $this->id_marque;

    }

    public function secure($var)
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }
    public function characterLimit($value, $numberLimit)
    { // 150 caracteres pour une description 15 pour un mot avec lequel on ne souhaite pas interagir

        $rest = substr($value, 0, $numberLimit);   // limit le nbr de caractere dans une chaine
        $rest = substr_replace($rest, '...', -3);
        return $rest;
    }
    public function descriptionLimit($value)
    {

        $rest = substr($value, 0, 150);   // limit le nbr de caractere dans une chaine
        $rest = substr_replace($rest, '...', -3);
        return $rest;
    }
    public function searchBar($word)
    {
        $model = new \Model\Display();
        $tab = $model->searchWord($word);
        $i = 0;

        $temp = 1;
        echo '<section class="rowSection">';
        foreach ($tab as $value) {
            if ($temp == 4) { //  ?a c'est le fun qui peut me test svp ??
                $temp = 1;
            }
            echo "<form action='article.php' method='get' class='form_article'>";
            echo "<button type='submit' class='buttom_comp' name='articleSelected' value= '" . $tab[$i]['id'] . "'>";



            echo "<p class='typo_comp'>" . $tab[$i]['titre'] . "<u></u></p>";

            // echo "<p class='typo_comp'><u>".$titre."</u></p>";
            echo "<img src='" . $tab[$i]['image'] . "' class='dimension_image'>";

            // echo $value[2]."<br />";
            // echo $value[3]."<br />";
            // echo "<img src='$value[5]'>";
            // echo "<img src='$value[6]'>";
            // echo $value[7]."<br />";
            // echo $tab[$i]['note']."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";  
            echo "<span class='prix_typo'>" . $tab[$i]['prix'] . "€</span><br />";
            // echo $tab[$i]['date']."</span><br />";
            echo "</button>";
            echo "</form>";

            if ($temp % 3 === 0) {
                echo '</section>';
                echo '<section  class="rowSection">';
            }

            $temp++;
            $i++;
        }
    }

    public function selectCount($table, $colonne, $id_utilisateur)
    {
        $model = new \Model\Profil();
        $fetch = $model->selectCount($table, $colonne, $id_utilisateur);
        return $fetch;
    }
}
