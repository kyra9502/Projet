# Projet
Blog professionnel en PHP

# Languages used :
html 5, CSS 3, Javascript, jQuery, PHP, MySQL

# Getting Started :
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

# Prerequisites :
For Windows you need a web development environment, like wampServer. Link and installation instructions available here
http://www.wampserver.com/en/

# Installing :
Download and unzip on your folder choice this repository
https://github.com/kyra9502/Projet.git

Execute phpmyadmin and create a new database, import blog2.sql on your database.
Connection to the database : open file model/manager.php ; login = 'root' and password = '' .
$db = new \PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');

This database have an admin account and a user account for test.
Administrator
 login : admin 
 password : admin
 
User
 login : user 
 password : user
 
 # Feature :
 Create account,
 Edit, delete or post articles,
 Edit, delete or post comments
 Dashboard for administration
 
 # Built with :
 Sublim Text 2
 WAMPSERVER
 
 
