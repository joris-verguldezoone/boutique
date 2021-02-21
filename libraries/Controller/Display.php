<?php

namespace Controller;

class Display extends Controller{

    public function displayComposant(){ // ->articles 
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllType();

        foreach($tab as $value){
            
            echo $value[0]; // peut etre en hidden input
            echo $value[1];
            echo "<img src='$value[2]'>";  
        }
    }
    public function displayType(){ // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllType();
        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Image</th>
                </tr>";
        foreach($tab as $value){ 
            echo "<form action='' method='GET'>";
            $_GET['typeImg'] = $value[2];
                echo "<tr><td><input type='number' name='typeId' value='".$value[0]."'></td>"; // peut etre en hidden input
                echo "<td><input type='text' name='typeNom' value='".$value[1]."'></td>";
                echo "<td><img class='display_img_size_backOffice' src='".$value[2]."'></td>";
                echo "<td><input name='typeImg' type='text' value='".$value[2]."' placeholder='Nouvelle img?'></td>
                    <td>
                        <input type='submit' id='Modifier' value='modifier'>
                        <input type='hidden' name='TypeName' id='hiddenId' value='".$value[0]."'> 
                            
                        <input type='submit' name='deleteType' value='supprimer'>
                        <input type='hidden' name='TypeIdTracker' id='suppr' value='".$value[0]."'>
                    </td></tr></form>";  
                    echo "</table>";
                    // echo $_POST['typeImg'].$_POST['typeNom'].$_POST['typeId'];
                if(isset($_GET['TypeName'])){
         
                       $modelAdmin = new \Model\Admin();
                       
                       $modelAdmin->typeUpdate($_GET['typeId'],$_GET['typeNom'],$_GET['typeImg']);
                      
                    //    $modelHttp = new \Http();
                    //    $modelHttp->redirect('admin.php');
                }
            }
        // if(isset($_GET['TypeIdTracker'])){
        //     $nom = $_GET['selectCategory'];
        //     $nom = str_replace('_', ' ', $nom);
        //     echo "Êtes-vous sûr de vouloir supprimer la catégorie ".$nom."?";
        //     echo "  <form action='' method=POST>
        //             <input type='submit' name='yes' value='Oui'>
        //             <input type='submit' name='cancel' value='Annuler'>
        //             </form>";
        //             if(isset($_POST['yes'])){
        //                 $modelDelete = new \Models\Admin();
        //                 $modelDelete->deleteCategory($nom);
                        
        //                 $modelHttp = new \Http();
        //                 $modelHttp->redirect('admin.php');
        //             }
        //             elseif(isset($_POST['cancel'])){
        //                 $modelHttp = new \Http();
        //                 $modelHttp->redirect('admin.php');
        //             }
        // }
    }
    public function displayArticles(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllArticles();
        $i = 0; 
        foreach($tab as $value){
            
            echo $value[1]."<br />"; // peut etre en hidden input
            echo $value[2]."<br />";
            echo $value[3]."<br />";
            echo "<img src='$value[4]'>";
            echo "<img src='$value[5]'>";
            echo "<img src='$value[6]'>";
            echo $value[7]."<br />";
            echo $value[8]."<br />";
            echo $value[10]."<br />";
            echo $value[11]."<br />";
            echo $value[12]."<br />";
            echo $value[13]."<br />";
            echo $value[15]."<br />";

        }
    }
    public function displayUsers(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllUsers();
        // $controllerDisplay = new \Controller\Display();
        $i = 0; 
        foreach($tab as $value){
            $mdp = $this->characterLimit($value[5],8);
            echo "<form action='' method=''POST>";
            echo "<tr>"; 
            echo "<td><input type='number' value='".$value[0]."'></td>"; // peut etre en hidden input
            echo "<td><input type='text' value='".$value[1]."'></td>";
            echo "<td><input type='text' value='".$value[2]."'></td>";
            echo "<td><input type='text' value='".$value[3]."'</td>";
            echo "<td><input type='text' value='".$value[4]."'</td>";
            echo "<td>".$mdp."</td>"; // mdp 
            echo "<td><img class='display_img_size_backOffice' src='$value[6]'></td>";
            echo "<td><input type='number' value='".$value[7]."'</td>";
            echo "<td><input type='text' value='".$value[8]."'</td>";
            echo "<td><input type='number' value='".$value[9]."'</td>";
            echo "</tr>";
            echo "</form>";
        
    
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