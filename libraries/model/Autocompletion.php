<?php

namespace Model;

require_once('model.php');

class Autocomplete extends Model
{


    public function searchWord_autocomplete($input_text)
    {
        $tab1 = array();
        $i = 0;

        $sql = "SELECT * FROM autocompletion_hardware WHERE mot LIKE :input_text";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':input_text', $input_text, \PDO::PARAM_STR);


        $result->execute();
        while ($fetch = $result->fetch(\PDO::FETCH_ASSOC)) {

            $tab1[$i][] = $fetch;
            $i++;
        }
        return $tab1;
    }
}
