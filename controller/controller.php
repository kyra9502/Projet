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
