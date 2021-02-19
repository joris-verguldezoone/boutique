<?php

namespace Model;

require("Model.php");

class Article extends Model{

    public function displayAllType(){
        $sql = "SELECT * FROM type";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['image'];
            
$i++;
        }
        return $tableau;


    }
}



?>