<?php
session_start();
require('../controller/controller.php');

// Security Edit Article Form
if (isset($_POST['articleSecure'])) {
    if (empty($_SESSION['articleSecure'])) {
        echo "Une erreur s'est produite lors de l'edition de votre article.";
        return;
    }
    if ($_SESSION['articleSecure'] !== $_POST['articleSecure']) {
        echo "Une erreur s'est produite lors de l'edition de votre article.";
        return;
    }
    if (empty($_POST['articleTitle']) || empty($_POST['articleContent'])) {
        echo "Vous avez laissé un ou des champs vide.";
        return;
    }
    updateArticle($_POST['articleTitle'], $_POST['articleContent'],$_POST['updateAuthor'], $_GET['id']);
    $_SESSION['updateMessage'] = "L'article numéro ".$_GET['id']." a bien été mis à jour.";
    header('Location: editArticle.php?id='.$_GET['id']);

} else {
    header('Location: editArticle.php?id='.$_GET['id']);
}
