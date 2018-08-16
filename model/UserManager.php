<?php
namespace P5\Model;

require_once("../model/Manager.php");


class UserManager extends Manager
{
    public function checkUsername($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT username FROM user WHERE username = '$username'");
        $req->execute(array());
        $username_exist = $req->rowCount();

        return $username_exist;
    }

    public function  loginInfo($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, password, validated FROM user WHERE username = '$username' ");
        $req->execute(array('username' => $username));
        $loginInfo = $req->fetch();

        return $loginInfo;
    }

    public function getPassHash($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT password FROM membres WHERE username = '$username'");
        $getPassHash = $req->execute(array($username));

        return $getPassHash;
    }

    public function newUser($username, $password, $email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO User (username, password, email, validated) VALUES (?, ?, ?, 0)");
        $newUser = $req->execute(array($username, $password, $email));

        return $newUser;
    }
}
