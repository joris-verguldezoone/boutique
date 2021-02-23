<?php

namespace Controller;

class Display extends Controller{

    public function displayComposant(){ // ->articles 
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllType();

        
            
        $temp = 1; 
        echo '<section  class="rowSection">';
        foreach($tab as $key => $value){
                
                if($temp == 4){
                    $temp = 1;
                }
                                    
                echo "<form action='article.php' method='get' class='form_composant'>";
                echo "<button type='submit' name='".$value[2]."'>";
                // echo $value[0]; // peut etre en hidden input
                echo "<p>".$value[1]."</p>";
                echo "<img src='$value[2]' class='dimension_image'>
                </button>";
                echo "</form>";
                
                if($temp % 3 === 0 ){
                    echo '</section>';
                    echo '<section  class="rowSection">';
                } 
                
                $temp++;
            }
            
    }
    public function displayType()
    { // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllType();
        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Image</th>
                </tr>";
        foreach($tab as $value)
        { 
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='typeId' value='".$value[0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='typeNom' value='".$value[1]."'>
                        </td>";
                echo "  <td>
                            <img class='display_img_size_backOffice' src='".$value[2]."'>
                        </td>";
                echo "  <td>
                            <input name='typeImg' type='text' value='".$value[2]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modify' value='modifier'>
                            <input type='hidden' name='TypeName' id='hiddenId' value='".$value[0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='TypeIdTracker' id='suppr' value='".$value[0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modify']))
                {
                    $modelAdmin = new \Model\Admin();
                    $modelAdmin->updateThreeValue("type",'id','nom','image',$_GET['typeId'],$_GET['typeNom'],$_GET['typeImg']);
                    
                    // $_GET = NULL;
                    // $_POST = NULL;
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['TypeIdTracker']))
                {
                    $nom = $value[1];
                    echo "<p>Êtes-vous sûr de vouloir supprimer la catégorie ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('type', $_GET['TypeIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
            }  
            echo "</table>";
    }
    public function displayGamme()
    { // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllGamme();
        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>	
                    <th>id_type</th>	
                    <th>id_marque</th>	                   
                </tr>";
        foreach($tab as $value)
        { 
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='GammeId' value='".$value[0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='GammeNom' value='".$value[1]."'>
                        </td>";
                echo "  <td>
                            <input name='Gamme_type' type='text' value='".$value[2]."'>
                        </td>";
                        echo "  <td>
                            <input name='Gamme_marque' type='text' value='".$value[3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyGamme' value='modifier'>
                            <input type='hidden' name='GammeName' id='hiddenId' value='".$value[0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='GammeIdTracker' id='suppr' value='".$value[0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modifyGamme']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueInt('gamme','id','nom','id_type','id_marque',$_GET['GammeId'],$_GET['GammeNom'],$_GET['Gamme_type'], $_GET['Gamme_marque']);
                    // $_GET = NULL;
                    // $_POST = NULL;
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['GammeIdTracker']))
                {
                    $nom = $value[1];
                    echo "<p>Êtes-vous sûr de vouloir supprimer la gamme ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('gamme', $_GET['GammeIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
            }  
            echo "</table>";
    }
    public function displayGeneration()
    { // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllGeneration();
        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>	
                    <th>id_type</th>	
                    <th>id_marque</th>	                   
                </tr>";
        foreach($tab as $value)
        { 
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='GenerationId' value='".$value[0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='GenerationNom' value='".$value[1]."'>
                        </td>";
                echo "  <td>
                            <input name='Generation_type' type='text' value='".$value[2]."'>
                        </td>";
                        echo "  <td>
                            <input name='Generation_marque' type='text' value='".$value[3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyGeneration' value='modifier'>
                            <input type='hidden' name='GammeGeneration' id='hiddenId' value='".$value[0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='GenerationIdTracker' id='suppr' value='".$value[0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modifyGeneration']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueInt('generation','id','nom','id_type','id_marque',$_GET['GenerationId'],$_GET['GenerationNom'],$_GET['Generation_type'], $_GET['Generation_marque']);
                    // $_GET = NULL;
                    // $_POST = NULL;
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['GenerationIdTracker']))
                {
                    $nom = $value[1];
                    echo "<p>Êtes-vous sûr de vouloir supprimer la Generation ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('generation', $_GET['GenerationIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
            }  
            echo "</table>";
        }
    public function displayMarque()
    { // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllMarque();
    	

        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>	
                    <th>image</th>	
                    <th>description</th>	                   
                </tr>";
        foreach($tab as $value)
        { 
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='MarqueId' value='".$value[0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='MarqueNom' value='".$value[1]."'>
                        </td>";
                        echo "
                        <td>
                            <img src='".$value[2]."' class='display_img_size_backOffice'>
                        </td>";
                echo "  <td>
                            <input name='Marque_Img' type='text' value='".$value[2]."'>
                        </td>";
                        echo $value[2];
                        echo "  
                        <td>
                            <input name='Marque_description' type='text' value='".$value[3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyMarque' value='modifier'>
                            <input type='hidden' name='MarqueName' id='hiddenId' value='".$value[0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='MarqueIdTracker' id='suppr' value='".$value[0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modifyMarque']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueStr('marque','id','nom','image','description',$_GET['MarqueId'],$_GET['MarqueNom'],$_GET['Marque_Img'],$_GET['Marque_description']);
                  
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['MarqueIdTracker']))
                {
                    $nom = $value[1];
                    echo "<p>Êtes-vous sûr de vouloir supprimer la marque ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('marque', $_GET['MarqueIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
            }  
            echo "</table>";
    }
    public function displayArticlesAdmin(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllArticles();

        echo"<table>
        <tr>
            <th>Id</th>
            <th>Nom</th>	
            <th>image</th>	
            <th>description</th>	                   
        </tr>";
foreach($tab as $value)
{ 

    echo "<tr>
            <form action='' method='GET'>
                <td>
                    <input type='number' name='ArticleId' value='".$value[0]."'>
                </td>"; // peut etre en hidden input
        echo "  <td>
                    <input type='text' name='ArticleNom' value='".$value[1]."'>
                </td>";
                echo "
                <td>
                    <img src='".$value[2]."' class='display_img_size_backOffice'>
                </td>";
        echo "  <td>
                    <input name='Article_Img' type='text' value='".$value[2]."'>
                </td>";
                echo $value[2];
                echo "  
                <td>
                    <input name='Article_description' type='text' value='".$value[3]."'>
                </td>
                <td>
                    <input type='submit' id='Modifier' name='modifyArticle' value='modifier'>
                    <input type='hidden' name='ArticleName' id='hiddenId' value='".$value[0]."'> 
                </td>
            </form>
            <form action ='' method='GET'>
                    <td>
                        <input type='submit' value='supprimer'>
                        <input type='hidden' name='ArticleIdTracker' id='suppr' value='".$value[0]."'>
                    </td>
                </form>
        </tr>";
        if(isset($_GET['modifyArticle']))
        {
            $modelAdmin = new \Model\Admin();
            
            $modelAdmin->updateFourValueStr('Article','id','nom','image','description',$_GET['MarqueId'],$_GET['MarqueNom'],$_GET['Marque_Img'],$_GET['Marque_description']);
          // Textes complets id Croissant titre presentation description image image_2 image_3 note prix id_utilisateur id_type id_gamme id_marque id_generation promo date
            $modelHttp = new \Http();
            $modelHttp->redirect('admin.php');
        }
        if(isset($_GET['ArticleIdTracker']))
        {
            $nom = $value[1];
            echo "<p>Êtes-vous sûr de vouloir supprimer la marque ".$nom."?</p>";
                $modelAdmin = new \Model\Admin();
                $modelAdmin->deleteOneWhereId('Article', $_GET['ArticleIdTracker']);
                
                $modelHttp = new \Http();
                $modelHttp->redirect('admin.php');
           
        }
    }  
    echo "</table>";
}


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