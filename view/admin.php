<?php
$bdd = "../libraries/config/bdd.php";
require_once('../libraries/Controller/Admin.php');
require_once('../libraries/model/Admin.php');


$controllerInsert = new \Controller\Admin();
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
           $controllerInsert->verifyAndInsertOne('type_article', 'type' , $_POST['createType']);
        }
        ?>
    </form>
</section>
<section>
    <form action="" method="POST">
        <label for="createGeneration">Créer une nouvelle generation d'article</label>
        <input type="text" name="createGeneration" placeholder="Intel 9th">
        <input type='submit' name="submitGeneration">

    </form>
</section>
<section>
    <form action="" method="POST">
        <label for="createGamme">Créer une nouvelle gamme d'article</label>
        <input type="text" name="createGamme" placeholder="I-9 RTX-2080">
        <input type='submit' name="submitGamme">
    </form>
</section>
<section>
    <form action="" method="POST">
        <label for="createMarque">Insérer une nouvelle marque</label>
        <input type="text" name="createMarque" placeholder="MSI">
        <input type='submit' name="submitMarque">
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

            <label for="type">type</label><br />
            <select name="type">
            <option>Stockage/Processeur?</option>
            <?php
                //php
            ?>
             </select>
            <p>Categorie</p>
            <label for="generation">Generation</label><br />
            <select name="generation">
            <option>Quelle Architecture?</option>
            <?php
            ?>
             </select>

             <br /><label for="gamme">Gamme</label><br />
            <select name="gamme">
            <option>+i3 ou +i9?</option>

            <?php
                //php
            ?>
             </select>
             <br /><label for="marque">Marque</label><br />
            <select name="marque">
            <option>Pas Apple</option>

            <?php
                //php
            ?>
             </select>


        </form>
    </section>













</main>