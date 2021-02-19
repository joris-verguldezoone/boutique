<main>
    <form action="" method="POST" id="bloc_creation">

    <label name="titre">Titre</label>
    <input type="text" id="titreCreerArticle" name="titre">

    <label name="article">Article</label>
    <textarea type="text" id="creerArticle" name="article" value="le contenue de mon article..." rows="10" cols="60" placeholder="2000 caractères maximum."></textarea>

        <label id="categorie">Type</label>
    <select name="categories" id="select_creation">
    
    <?php $modelArticle = new \Models\Display();
           $tableau = $modelArticle->findAllCategories();
           foreach ($tableau as $key => $value) {
               $nom = $value[0]; // 0 = nom 1 = id
            echo "<option>".$nom."</option>";
        }
            
        
        ?>
   
    </select>
    <input type="submit" id="idarticleSubmit" name="articleSubmit">

        <?php
         if(isset($_POST['articleSubmit'])){
            $createArticle = new \Controller\Article();
            $createArticle->createArticle($_POST['titre'],$_POST['article'], $_POST['categories']);
        }
        ?>


    </form>
