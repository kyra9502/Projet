<?php

namespace P5\Model;

// Manager for connect to database
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');
        return $db;
    }
}
