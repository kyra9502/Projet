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