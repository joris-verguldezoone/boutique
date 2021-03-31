<?php

// TOUT METTRE EN GET 

namespace Controller;

require_once('Controller.php');

class Display extends Controller{

    public function displayComposant(){ // ->articles 
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllType();

        $temp = 1; 
        echo '<section  class="rowSection">';
        foreach($tab as $key => $value){
                
                if($temp == 4){ //  ?a c'est le fun qui peut me test svp ??
                    $temp = 1;
                }
                echo "<form action='' method='get' class='form_composant'>";
                echo "<button type='submit' class='buttom_comp' name='typeArticleSelected' value= '".$value[0]."'>";
                // echo $value[0]; // peut etre en hidden input
            	echo "<p class='typo_comp'><u>".$value[1]."</u></p>";
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
        
                $page = 1;

                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                }
            
                        $pageArticles = '';
            
                        // On limite déjà nos articles
                        // On sélectionne les bons nombres d'articles et les articles correspondant à la page
                for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
                    
                    while (isset($tab)) 
                    {            
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='typeId' value='".$tab[$i][0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='typeNom' value='".$tab[$i][1]."'>
                        </td>";
                echo "  <td>
                            <img class='display_img_size_backOffice' src='".$tab[$i][2]."'>
                        </td>";
                echo "  <td>
                            <input name='typeImg' type='text' value='".$tab[$i][2]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modify' value='modifier'>
                            <input type='hidden' name='TypeName' id='hiddenId' value='".$tab[$i][0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='TypeIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modify']))
                {
                    $modelAdmin = new \Model\Admin();
                    $modelAdmin->updateThreeValue("type",'id','nom','image',$_GET['typeId'],$_GET['typeNom'],$_GET['typeImg']);
                    
                    
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['TypeIdTracker']))
                {
                    // $nom = $value[1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la cat?gorie ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('type', $_GET['TypeIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
                break;
            }  
        }
        
            echo "</table>";
        $page_item = '';
            $start = 0;

            $limite = " limite " . $start . "," . self::PAR_PAGE;

            $row_count = count($tab);

            if (!empty($row_count)){
                $page_count = ceil($row_count/self::PAR_PAGE);
                if ($page_count>1){
                    for ($i=1;$i<=$page_count;$i++) {
                        if ($i == $page) {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Gamme=?&page=$i'>$i</a>  </section> ";
                        } else {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Gamme=?&page=$i'>$i</a>  </section> ";
                        }
                    }
                }
                $page_item .= '</div>';
            }

            echo "<form method='get' action='admin.php' class='pagination'>";

            echo $page_item;

            echo "</form>";
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


                $page = 1;

                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                }
            
                        $pageArticles = '';
            
                        // On limite déjà nos articles
                        // On sélectionne les bons nombres d'articles et les articles correspondant à la page
                for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
                    
                    while (isset($tab)) 
                    {                                
        
                echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='GammeId' value='".$tab[$i][0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='GammeNom' value='".$tab[$i][1]."'>
                        </td>";
                echo "  <td>
                            <input name='Gamme_type' type='text' value='".$tab[$i][2]."'>
                        </td>";
                        echo "  <td>
                            <input name='Gamme_marque' type='text' value='".$tab[$i][3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyGamme' value='modifier'>
                            <input type='hidden' name='GammeName' id='hiddenId' value='".$tab[$i][0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='GammeIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modifyGamme']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueInt('gamme','id','nom','id_type','id_marque',$_GET['GammeId'],$_GET['GammeNom'],$_GET['Gamme_type'], $_GET['Gamme_marque']);
                   
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['GammeIdTracker']))
                {
                    // $nom = $tab[$i][1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la gamme ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('gamme', $_GET['GammeIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
                break;
            }

        }  
        echo "</table>";
        $page_item = '';
            $start = 0;

            $limite = " limite " . $start . "," . self::PAR_PAGE;

            $row_count = count($tab);

            if (!empty($row_count)){
                $page_count = ceil($row_count/self::PAR_PAGE);
                if ($page_count>1){
                    for ($i=1;$i<=$page_count;$i++) {
                        if ($i == $page) {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Gamme=?&page=$i'>$i</a>  </section> ";
                        } else {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Gamme=?&page=$i'>$i</a>  </section> ";
                        }
                    }
                }
                $page_item .= '</div>';
            }

            echo "<form method='get' action='admin.php' class='pagination'>";

            echo $page_item;

            echo "</form>";
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
                $page = 1;

                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                }
            
                        $pageArticles = '';
            
                        // On limite déjà nos articles
                        // On sélectionne les bons nombres d'articles et les articles correspondant à la page
                for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
                    
                    while (isset($tab)) 
                    {          
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='GenerationId' value='".$tab[$i][0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='GenerationNom' value='".$tab[$i][1]."'>
                        </td>";
                echo "  <td>
                            <input name='Generation_type' type='text' value='".$tab[$i][2]."'>
                        </td>";
                echo "  <td>
                            <input name='Generation_marque' type='text' value='".$tab[$i][3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyGeneration' value='modifier'>
                            <input type='hidden' name='GammeGeneration' id='hiddenId' value='".$tab[$i][0]."'> 
                        </td>
                    </form>
                    <form action='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='GenerationIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modifyGeneration']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueInt('generation','id','nom','id_type','id_marque',$_GET['GenerationId'],$_GET['GenerationNom'],$_GET['Generation_type'], $_GET['Generation_marque']);
           
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['GenerationIdTracker']))
                {
                    // $nom = $value[1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la Generation ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('generation', $_GET['GenerationIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php'); 
                }
                break;
            }  
        }     
        echo "</table>";
        $page_item = '';
            $start = 0;

            $limite = " limite " . $start . "," . self::PAR_PAGE;

            $row_count = count($tab);

            if (!empty($row_count)){
                $page_count = ceil($row_count/self::PAR_PAGE);
                if ($page_count>1){
                    for ($i=1;$i<=$page_count;$i++) {
                        if ($i == $page) {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Gamme=?&page=$i'>$i</a>  </section> ";
                        } else {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Gamme=?&page=$i'>$i</a>  </section> ";
                        }
                    }
                }
                $page_item .= '</div>';
            }

            echo "<form method='get' action='admin.php' class='pagination'>";

            echo $page_item;

            echo "</form>";
      

        }
    public function displayMarque()
    { // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllMarque();
    	

        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Constructeur</th>	
                    <th>image</th>	
                    <th>description</th>	                   
                </tr>";
                $page = 1;

                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                }
            
                        $pageArticles = '';
            
                        // On limite déjà nos articles
                        // On sélectionne les bons nombres d'articles et les articles correspondant à la page
                for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
                    
                    while (isset($tab)) 
                    {         
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='MarqueId' value='".$tab[$i][0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='MarqueNom' value='".$tab[$i][1]."'>
                        </td>";
                        echo "
                        <td>
                            <img src='".$tab[$i][2]."' class='display_img_size_backOffice'>
                        </td>";
                echo "  <td>
                            <input name='Marque_Img' type='text' value='".$tab[$i][2]."'>
                        </td>";
                        echo "  
                        <td>
                            <input name='Marque_description' type='text' value='".$tab[$i][3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyMarque' value='modifier'>
                            <input type='hidden' name='MarqueName' id='hiddenId' value='".$tab[$i][0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='MarqueIdTracker' id='suppr' value='".$tab[$i][0]."'>
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
                    // $nom = $value[1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la marque ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('marque', $_GET['MarqueIdTracker']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
                break;
            }  
        }
         
        echo "</table>";
        $page_item = '';
            $start = 0;

            $limite = " limite " . $start . "," . self::PAR_PAGE;

            $row_count = count($tab);

            if (!empty($row_count)){
                $page_count = ceil($row_count/self::PAR_PAGE);
                if ($page_count>1){
                    for ($i=1;$i<=$page_count;$i++) {
                        if ($i == $page) {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Marque=?&page=$i'>$i</a>  </section> ";
                        } else {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Marque=?&page=$i'>$i</a>  </section> ";
                        }
                    }
                }
                $page_item .= '</div>';
            }

            echo "<form method='get' action='admin.php' class='pagination'>";

            echo $page_item;

            echo "</form>";
    }
    public function displayEditeur()
    { // ->admin
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllEditeur();
    	

        echo"<table>
                <tr>
                    <th>Id</th>
                    <th>Editeur</th>	
                    <th>image</th>	
                    <th>description</th>	                   
                </tr>";
                $page = 1;

                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                }
            
                        $pageArticles = '';
            
                        // On limite déjà nos articles
                        // On sélectionne les bons nombres d'articles et les articles correspondant à la page
                for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
                    
                    while (isset($tab))         
                    { 
        
            echo "<tr>
                    <form action='' method='GET'>
                        <td>
                            <input type='number' name='MarqueIdEditeur' value='".$tab[$i][0]."'>
                        </td>"; // peut etre en hidden input
                echo "  <td>
                            <input type='text' name='MarqueEditeur' value='".$tab[$i][1]."'>
                        </td>";
                        echo "
                        <td>
                            <img src='".$tab[$i][2]."' class='display_img_size_backOffice'>
                        </td>";
                echo "  <td>
                            <input name='Marque_ImgEditeur' type='text' value='".$tab[$i][2]."'>
                        </td>";
                echo "  
                        <td>
                            <input name='Marque_descriptionEditeur' type='text' value='".$tab[$i][3]."'>
                        </td>
                        <td>
                            <input type='submit' id='Modifier' name='modifyMarqueEditeur' value='modifier'>
                            <input type='hidden' name='MarqueNameEditeur' id='hiddenId' value='".$tab[$i][0]."'> 
                        </td>
                    </form>
                    <form action ='' method='GET'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='MarqueIdTrackerEditeur' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_GET['modifyMarqueEditeur']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueStr('editeur','id','nom','image','description',$_GET['MarqueIdEditeur'],$_GET['MarqueEditeur'],$_GET['Marque_ImgEditeur'],$_GET['Marque_descriptionEditeur']);
                  
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_GET['MarqueIdTrackerEditeur']))
                {
                    // $nom = $value[1];
                    // echo "<p>etes-vous syr de vouloir supprimer la cet Editeur ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('editeur', $_GET['MarqueIdTrackerEditeur']);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                   
                }
                break;
            }  
        }
         
        echo "</table>";
        $page_item = '';
            $start = 0;

            $limite = " limite " . $start . "," . self::PAR_PAGE;

            $row_count = count($tab);

            if (!empty($row_count)){
                $page_count = ceil($row_count/self::PAR_PAGE);
                if ($page_count>1){
                    for ($i=1;$i<=$page_count;$i++) {
                        if ($i == $page) {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Marque=?&page=$i'>$i</a>  </section> ";
                        } else {
                            $page_item .=  "<section class='pageNumber'><a href='admin.php?Marque=?&page=$i'>$i</a>  </section> ";
                        }
                    }
                }
                $page_item .= '</div>';
            }

            echo "<form method='get' action='admin.php' class='pagination'>";

            echo $page_item;

            echo "</form>";
    }
    public function displayArticlesAdmin(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllArticles();
                //	id titre presentation description image image_2 image_3 note prix id_utilisateur id_type id_gamme id_marque id_generation promo date

        echo"<table>
        <tr>
            <th>Id</th>
            <th>Titre</th>	
            <th>Presentation</th>	
            <th>Description</th>	                   
            <th>Image_1</th>
            <th>Image_1</th>
            <th>Image_2</th>
            <th>Image_2</th>
            <th>Image_3</th>
            <th>Image_3</th>	                   
            <th>Note</th>	                   
            <th>Prix</th>	                   
            <th>Id_utilisateur</th>	                   
            <th>id_type</th>	                   
            <th>id_gamme</th>	                   
            <th>id_marque</th>	                   
            <th>id_generation</th>	                   
            <th>promo</th>	                   
            <th>date</th>	
            <th>vues</th>	
            <th>likey</th>	
            <th>id_editeur</th>	
                               
                         
        </tr>";
        $page = 1;

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
    
                $pageArticles = '';
    
                // On limite déjà nos articles
                // On sélectionne les bons nombres d'articles et les articles correspondant à la page
        for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
            
            while (isset($tab))         
            { 

        echo "<tr>
                <form action='' method='GET'>
                    <td>
                        <input type='number' name='ArticleId' class='input_petit' value='".$tab[$i][0]."'>
                    </td>"; // peut etre en hidden input
            echo "  <td>
                        <input type='text' name='ArticleTitre' value='".$tab[$i][1]."'>
                    </td>"; // titre
            echo "  <td>
                        <input type='text' name='ArticlePresentation' value='".$tab[$i][2]."'>
                    </td>"; // presentation
            echo "  <td>
                        <input type='text' name='ArticleDescription' value='".$tab[$i][3]."'>
                    </td>"; // description 
            echo "
                    <td>
                        <img src='".$tab[$i][4]."' class='display_img_size_backOffice '>
                    </td>"; // img 1 
            echo "  <td>
                        <input name='Article_Img_1' class='input_petit' type='text' value='".$tab[$i][4]."'>
                    </td>";
            echo "
                    <td>
                        <img src='".$tab[$i][5]."' class='display_img_size_backOffice'>
                    </td>"; // img 2
            echo "  <td>
                        <input name='Article_Img_2' type='text' class='input_petit' value='".$tab[$i][5]."'>
                    </td>";
            echo "
                    <td>
                        <img src='".$tab[$i][6]."' class='display_img_size_backOffice'>
                    </td>"; // img 3
            echo "  <td>
                        <input name='Article_Img_3' type='text' class='input_petit' value='".$tab[$i][6]."'>
                    </td>";
            echo "  <td>
                        <input type='number' name='ArticleNote' class='input_petit' value='".$tab[$i][7]."'>
                    </td>"; // note
            echo "  <td>
                        <input type='number' name='ArticlePrix'  class='input_petit' step='0.01' value='".$tab[$i][8]."'>
                    </td>"; // prix
            echo "  <td>
                    <input type='number' name='Article_id_utilisateur' class='input_petit'  value='".$tab[$i][9]."'>
                    </td>"; // id_utilisateur
            echo "  <td>
                        <input type='number' name='Article_id_type' class='input_petit' value='".$tab[$i][10]."'>
                    </td>"; // id_type
            echo "  <td>
                        <input type='number' name='Article_id_gamme'  class='input_petit' value='".$tab[$i][11]."'>
                    </td>"; // gamme
            echo "  <td>
                        <input type='number' name='Article_id_marque' class='input_petit' value='".$tab[$i][12]."'>
                    </td>"; // marque 
            echo "  <td>
                        <input type='number' name='Article_id_generation' class='input_petit' value='".$tab[$i][13]."'>
                    </td>"; // generation
            echo "  <td>
                        <input type='number' name='ArticlePromo' class='input_petit' value='".$tab[$i][14]."'>
                    </td>"; // promo
            echo "  <td>
                        <input type='text' name='ArticleDate' class='input_petit' value='".$tab[$i][15]."'>
                    </td>"; // date
                    echo "  <td>
                        <input type='number' name='ArticleVues' class='input_petit' value='".$tab[$i][16]."'>
                    </td>";
                    echo "  <td>
                        <input type='number' name='ArticleLikey' class='input_petit' value='".$tab[$i][17]."'>
                    </td>";
                    echo "  <td>
                        <input type='text' name='Article_id_editeur' class='input_petit' value='".$tab[$i][18]."'>
                    </td>";

            echo"   <td>
                        <input type='submit' id='Modifier' name='modifyArticle' value='modifier'>
                        <input type='hidden' name='ArticleName' id='hiddenId' value='".$tab[$i][0]."'> 
                    </td>
                </form>
                <form action ='' method='GET'>
                        <td>
                            <input type='submit' value='supprimer'>
                            <input type='hidden' name='ArticleIdTracker' id='suppr' value='".$tab[$i][0]."'>
                        </td>
                    </form>
            </tr>";
        if(isset($_GET['modifyArticle']))
        {
            $modelAdmin = new \Model\Admin();
            
            $modelAdmin->modifyArticleAdmin($_GET['ArticleId'],$_GET['ArticleTitre'],$_GET['ArticlePresentation']
            ,$_GET['ArticleDescription'],$_GET['Article_Img_1'],$_GET['Article_Img_2'],$_GET['Article_Img_3'],$_GET['ArticleNote']
            ,$_GET['ArticlePrix'], $_GET['Article_id_utilisateur'],$_GET['Article_id_type'],$_GET['Article_id_gamme'], $_GET['Article_id_marque']
            , $_GET['Article_id_generation'], $_GET['ArticlePromo'], $_GET['ArticleDate'], $_GET['ArticleVues'], $_GET['ArticleLikey']
            ,$_GET['Article_id_editeur']);

            $modelHttp = new \Http();
            $modelHttp->redirect('admin.php');
        }
        if(isset($_GET['ArticleIdTracker']))
        {
            // $nom = $value[1];
            // echo "<p>?tes-vous s?r de vouloir supprimer la marque ".$nom."?</p>";
                $modelAdmin = new \Model\Admin();
                $modelAdmin->deleteOneWhereId('articles', $_GET['ArticleIdTracker']);
                
                $modelHttp = new \Http();
                $modelHttp->redirect('admin.php');
           
        }
        break;
    }  
}
 
echo "</table>";
$page_item = '';
    $start = 0;

    $limite = " limite " . $start . "," . self::PAR_PAGE;

    $row_count = count($tab);

    if (!empty($row_count)){
        $page_count = ceil($row_count/self::PAR_PAGE);
        if ($page_count>1){
            for ($i=1;$i<=$page_count;$i++) {
                if ($i == $page) {
                    $page_item .=  "<section class='pageNumber'><a href='admin.php?Articles=?&page=$i'>$i</a>  </section> ";
                } else {
                    $page_item .=  "<section class='pageNumber'><a href='admin.php?Articles=?&page=$i'>$i</a>  </section> ";
                }
            }
        }
        $page_item .= '</div>';
    }

    echo "<form method='get' action='admin.php' class='pagination'>";

    echo $page_item;

    echo "</form>";
}    
public function displayArticles(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllArticles();
        $i = 0; 
        // var_dump($tab);
        
        $temp = 1; 
        echo '<section class="rowSection">';
        foreach($tab as $value){
            if($temp == 4){ //  ?a c'est le fun qui peut me test svp ??
                $temp = 1;
            }
            echo "<form action='article.php' method='get' class='form_article'>";
            echo "<button type='submit' class='buttom_comp' name='articleSelected' value= '".$value[0]."'>";
          
               
            
                echo "<p class='typo_comp'>". $value[1] ."<u></u></p>";

            // echo "<p class='typo_comp'><u>".$titre."</u></p>";
                echo "<img src='$value[2]' class='dimension_image'>";
           
            // echo $value[2]."<br />";
            // echo $value[3]."<br />";
            echo "<img class='dimension_image' src='$value[4]'>";
            // echo "<img src='$value[5]'>";
            // echo "<img src='$value[6]'>";
            // echo $value[7]."<br />";
            echo $value[8]."<br />";
            // echo $value[10]."<br />";
            // echo $value[11]."<br />";
            // echo $value[12]."<br />";
            // echo $value[13]."<br />";    
            echo $value[15]."<br />";
            echo "</button>";
            echo "</form>";
            
            if($temp % 3 === 0 ){
                echo '</section>';
                echo '<section  class="rowSection">';
            } 
            
            $temp++;
        }
    }

    

    public function displayUsers(){
        $modelDisplay = new \Model\Display();
        $tab = $modelDisplay->findAllUsers();
        // $controllerDisplay = new \Controller\Display();
        $page = 1;

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
    
                $pageArticles = '';
    
                // On limite déjà nos articles
                // On sélectionne les bons nombres d'articles et les articles correspondant à la page
        for ($i = (self::PAR_PAGE) * ($page-1); $i < self::PAR_PAGE * $page && $i < count($tab); $i++){
            while (isset($tab))         
            {             $mdp = $this->characterLimit($tab[$i][5],8);
            echo "<tr>"; 
                echo "<form action='' method='GET'>";
                    echo "<td><input type='number' name='UtilisateurId' value='".$tab[$i][0]."'></td>"; // peut etre en hidden input
                    echo "<td><input type='text' name='UtilisateurNom' value='".$tab[$i][1]."'></td>";
                    echo "<td><input type='text' name='UtilisateurPrenom' value='".$tab[$i][2]."'></td>";
                    echo "<td><input type='text' name='UtilisateurLogin' value='".$tab[$i][3]."'</td>";
                    echo "<td><input type='text' name='UtilisateurEmail'  value='".$tab[$i][4]."'</td>";
                    echo "<td>".$mdp."</td>"; // mdp 
                    echo "<td><img class='display_img_size_backOffice' src='".$tab[$i][6]."'></td>";
                    echo "<td><input type='text' name='UtilisateurImage'  value='".$tab[$i][6]."'</td>"; 
                    echo "<td><input type='number' name='UtilisateurId_droits' value='".$tab[$i][7]."'</td>"; 
                    echo "<td><input type='date' name='UtilisateurAnniversaire' value='".$tab[$i][8]."'</td>";

            echo"   <td>
                        <input type='submit' id='Modifier' name='modifyUtilisateur' value='modifier'>
                        <input type='hidden' name='UtilisateurName' id='hiddenId' value='".$tab[$i][0]."'> 
                    </td>
                </form>
                <form action ='' method='GET'>
                <td>
                        <input type='submit' value='supprimer'>
                        <input type='hidden' name='UtilisateurIdTracker' id='suppr' value='".$tab[$i][0]."'>
                </td>
            </form>
        </tr>";
        if(isset($_GET['UtilisateurName']))
        {
            $modelAdmin = new \Model\Admin();
            
            $modelAdmin->updateUtilisateur($_GET['UtilisateurName'],$_GET['UtilisateurNom'],$_GET['UtilisateurPrenom'],$_GET['UtilisateurLogin'],$_GET['UtilisateurEmail'],$_GET['UtilisateurImage'],$_GET['UtilisateurId_droits'],$_GET['UtilisateurAnniversaire']);
          
            $modelHttp = new \Http();
            $modelHttp->redirect('admin.php');
        }
        if(isset($_GET['UtilisateurIdTracker']))
        {
            // $nom = $value[3]; // login pas nom [1]
            // echo "<p>etes-vous sur de vouloir supprimer cet(te) Utilisateur(e) ".$nom."?</p>";
                $modelAdmin = new \Model\Admin();
                $modelAdmin->deleteOneWhereId('Utilisateur', $_GET['UtilisateurIdTracker']);
                
                $modelHttp = new \Http();
                $modelHttp->redirect('admin.php');
           
        }
        break;
    }  
}
 
echo "</table>";
$page_item = '';
    $start = 0;

    $limite = " limite " . $start . "," . self::PAR_PAGE;

    $row_count = count($tab);

    if (!empty($row_count)){
        $page_count = ceil($row_count/self::PAR_PAGE);
        if ($page_count>1){
            for ($i=1;$i<=$page_count;$i++) {
                if ($i == $page) {
                    $page_item .=  "<section class='pageNumber'><a href='admin.php?Articles=?&page=$i'>$i</a>  </section> ";
                } else {
                    $page_item .=  "<section class='pageNumber'><a href='admin.php?Articles=?&page=$i'>$i</a>  </section> ";
                }
            }
        }
        $page_item .= '</div>';
    }

    echo "<form method='get' action='admin.php' class='pagination'>";

    echo $page_item;

    echo "</form>";
}

   public function displaySelect($nomTable){
        $modelAdmin = new \Model\Admin();
        $tab = $modelAdmin->selectAllNom($nomTable);
        var_dump($tab);
        $i = 0;
        echo "<option value='0'>Aucun</option>";

        foreach($tab as $key => $value)
       {

        echo "<option value='".$value[0]."'>".$value[1]."</option>";
       }

    }
    public function displayOneTypeOfArticle($where,$id){
        $modelArticle = new \Model\Display();
        $tab = $modelArticle->selectOne('articles', '*', $where, $id);
        // var_dump($tab);
        $temp = 1;
        echo '<section  class="rowSection">';
        foreach ($tab as $key => $value) {

            if ($temp == 4) { //  ?a c'est le fun qui peut me test svp ??
                $temp = 1;
            }
            echo " <form action='article.php' method='GET' class='form_composant'> 
            <button type='submit' name='articleSelected' value='" . $value['id'] . " class='buttom_comp'>
            <br />
            <p class='typo_comp'><u>" . $value['titre'] . "</u></p>
            <img src='" . $value['image'] . "' class='dimension_image'>
            <p class='typo_comp'>" . $value['prix'] . "€</p><br />
            </button>
            </form>";

            if ($temp % 3 === 0) {
                echo '</section>';
                echo '<section  class="rowSection">';
            }

            $temp++;
        }
    }
    
            
    public function showFivePopularArticles(){
        echo '<h1 id="titre_cate">Nos produits populaires</h2>
        <div class="flex_accueil">';

        $modelArticle = new \Model\Article();
        $tab = $modelArticle->findFivePopularArticles();
            foreach($tab as $key => $value)
        {
            echo"
            <div class='box_flex_accueil'>
            <span class='typo_comp_accueil'>".$value[1]."</span>
            <img class='second_img' src='".$value[4]."'>
            <p class='prix_accueil'>".$value[8]."€</p>
            </div>";
        }

        echo '</div>';
    }
}

?>