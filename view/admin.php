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
require_once('../libraries/Controller/DisplayArticle.php');



//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/admin.css";
$Pagenom = "Admin";
$footer = "../css/footer.css";
$logo = "../images/logo.jpg";
$chemin_logo = "../index.php";
$logo_header = "../images/logo.jpg";

//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$articles = "articles.php";
$commande = "commande.php";
$panier = "panier.php";
$admin = "admin.php";
$deconnexion = "deconnexion.php";
$marques = 'marques.php';
$editeurs = 'editeurs.php';
$contact = "contact.php";


$autocomplete_path = "../libraries/js/header.js";

//HEADER
$all_ArticlesPath = 'articles.php?';
$typePath = 'articles.php?typeSelected';
$marquePath = 'articles.php?marqueSelected';
$gammePath =  'articles.php?gammeSelected';
$headerJS = '../libraries/js/header.js';

require('../require/html_/header.php');



//PATHS
$controllerAdmin = new \Controller\Admin();
$modelAdmin  = new \Model\Admin();

$controllerDisplay  = new \Controller\Display();
$modelDisplay  = new \Model\Display();

$http = new \Http();

// var_dump($_SESSION);
?>

<main>
    <!--On créer nous meme ce qui va dans les Select pour éviter les mauvaises manip des potentiels autre admin-->
    <section>
        <form action='' method='POST'>
            <button type='submit' class='cleanButton' name='cleanButton'>Clean</button>
        </form>
        <?php
        if (isset($_POST['cleanButton'])) {
            $_POST = NULL;
            $http->redirect('admin.php');
        }
        ?>
    </section>
    <section class='flex_creation'>
        <section class='flex_column_buttons'>
            <section class='flex_row_buttons'>
                <section>
                    <form method="GET" action=''>
                        <button name="addElement" class='adminInterfaceCreate' type="submit">Ajouter un élément</button>
                    </form>
                </section>

                <!-- Ici ce sera creation article-->
                <section>
                    <form method='GET' action=''>
                        <button name='addProduct' type='submit' class='adminInterfaceCreate'> Ajouter un produit </button>
                    </form>
                </section>
                <!-- <form method='POST' action=''>
                        <button name='addProduct_POST' type='submit' class='adminInterface'> Afficher</button>
                    </form> -->

            </section>
            <section class="flex_row_buttons">
                <section>
                    <form method='POST' action=''>
                        <button type='submit' class='adminInterface' name='Utilisateurs'>Voir les utilisateurs</button>
                    </form>
                </section>
                <section>
                    <form method='POST' action=''>
                        <button type='submit' class='adminInterface' name='Type'>Voir les types de produits</button>
                    </form>
                </section>
                <!-- Gamme -->
                <section>
                    <form method='POST' action=''>
                        <button type='submit' class='adminInterface' name='Gamme'>Voir les gammes de produits</button>
                    </form>
                </section>
                <!-- Marque -->
                <section>
                    <form method='POST' action=''>
                        <button type='submit' class='adminInterface' name='Marque'>Voir les Marques</button>
                    </form>
                </section>
                <!-- Generation -->
                <section>
                    <form method='POST' action=''>
                        <button type='submit' class='adminInterface' name='Generation'>Voir les Generation</button>
                    </form>
                </section>
                <!-- Article -->
                <section>
                    <form method='POST' action=''>
                        <button type='submit' class='adminInterface' name='Article'>Voir les Articles</button>
                    </form>
                </section>
            </section>
        </section>
        <!--  -->




        <section class='creation'>
            <section class='creation_display'>
                <section class='flex_column_display'>

                    <?php

                    if (isset($_GET['addElement'])) {
                        echo '<span class="titre_block">Ajouter un element</span>';
                        echo '<form action="" method="POST">
                    <div class="flex_row_buttons_label">

                        <label for="createType">Créer un nouveau type d article</label>
                        <input type="text" name="createType" placeholder="TELEVISION">
                        <input type="text" name="createTypeImg" placeholder="Url image">
                        <input type="submit" name="submitType">
                    </div>
                </form>';

                        if (isset($_POST['submitType'])) {
                            $controllerAdmin->verifyAndInsertTwo('type', 'nom', 'image', $_POST['createType'], $_POST['createTypeImg']);
                        }
                        // ajouter une nouvelle gamme
                    ?>
                        <section>
                            <div class='flex_row_buttons_label'>

                                <form action="" method="POST">
                                    <label for="NameBrand">Nom marque</label>
                                    <input type="text" name="NameBrand" placeholder="INTEL">

                                    <label for="NameEditor">Nom Editeur</label>
                                    <input type="text" name="NameEditor" placeholder="MSI">

                                    <label for="imageBrand">Image</label>
                                    <input type="text" name="imageBrand" placeholder="MSI">

                                    <img class='display_img_size_backOffice' src='https://www.electroguide.com/images/icones-marques/logo-msi.jpg'>
                            </div>
                            <div class='flex_row_buttons_label'>

                                <label for="descriptionMarque">Description marque</label>
                                <textarea name="descriptionMarque"></textarea>

                                <input type='submit' name="submitBrand">
                            </div>
                            <?php
                            if (isset($_POST['submitBrand'])) {
                                $isEmpty = strlen($_POST['NameEditor']);
                                echo $isEmpty;
                                if ($isEmpty == 0) {
                                    echo "ee";

                                    // $controllerAdmin->verifyAndInsertOne('type', 'nom' , $_POST['NameBrand']);
                                    $controllerAdmin->verifyAndInsertThree('marque', 'nom', 'image', 'description', $_POST['NameBrand'], $_POST['imageBrand'], $_POST['descriptionMarque']);
                                    // j'utilise pas insertThreeValue car c'est une fonction specifique aux colonnes qu'elle vise

                                } else {
                                    echo $isEmpty;

                                    // $controllerAdmin->verifyAndInsertOne('type', 'nom' , $_POST['NameBrand']);
                                    $controllerAdmin->verifyAndInsertThree('editeur', 'nom', 'image', 'description', $_POST['NameEditor'], $_POST['imageBrand'], $_POST['descriptionMarque']);
                                    // j'utilise pas insertThreeValue car c'est une fonction specifique aux colonnes qu'elle vise
                                }
                            }
                            ?>
                            </form>

                            <!-- Insérer une generation -->

                            <form action="" method="POST">
                                <div class='flex_row_buttons_label'>

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
                                </div>

                                <?php
                                if (isset($_POST['submitGeneration'])) {
                                    $controllerAdmin->createWithThreeValues('generation', 'nom', 'id_type', 'id_marque', $_POST['NameGeneration'], $_POST['GenerationSelected1'], $_POST['GenerationSelected2']);
                                }
                                ?>

                            </form>

                            <!-- Insérer une gamme -->

                            <div class='flex_row_buttons_label'>

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
                                    <select name="gammeSelected3">
                                        <?php
                                        $controllerDisplay->displaySelect('editeur');
                                        ?>
                                    </select>
                                    <?php
                                    if (isset($_POST['submitGamme'])) {
                                        $controllerAdmin->createWithFourValues('gamme', 'nom', 'id_type', 'id_marque', 'id_editeur', $_POST['createGamme'], $_POST['gammeSelected1'], $_POST['gammeSelected2'], $_POST['gammeSelected3']);
                                    }
                                    ?>
                                </form>
                            </div>

                            <!-- Insérer une marque -->
                        <?php } ?>

                        <!--  -->

                        <?php
                        if (isset($_GET['addProduct']) || isset($_POST['addProduct_POST'])) {

                        ?>
                            <form action="" method="POST">
                                <div class='display_flex_center_titre'>
                                    <span class='titre_block'>Ajouter un article</span><br />
                                </div>
                                <div class='flex_row_buttons_label'>
                                    <label for="title">Titre</label><br />
                                    <input type="text" class='input_margin' name="title" placeholder="Ordinateur quantique" required><br />

                                    <label for="presentation">Présentation</label><br />
                                    <input type="text" class='input_margin' name="presentation" placeholder="les origines du produit"><br />

                                    <label for="description">Description</label><br />
                                    <input type="text" class='input_margin' name="description" placeholder="Caractéristiques techniques" required><br />
                                </div>
                                <div class='flex_row_buttons_label'>

                                    <label for="image">Image principale</label><br />
                                    <input type="text" class='input_margin' name="image" placeholder=""><br />

                                    <label for="image_2">Image secondaire</label><br />
                                    <input type="text" class='input_margin' name="image_2" placeholder=""><br />

                                    <label for="image_3">Image tierce</label><br />
                                    <input type="text" class='input_margin' name="image_3" placeholder=""><br />
                                </div>
                                <div class='flex_row_buttons_label'>

                                    <label for="prix">Prix</label><br />
                                    <input type="number" class='input_margin' step=".01" name="prix" placeholder=""><br />
                                </div>
                                <div class='display_flex_center_titre'>
                                    <span class='titre_block'>Categories</span><br />
                                </div>
                                <div class='flex_row_buttons_label'>

                                    <label for="typeCreateArticle">Type</label><br />
                                    <select class='input_margin' name="typeCreateArticle">
                                        <?php
                                        $controllerDisplay->displaySelect('type');
                                        // $titre,$description,$image,$prix,$id_utilisateur,$id_type, $id_gamme, $id_marque,$id_generation

                                        ?>
                                    </select>
                                    <label for="generation">Generation</label><br />
                                    <select class='input_margin' name="generation">
                                        <?php
                                        $controllerDisplay->displaySelect('generation');
                                        ?>
                                    </select>
                                </div>
                                <div class='flex_row_buttons_label'>

                                    <br /><label for="gamme">Gamme</label><br />
                                    <select class='input_margin' name="gamme">
                                        <?php
                                        $controllerDisplay->displaySelect('gamme');
                                        ?>
                                    </select>
                                    <br /><label for="marque">Marque</label><br />
                                    <select class='input_margin' name="marque">
                                        <?php
                                        $controllerDisplay->displaySelect('marque');

                                        ?>
                                    </select>
                                    <select class='input_margin' name="editeur">
                                        <?php

                                        $controllerDisplay->displaySelect('editeur');
                                        ?>
                                    </select>
                                    <input type='submit' class='input_margin' name='submitNewCategorie'>
                                </div>
                            </form>
                        <?php
                            if (isset($_POST['submitNewCategorie'])) {
                                $id_utilisateur = $_SESSION['utilisateur']['id'];

                                $controllerAdmin->createArticle(
                                    $_POST['title'],
                                    $_POST['presentation'],
                                    $_POST['description'],
                                    $_POST['image'],
                                    $_POST['image_2'],
                                    $_POST['image_3'],
                                    $_POST['prix'],
                                    $id_utilisateur,
                                    $_POST['typeCreateArticle'],
                                    $_POST['gamme'],
                                    $_POST['marque'],
                                    $_POST['generation'],
                                    $_POST['editeur']
                                );
                            }
                        }




                        ?>
                        </section>
                </section>
            </section>
        </section>

    </section>
    <!-- consultation  -->
    <section class='flex_center_consultation'>
        <section class='consultation'>

            <?php
            if (isset($_POST['Utilisateurs'])) {
                echo " <div class='display_flex_center_titre'>
        <span class='titre_block'>Utilisateurs</span><br/>
    </div>";
                echo "<table>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>login</th>
                        <th>emain</th>
                        <th>password</th>
                        <th>image</th>
                        <th>Url</th>
                        <th>id_droits</th>
                        <th>anniversaire</th>
                        <th>id_adresse</th>
                    </tr>";
                $controllerDisplay->displayUsers();
                echo "</table>";
            }
            ?>

            <!--  -->

            <?php
            if (isset($_POST['Type'])) {
                echo " <div class='display_flex_center_titre'>
                    <span class='titre_block'>Type</span><br/>
                    </div>";
                $controllerDisplay->displayType();
            }
            ?>

            <!--  -->

            <?php
            if (isset($_POST['Gamme'])) {
                echo " <div class='display_flex_center_titre'>
                    <span class='titre_block'>Gamme</span><br/>
                    </div>";
                $controllerDisplay->displayGamme();
            }
            ?>

            <!--  -->
            <?php
            if (isset($_POST['Generation'])) {
                echo " <div class='display_flex_center_titre'>
                    <span class='titre_block'>Generation</span><br/>
                    </div>";
                $controllerDisplay->displayGeneration();
            }
            ?>

            <!--  -->

            <?php
            if (isset($_POST['Marque'])) {
                echo " <div class='display_flex_center_titre'>
                    <span class='titre_block'>Marques/Editeurs</span><br/>
                    </div>";
                $controllerDisplay->displayMarque();
                $controllerDisplay->displayEditeur();
            }
            ?>

            <!--  -->
            <?php
            if (isset($_POST['Article'])) {
                echo " <div class='display_flex_center_titre'>
                    <span class='titre_block'>Utilisateurs</span><br/>
                    </div>";
                $controllerDisplay->displayArticlesAdmin();
            }
            ?>

        </section>
    </section>
    <!--  -->



    <!--  -->



</main>
<?php
// il me reste tout ça a faire: commande     commentaires   liste_de_souhait    adress      carte_bleu      likedislike     notation    panier 4
$chronopost = "../images/chronopost.png";
$colissimo = "../images/colissimo.png";
$mention = "mention.php";
require_once('../require/html_/footer.php');
ob_end_flush();
?>