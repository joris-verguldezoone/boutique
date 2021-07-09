<?php
if (!isset($_SESSION)) {

    session_start();
}
require_once('libraries/Controller/Commentaire.php');
require_once('libraries/Model/Commentaire.php');
require_once('libraries/Model/Autocompletion.php');

$controllerCommentaire = new \controller\Commentaire;


if (isset($_SESSION['user'])) {
    $id_utilisateur = $_SESSION['user']['sub'];
    $login = $_SESSION['user']['name'];
    $user = $_SESSION['user'];
}
if (isset($_SESSION['utilisateur'])) {
    $id_utilisateur = $_SESSION['utilisateur']['id'];
    $login = $_SESSION['utilisateur']['login'];
    $user = $_SESSION['utilisateur'];
}



if (isset($_POST['titre']) && isset($_POST['commentaire'])) {
    $controllerCommentaire->secure($_POST['titre']);
    $controllerCommentaire->secure($_POST['commentaire']);
    $controllerCommentaire->secure($_POST['id_article']);

    $controllerCommentaire->insertComment($_POST['titre'], $_POST['commentaire'], $id_utilisateur, $_POST['id_article'], $login);
}
if (isset($_POST['id_article'])) {
    $model = new \model\Commentaire;
    $controllerCommentaire->secure($_POST['id_article']);

    $result = $model->selectAllWhereFetchAll('commentaire', 'id_article', $_POST['id_article']);
    echo json_encode($result);
}
if (isset($_POST['id_article_like']) && isset($_POST['id_commentaire_like'])) { // check s'il faut ajouter ou delete un like
    $model = new \model\Commentaire;
    $controllerCommentaire->secure($_POST['id_article_like']);
    $controllerCommentaire->secure($_POST['id_commentaire_like']);

    $result = $model->checkThreeValue('likey', 'id_article', 'id_commentaire', 'id_utilisateur', $_POST['id_article_like'], $_POST['id_commentaire_like'], $id_utilisateur);
    echo json_encode($result);
}
if (isset($_POST['id_article_like_add']) && isset($_POST['id_commentaire_like_add'])) {
    $model = new \model\Commentaire;
    $controllerCommentaire->secure($_POST['id_article_like_add']);
    $controllerCommentaire->secure($_POST['id_commentaire_like_add']);

    $model->insertLike($id_utilisateur, $_POST['id_article_like_add'], $_POST['id_commentaire_like_add']);
}
if (isset($_POST['id_article_like_delete']) && isset($_POST['id_commentaire_like_delete'])) {
    $model = new \model\Commentaire;
    $controllerCommentaire->secure($_POST['id_article_like_delete']);
    $controllerCommentaire->secure($_POST['id_commentaire_like_delete']);

    $model->deleteLike($id_utilisateur, $_POST['id_article_like_delete'], $_POST['id_commentaire_like_delete']);
}
if (isset($_POST['id_article_fetchUser_like'])) { // pour les commentaire on fetch les likes 
    $model = new \model\Commentaire;
    $controllerCommentaire->secure($_POST['id_article_fetchUser_like']);

    $result = $model->selectAllwhereTwoValue('likey', 'id_article', 'id_utilisateur', $_POST['id_article_fetchUser_like'], $id_utilisateur);
    echo json_encode($result);
}



// auto completion 

if (isset($_GET['text_search'])) {

    $input = $controllerCommentaire->secure($_GET['text_search']);
    $input_text = $input . '%';

    $model = new \Model\Autocomplete;
    $result = $model->searchWord_autocomplete($input_text);
    echo json_encode($result);
}

// chat 

if (isset($_POST['getSessionVar'])) {
    echo json_encode($user);
}
