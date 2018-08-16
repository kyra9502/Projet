<?php

require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');
require_once('../model/UserManager.php');

use P5\Model as Model;

function listArticles()
{
    $postManager = new Model\PostManager();
    $listArticles = $postManager->listArticles();

    return $listArticles;
}

function showArticle($idArticle)
{
    $postManager = new Model\PostManager();
    $article = $postManager->showArticle($idArticle);

    return $article;
}

function getAuthor($idArticle)
{
    $postManager = new Model\PostManager();
    $author = $postManager->getAuthor($idArticle);

    return $author;
}

function getComments($idArticle)
{
    $postManager = new Model\PostManager();
    $comments = $postManager->getComments($idArticle);

    return $comments;
}

function newComment($idArticle, $authorComment, $content)
{
    $postManager = new Model\PostManager();
    $newComment = $postManager->postComment($idArticle, $authorComment, $content);

    if ($newComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
}

function newArticle($userId, $articleTitle, $articleContent)
{
    $postManager = new Model\PostManager();
    $newArticle = $postManager->postArticle($userId, $articleTitle, $articleContent);

    if ($newArticle === false) {
        throw new Exception("Impossible d'ajouter l'article !");
    }
}

function checkUsername($username)
{
    $manager = new Model\UserManager();
    $username_exist = $manager->checkUsername($username);

    return $username_exist;
}

function newUser($username, $password, $email)
{
    $userManager = new Model\UserManager();
    $newUser = $userManager->newUser($username, $password, $email);

    if ($newUser === false) {
        throw new Exception("Impossible d'ajouter l'utilisateur !");
    }
}

function loginInfo($username)
{
    $userManager = new Model\UserManager();
    $loginInfo = $userManager->loginInfo($username);

    return $loginInfo;
}

function getPassHash($username)
{
    $userManager = new Model\UserManager();
    $getPassHash = $userManager->getPassHash($username);

    return $getPassHash;
}

function updateArticle($updateTitle, $updateContent, $idArticle, $updateAuthor)
{
    $postManager = new Model\PostManager();
    $updateArticle = $postManager->updateArticle($updateTitle, $updateContent, $idArticle, $updateAuthor);

    if ($updateArticle === false) {
        throw new Exception("Impossible d'éditer l'article !");
    }
}

function listComments()
{
    $commentManager = new Model\CommentManager();
    $listComments = $commentManager->listComments();

    return $listComments;
}

function authorizedComment($idComment)
{
    $commentManager = new Model\CommentManager();
    $authorizedComment = $commentManager->authorizedComment($idComment);

    if ($authorizedComment === false) {
        throw new Exception("Impossible de Valider le Commentaire !");
    }
}

function showComment($idComment)
{
    $commentManager = new Model\CommentManager();
    $comment = $commentManager->showComment($idComment);

    return $comment;
}

function deleteComment($idComment)
{
    $commentManager = new Model\CommentManager();
    $deleteComment = $commentManager->deleteComment($idComment);

    if ($deleteComment === false) {
        throw new Exception("Impossible de Supprimer le Commentaire !");
    }
}

function deleteArticle($idArticle)
{
    $postManager = new Model\PostManager();
    $deleteArticle = $postManager->deleteArticle($idArticle);

    if ($deleteArticle === false) {
        throw new Exception("Impossible de Supprimer l'\Article !");
    }
}