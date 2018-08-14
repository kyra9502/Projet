<?php
namespace P5\Model;

require_once("../model/Manager.php");


class PostManager extends Manager
{

	public function listArticles()
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT post.id, post.user_id, post.title, post.content, post.edit_author, post.image, DATE_FORMAT(post.post_date, '%d-%m-%Y ') AS post_date, user.username FROM post, user WHERE post.user_id = user.id ORDER BY post.post_date DESC");
        $req->execute();
        $articles = $req->fetchAll();

        return $articles;
    }







}