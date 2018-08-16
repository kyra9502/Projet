<?php
session_start();
require('../controller/controller.php');

// Security nex Article Form
if (isset($_POST['articleNewSecure'])) {
    if (empty($_SESSION['articleNewSecure'])) {
        echo "Une erreur s'est produite lors de l'envoi de votre article.";
        return;
    }
    if ($_SESSION['articleNewSecure'] !== $_POST['articleNewSecure']) {
        echo "Une erreur s'est produite lors de l'envoi de votre article.";
        return;
    }
    if (empty($_POST['articleTitle']) || empty($_POST['articleContent'])) {
        echo "Vous avez laissé un ou des champs vide.";
        return;
    }
    newArticle($_SESSION['user_id'], $_POST['articleTitle'], $_POST['articleContent']);
    header('Location: articlesView.php');
} else {
    header('Location: postArticle.php');
}
