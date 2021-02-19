<?php

namespace Controller;

class Display{

    public function displayComposant(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllType();
var_dump($tab);

        foreach($tab as $value){
            
            echo $value[0]; // peut etre en hidden input
            echo $value[1];
            echo "<img src='$value[2]'>";  
        }
    }
    public function displayArticles(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllArticles();
        $i = 0; 
        foreach($tab as $value){
            
            echo $value[1]."<br />";; // peut etre en hidden input
            echo $value[2]."<br />";;
            echo $value[3]."<br />";;
            echo "<img src='$value[4]'>";
            echo "<img src='$value[5]'>";
            echo "<img src='$value[6]'>";
            echo $value[7]."<br />";;
            echo $value[8]."<br />";;
            echo $value[10]."<br />";;
            echo $value[11]."<br />";;
            echo $value[12]."<br />";;
            echo $value[13]."<br />";;
            echo $value[15]."<br />";;

        }
    }
    public function displayUsers(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllUsers();
        $i = 0; 
        foreach($tab as $value){
            echo "<tr>"; 
            echo "<td>".$value[0]."</td>"; // peut etre en hidden input
            echo "<td>".$value[1]."</td>";
            echo "<td>".$value[2]."</td>";
            echo "<td>".$value[3]."</td>";
            echo "<td>".$value[4]."</td>";
            echo "<td>".$value[5]."</td>";
            echo "<td><img src='$value[6]'></td>";
            echo "<td>".$value[7]."</td>";
            echo "<td>".$value[8]."</td>";
            echo "<td>".$value[9]."</td>";
            echo "</tr>";
        
    
        }
    }
    public function displaySelect($nomTable){
        $modelAdmin = new \Model\Admin();
       $tab = $modelAdmin->selectAllNom($nomTable);
        var_dump($tab);
        $i = 0;
        foreach($tab as $key => $value)
       {
        echo "<option value='".$value[0]."'>".$value[1]."</option>";
       }

    }
}

?>