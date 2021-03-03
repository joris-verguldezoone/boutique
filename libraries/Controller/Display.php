<?php

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
                    <form action='' method='POST'>
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
                    <form action ='' method='POST'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='TypeIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_POST['modify']))
                {
                    $modelAdmin = new \Model\Admin();
                    $modelAdmin->updateThreeValue("type",'id','nom','image',$_POST['typeId'],$_POST['typeNom'],$_POST['typeImg']);
                    
                    // $_GET = NULL;
                    // $_POST = NULL;
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_POST['TypeIdTracker']))
                {
                    // $nom = $value[1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la cat?gorie ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('type', $_POST['TypeIdTracker']);
                        
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
                    <form action='' method='POST'>
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
                    <form action ='' method='POST'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='GammeIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_POST['modifyGamme']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueInt('gamme','id','nom','id_type','id_marque',$_POST['GammeId'],$_POST['GammeNom'],$_POST['Gamme_type'], $_POST['Gamme_marque']);
                    // $_GET = NULL;
                    // $_POST = NULL;
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_POST['GammeIdTracker']))
                {
                    // $nom = $tab[$i][1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la gamme ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('gamme', $_POST['GammeIdTracker']);
                        
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
                    <form action='' method='POST'>
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
                    <form action='' method='POST'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='GenerationIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_POST['modifyGeneration']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueInt('generation','id','nom','id_type','id_marque',$_POST['GenerationId'],$_POST['GenerationNom'],$_POST['Generation_type'], $_POST['Generation_marque']);
                    // $_GET = NULL;
                    // $_POST = NULL;
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_POST['GenerationIdTracker']))
                {
                    // $nom = $value[1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la Generation ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('generation', $_POST['GenerationIdTracker']);
                        
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
                    <form action='' method='POST'>
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
                    <form action ='' method='POST'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='MarqueIdTracker' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_POST['modifyMarque']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueStr('marque','id','nom','image','description',$_POST['MarqueId'],$_POST['MarqueNom'],$_POST['Marque_Img'],$_POST['Marque_description']);
                  
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_POST['MarqueIdTracker']))
                {
                    // $nom = $value[1];
                    // echo "<p>?tes-vous s?r de vouloir supprimer la marque ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('marque', $_POST['MarqueIdTracker']);
                        
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
                    <form action='' method='POST'>
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
                    <form action ='' method='POST'>
                            <td>
                                <input type='submit' value='supprimer'>
                                <input type='hidden' name='MarqueIdTrackerEditeur' id='suppr' value='".$tab[$i][0]."'>
                            </td>
                        </form>
                </tr>";
                if(isset($_POST['modifyMarqueEditeur']))
                {
                    $modelAdmin = new \Model\Admin();
                    
                    $modelAdmin->updateFourValueStr('editeur','id','nom','image','description',$_POST['MarqueIdEditeur'],$_POST['MarqueEditeur'],$_POST['Marque_ImgEditeur'],$_POST['Marque_descriptionEditeur']);
                  
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
                if(isset($_POST['MarqueIdTrackerEditeur']))
                {
                    // $nom = $value[1];
                    // echo "<p>etes-vous syr de vouloir supprimer la cet Editeur ".$nom."?</p>";
                        $modelAdmin = new \Model\Admin();
                        $modelAdmin->deleteOneWhereId('editeur', $_POST['MarqueIdTrackerEditeur']);
                        
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
                        <input type='number' name='ArticleId' value='".$tab[$i][0]."'>
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
                        <img src='".$tab[$i][4]."' class='display_img_size_backOffice'>
                    </td>"; // img 1
            echo "  <td>
                        <input name='Article_Img_1' type='text' value='".$tab[$i][4]."'>
                    </td>";
            echo "
                    <td>
                        <img src='".$tab[$i][5]."' class='display_img_size_backOffice'>
                    </td>"; // img 2
            echo "  <td>
                        <input name='Article_Img_2' type='text' value='".$tab[$i][5]."'>
                    </td>";
            echo "
                    <td>
                        <img src='".$tab[$i][6]."' class='display_img_size_backOffice'>
                    </td>"; // img 3
            echo "  <td>
                        <input name='Article_Img_3' type='text' value='".$tab[$i][6]."'>
                    </td>";
            echo "  <td>
                        <input type='number' name='ArticleNote' value='".$tab[$i][7]."'>
                    </td>"; // note
            echo "  <td>
                        <input type='number' name='ArticlePrix' value='".$tab[$i][8]."'>
                    </td>"; // prix
            echo "  <td>
                    <input type='number' name='Article_id_utilisateur' value='".$tab[$i][9]."'>
                    </td>"; // id_utilisateur
            echo "  <td>
                        <input type='number' name='Article_id_type' value='".$tab[$i][10]."'>
                    </td>"; // id_type
            echo "  <td>
                        <input type='number' name='Article_id_gamme' value='".$tab[$i][11]."'>
                    </td>"; // gamme
            echo "  <td>
                        <input type='number' name='Article_id_marque' value='".$tab[$i][12]."'>
                    </td>"; // marque 
            echo "  <td>
                        <input type='number' name='Article_id_generation' value='".$tab[$i][13]."'>
                    </td>"; // generation
            echo "  <td>
                        <input type='number' name='ArticlePromo' value='".$tab[$i][14]."'>
                    </td>"; // promo
            echo "  <td>
                        <input type='text' name='ArticleDate' value='".$tab[$i][15]."'>
                    </td>"; // date
                    echo "  <td>
                        <input type='number' name='ArticleVues' value='".$tab[$i][16]."'>
                    </td>";
                    echo "  <td>
                        <input type='number' name='ArticleLikey' value='".$tab[$i][17]."'>
                    </td>";
                    echo "  <td>
                        <input type='text' name='Article_id_editeur' value='".$tab[$i][18]."'>
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
                echo "<form action='' method='POST'>";
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
                <form action ='' method='POST'>
                <td>
                        <input type='submit' value='supprimer'>
                        <input type='hidden' name='UtilisateurIdTracker' id='suppr' value='".$tab[$i][0]."'>
                </td>
            </form>
        </tr>";
        if(isset($_POST['UtilisateurName']))
        {
            $modelAdmin = new \Model\Admin();
            
            $modelAdmin->updateUtilisateur($_POST['UtilisateurName'],$_POST['UtilisateurNom'],$_POST['UtilisateurPrenom'],$_POST['UtilisateurLogin'],$_POST['UtilisateurEmail'],$_POST['UtilisateurImage'],$_POST['UtilisateurId_droits'],$_POST['UtilisateurAnniversaire']);
          
            $modelHttp = new \Http();
            $modelHttp->redirect('admin.php');
        }
        if(isset($_POST['UtilisateurIdTracker']))
        {
            $nom = $value[3]; // login pas nom [1]
            echo "<p>�tes-vous sur de vouloir supprimer cet(te) Utilisateur(e) ".$nom."?</p>";
                $modelAdmin = new \Model\Admin();
                $modelAdmin->deleteOneWhereId('Utilisateur', $_POST['UtilisateurIdTracker']);
                
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
        foreach($tab as $key => $value)
       {
        echo "<option value='".$value[0]."'>".$value[1]."</option>";
       }

    }
    public function displayOneTypeOfArticle($where,$id){
        $modelArticle = new \Model\Display();
        $tab = $modelArticle->selectOne('articles', '*', $where ,$id );
        var_dump($tab);
        foreach($tab as $key => $value){
            echo" <form action='article.php' method='GET'> 
            <button type='submit' name='articleSelected' value='".$value['id']."'>
            <br />
            ".$value['titre']."<br />
             <img src='".$value['image']."'>
             ".$value['prix']."<br />
             </button>
             </form>";
        }

    }
    public function DisplayOneArticle($id){
        $modelArticle = new \Model\Display();
        $tab = $modelArticle->selectOne('articles', '*', 'id' ,$id );
        
            $modelArticle = new \Model\Article();
            $modelArticle->IncrementView($id,$_SESSION['utilisateur']['id']);
        
        foreach($tab as $key => $value){
            //	id titre presentation description image  image_2 image_3 note prix id_utilisateur id_type  id_gamme  id_marque id_generation promo date 
            echo" <section> 
            
            <p>".$value['titre']."</p>
            <p>".$value['presentation']."</p>
            <p>".$value['description']."</p>
            <img src='".$value['image']."'>
            <img src='".$value['image_2']."'>
            <img src='".$value['image_3']."'>
            <p>".$value['note']."</p>
            <p>".$value['prix']."</p>
         
            
             </section>";
             echo "<form action='' method='GET'>
             <button name='like' type='submit'></button>
             <button name='dislike' type='submit'></button>
             </form>";
             if(isset($_GET['like'])){
                 
            }
            if(isset($_GET['dislike'])){
                 
            }
        }
    }
    public function showFivePopularArticles(){
        $modelArticle = new \Model\Article();
        $tab = $modelArticle->findFivePopularArticles();
        foreach($tab as $key => $value)
        {
            echo"
            <p>".$value[1]."</p>
            <p>".$value[2]."</p>
            <p>".$value[3]."</p>
            <img class='main_img' src='".$value[4]."'>
            <img class='second_img' src='".$value[5]."'>
            <img class='tierce_img' src='".$value[6]."'>
            <p>".$value[7]."</p>
            <p>".$value[8]."</p>
            <p>".$value[12]."</p>";
        }
    }
}

?>