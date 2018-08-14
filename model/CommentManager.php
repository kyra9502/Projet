<?php
namespace P5\Model;;

require_once("../model/Manager.php");


class CommentManager extends Manager
{
    public function listComments()
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT id, author, content, comment_date FROM comment WHERE authorized = 0 ORDER BY id ASC");
        $req->execute();
        $listComments = $req->fetchAll();

        return $listComments;
    }
    
    public function authorizedComment($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET authorized = 1 WHERE id = ?');
        $req->execute(array($idComment));
    }

    public function deleteComment($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $req->execute(array($idComment));
    }

    public function showComment($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, author, content FROM comment WHERE id = ?");
        $req->execute(array($idComment));
        $comment = $req->fetch();

        return $comment;
    }
}
