<?php
//LIBRARIES
ob_start();
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/config/http.php');
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/Controller/Display.php');
require_once('../libraries/model/Admin.php');
require_once('../libraries/model/Display.php');
require_once('../libraries/config/utils.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/admin.css";
$Pagenom = "Admin";
$footer = "../css/footer.css";

//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$articles = "articles.php";
$commande = "commande.php";
$panier = "panier.php";
$admin = "admin.php";
$deconnexion = "../index.php?off=1";
//HEADER
require('../require/html_/header.php');

$controllerAdmin = new \Controller\Admin();
$modelAdmin  = new \Model\Admin();

$controllerDisplay  = new \Controller\Display();
$modelDisplay  = new \Model\Display();

var_dump($_SESSION);

?>

<main>
<!--On créer nous meme ce qui va dans les Select pour éviter les mauvaises manip des potentiels autre admin--> 
<section>
    <form action='' method='POST'>
        <button type='submit' class='cleanButton' name='cleanButton'>Clean</button>
    </form>
    <?php
    if(isset($_POST['cleanButton'])){
        $_POST = NULL;
    }
    ?>
</section>
<section>
<form method="POST" action=''>
    <button name="addElement" class='adminInterface' type="submit">Ajouter un élément</button>
</form>
<?php if(isset($_POST['addElement'])){ 
    echo '<form action="" method="POST">
                <label for="createType">Créer un nouveau type d article</label>
                <input type="text" name="createType" placeholder="TELEVISION">
                <input type="submit" name="submitType">
            </form>';
        
        if(isset($_POST['submitType'])){
           $controllerAdmin->verifyAndInsertOne('type', 'nom' , $_POST['createType']);
        }?>
<!-- Insérer une generation -->
<section>

    <form action="" method="POST">
        <label for="NameGeneration">Créer une nouvelle generation d'article</label>
        <input type="text" name="NameGeneration" placeholder="Intel 9th">
        
        <select name="GenerationSelected1">
        <?php
            $controllerDisplay->displaySelect('type');
        ?>
        </select>
        <select name="GenerationSelected2">
        <?php
            $controllerDisplay->displaySelect('marque');
        ?>
        </select>
        <input type='submit' name="submitGeneration">
        <?php
        if(isset($_POST['submitGeneration']))
        {
           $controllerAdmin->createWithThreeValues('generation' ,$_POST['NameGeneration'], $_POST['GenerationSelected1'] , $_POST['GenerationSelected2']);
        }
            ?>

    </form>
</section>
<!-- Insérer une gamme -->
<section>
    <form action="" method="POST">
        <label for="createGamme">Créer une nouvelle gamme d'article</label>
        <input type="text" name="createGamme" placeholder="I-9 RTX-2080">
        <input type='submit' name="submitGamme">
        <select name="gammeSelected1">
        <?php
        $controllerDisplay->displaySelect('type');
       
        ?>
        </select>
        <select name="gammeSelected2">
        <?php
        $controllerDisplay->displaySelect('marque');
        ?>
        </select>
        <?php
        if(isset($_POST['submitGamme']))
        {
           $controllerAdmin->createWithThreeValues('gamme', $_POST['createGamme'], $_POST['gammeSelected1'] , $_POST['gammeSelected2']);
        }
        ?>
    </form>
</section>
<!-- Insérer un type -->
<section>
    <form action="" method="POST">
        <label for="NameBrand">Nom marque</label>
        <input type="text" name="NameBrand" placeholder="MSI">

        <label for="imageBrand">Image</label>
        <p>ici normal c insert photo</p>
        <input type="number" name="imageBrand" placeholder="MSI">
        <input type='submit' name="submitBrand">
        
        <label for="descriptionMarque">Description marque</label>
        <textarea name="descriptionMarque"></textarea>
        <?php
        if(isset($_POST['submitBrand']))
        {
           $controllerAdmin->verifyAndInsertOne('type', 'nom' , $_POST['NameBrand']);
           $controllerAdmin->createBrand($_POST['NameBrand'], $_POST['imageBrand'], $_POST['descriptionMarque']);
        // j'utilise pas insertThreeValue car c'est une fonction specifique aux colonnes qu'elle vise
        }
        ?>
    </form>
    
</section>
    <?php } ?>
</section>
<!-- Ici ce sera creation article-->
    <section>
        <form method='POST' action=''>
            <button name='addProduct' type='submit' class='adminInterface'> Ajouter un produit </button>
        </form>
        <?php
        
        if(isset($_POST['addProduct'])){
           
            ?>
            <form action= "" method="POST">
            <label for="title">Titre</label><br />
            <input type="text" name="title" placeholder="Ordinateur quantique" required><br />
            		
            <label for="presentation">Présentation</label><br />
            <input type="text" name="presentation" placeholder="les origines du produit"><br />
            
            <label for="description">Description</label><br />
            <input type="text" name="description" placeholder="Caractéristiques techniques" required><br />

            <label for="image">Image principale</label><br />
            <input type="" name="image" placeholder=""><br />

            <label for="image_2">Image secondaire</label><br />
            <input type="" name="image_2" placeholder=""><br />

            <label for="image_3">Image tierce</label><br />
            <input type="" name="image_3" placeholder=""><br />

            <label for="prix">Prix</label><br />
            <input type="number" name="prix" placeholder=""><br />

            <p>Categorie</p>
            <label for="typeCreateArticle">type</label><br />
            <select name="typeCreateArticle">
                <?php
                $controllerDisplay->displaySelect('type');
                // $titre,$description,$image,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation

                ?>
            </select>
            <label for="generation">Generation</label><br />
            <select name="generation">
                <?php
                $controllerDisplay->displaySelect('generation');
                ?>
            </select>

             <br /><label for="gamme">Gamme</label><br />
            <select name="gamme">
                <?php
                    $controllerDisplay->displaySelect('gamme');
                ?>
             </select>
             <br /><label for="marque">Marque</label><br />
            <select name="marque">
                <?php
                    $controllerDisplay->displaySelect('marque');
       
                ?>
             </select>
             <input type='submit' name='submitNewCategorie'>
             
        </form>
        <?php
        if(isset($_POST['submitNewCategorie'])){
            $id_utilisateur = $_SESSION['utilisateur']['id'];
             $controllerAdmin->createArticle($_POST['title'],$_POST['presentation'],$_POST['description'],$_POST['image'],$_POST['image_2'],$_POST['image_3']
             ,$_POST['prix'],$id_utilisateur, $_POST['typeCreateArticle'],$_POST['generation'],$_POST['gamme'],$_POST['marque']);
        }
        
        }
    
        
    

    ?>
    </section>

<section>
        <form method='POST' action=''>
            <button type='submit' class='adminInterface' name='Utilisateurs'>Voir les utilisateurs</button>
        </form>

    <?php
        if(isset($_POST['Utilisateurs'])){

        echo "<table>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>login</th>
                    <th>emain</th>
                    <th>password</th>
                    <th>image</th>
                    <th>id_droits</th>
                    <th>anniversaire</th>
                    <th>id_adresse</th>
                </tr>";
        $controllerDisplay->displayUsers();
        echo "</table>";
        }?>
    </section>
        <section>
            <form method='POST' action=''>
                <button type='submit' class='adminInterface' name='Type'>Voir les types de produits</button>
            </form>
            <?php
            if(isset($_POST['Type'])){
        $controllerDisplay->displayType();
            }
        ?>
    </section>
    <!-- Gamme -->
    <section>
            <form method='POST' action=''>
                <button type='submit' class='adminInterface' name='Gamme'>Voir les gammes de produits</button>
            </form>
            <?php
            if(isset($_POST['Gamme'])){
        $controllerDisplay->displayGamme();
            }
        ?>
    </section>
  <!-- Marque -->
  <section>
            <form method='POST' action=''>
                <button type='submit' class='adminInterface' name='Marque'>Voir les Marques</button>
            </form>
            <?php
            if(isset($_POST['Marque'])){
        $controllerDisplay->displayMarque();
            }
        ?>
    </section>
     <!-- Generation -->
  <section>
            <form method='POST' action=''>
                <button type='submit' class='adminInterface' name='Generation'>Voir les Generation</button>
            </form>
            <?php
            if(isset($_POST['Generation'])){
        $controllerDisplay->displayGeneration();
            }
        ?>
    </section>
     <!-- Article -->
     <section>
            <form method='POST' action=''>
                <button type='submit' class='adminInterface' name='Article'>Voir les Generation</button>
            </form>
            <?php
            if(isset($_POST['Article'])){
        $controllerDisplay->displayArticle();
            }
        ?>
    </section>










</main>
<?php
ob_end_flush();
?>