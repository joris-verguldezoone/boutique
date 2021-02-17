<?php
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Admin.php');
require_once('../libraries/config/utils.php');


$controllerInsert = new \Controller\Admin();
$ModelTest  = new \Model\Admin();
var_dump($_SESSION);
?>

<main>
<!--On créer nous meme ce qui va dans les Select pour éviter les mauvaises manip des potentiels autre admin--> 
<section>
    <form action="" method="POST">
        <label for="createType">Créer un nouveau type d'article</label>
        <input type="text" name="createType" placeholder="TELEVISION">
        <input type='submit' name="submitType">
        <?php
        if(isset($_POST['submitType'])){
           $controllerInsert->verifyAndInsertOne('type', 'nom' , $_POST['createType']);
        }
        ?>
    </form>
</section>

<!--GENERATION-->
<section>
    <form action="" method="POST">
        <label for="NameGeneration">Créer une nouvelle generation d'article</label>
        <input type="text" name="NameGeneration" placeholder="Intel 9th">
        
        <select name="GenerationSelected1">
        <?php
            $controllerInsert->displaySelect('type');
        ?>
        </select>
        <select name="GenerationSelected2">
        <?php
            $controllerInsert->displaySelect('marque');
        ?>
        </select>
        <input type='submit' name="submitGeneration">
        <?php
        if(isset($_POST['submitGeneration']))
        {
           $controllerInsert->createWithThreeValues('generation' ,$_POST['NameGeneration'], $_POST['GenerationSelected1'] , $_POST['GenerationSelected2']);
        }
            ?>

    </form>
</section>
<section>
    <form action="" method="POST">
        <label for="createGamme">Créer une nouvelle gamme d'article</label>
        <input type="text" name="createGamme" placeholder="I-9 RTX-2080">
        <input type='submit' name="submitGamme">
        <select name="gammeSelected1">
        <?php
        $controllerInsert->displaySelect('type');
       
        ?>
        </select>
        <select name="gammeSelected2">
        <?php
        $controllerInsert->displaySelect('marque');
        ?>
        </select>
        <?php
        if(isset($_POST['submitGamme']))
        {
           $controllerInsert->createWithThreeValues('gamme', $_POST['createGamme'], $_POST['gammeSelected1'] , $_POST['gammeSelected2']);
        }
        ?>
    </form>
</section>
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
           $controllerInsert->verifyAndInsertOne('type', 'nom' , $_POST['NameBrand']);
           $controllerInsert->createBrand($_POST['NameBrand'], $_POST['imageBrand'], $_POST['descriptionMarque']);
        // j'utilise pas insertThreeValue car c'est une fonction specifique aux colonnes qu'elle vise
        }
        ?>
    </form>
    
</section>


<!---->


<!-- Ici ce sera creation article-->
    <section>
        <form action= "" method="POST">
            <label for="title">Titre</label><br />
            <input type="text" name="title" placeholder="Ordinateur quantique" required><br />
            		
            <label for="presentation">Présentation</label><br />
            <input type="text" name="presentation" placeholder="les origines du produit"><br />
            
            <label for="description">Description</label><br />
            <input type="text" name="description" placeholder="Caractéristiques techniques" required><br />

            <label for="image">Image</label><br />
            <input type="" name="image" placeholder=""><br />

            <label for="prix">Prix</label><br />
            <input type="number" name="prix" placeholder=""><br />

            <p>Categorie</p>
            <label for="typeCreateArticle">type</label><br />
            <select name="typeCreateArticle">
                <?php
                $controllerInsert->displaySelect('type');
                // $titre,$description,$image,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation

                ?>
            </select>
            <label for="generation">Generation</label><br />
            <select name="generation">
                <?php
                $controllerInsert->displaySelect('generation');
                ?>
            </select>

             <br /><label for="gamme">Gamme</label><br />
            <select name="gamme">
                <?php
                    $controllerInsert->displaySelect('gamme');
                ?>
             </select>
             <br /><label for="marque">Marque</label><br />
            <select name="marque">
                <?php
                    $controllerInsert->displaySelect('marque');
       
                ?>
             </select>
             <input type='submit' name='submitNewCategorie'>
             
        </form>
        <?php
        if(isset($_POST['submitNewCategorie'])){
            $id_utilisateur = $_SESSION['utilisateur']['id'];
             $controllerInsert->createArticle($_POST['title'],$_POST['presentation'],$_POST['description'],$_POST['image']
             ,$_POST['prix'],$id_utilisateur, $_POST['typeCreateArticle'],$_POST['generation'],$_POST['gamme'],$_POST['marque']);
        }
        
        ?>
    </section>













</main>