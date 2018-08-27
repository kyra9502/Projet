<?php
session_start();
require('../controller/controller.php');


if (isset ($_GET['id']){
    $id= htmlentities($_GET['id']);
}else{
    $id = 0;
}

if (htmlspecialchars($_POST['commentSecure'])) {
    if (empty(htmlspecialchars($_SESSION['commentSecure']))) {
        echo "Une erreur s'est produite lors de l'envoi de votre commentaire.";
        echo '<br /><a href="article.php?id='.htmlentities($_GET['id']).'">Retour à l\'article</a>';
        return;
    }
    if (htmlspecialchars($_SESSION['commentSecure']) !== htmlspecialchars($_POST['commentSecure'])) {
        echo "Une erreur s'est produite lors de l'envoi de votre commentaire.";
        echo '<br /><a href="article.php?id='.htmlspecialchars($_GET['id']).'">Retour à l\'article</a>';
        return;
    }
    if (empty(htmlspecialchars($_POST['authorComment'])) || empty(htmlspecialchars($_POST['content']))) {
        echo "Une erreur s'est produite lors de l'envoi de votre commentaire.";
        echo '<br /><a href="article.php?id='.htmlspecialchars($_GET['id']).'">Retour à l\'article</a>';
        return;
    }
    newComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['authorComment']), htmlspecialchars($_POST['content']));
    header('Location: article.php?id='.htmlspecialchars($_GET['id']));
} else {
    header('Location: article.php?id='.htmlspecialchars($_GET['id']));
}
