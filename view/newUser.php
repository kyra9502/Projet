<?php
session_start();
require('../controller/controller.php');

// Security register Form
if (isset($_POST['userSecure'])) {
    if (empty($_SESSION['userSecure'])) {
        echo "Une erreur s'est produite lors de la création de votre compte.";
        return;
    }
    if ($_SESSION['userSecure'] !== $_POST['userSecure']) {
        echo "Une erreur s'est produite lors de la création de votre compte.";
        return;
    }
    if (empty($_POST['username']) ||
    empty($_POST['password']) ||
    empty($_POST['password_check']) ||
    empty($_POST['email'])) {
        echo "<p class=\"Alerte\">Vous devez remplir tout les champs.</p>";
        return;
    }

    // checking username disponibility

    $username = htmlspecialchars($_POST['username']);
    $username_exist = checkUsername($username);
    if ($username_exist) {
        echo "<p class=\"Alerte\">Cet identifiant est déjà utilisé.</p>";
        return;
    }

    // checking passwords are the same
    if ($_POST['password'] !== $_POST['password_check']) {
        echo "<p class=\"Alerte\">Vous avez entré des mots de passe différents.</p>";
        return;
    }

    // password Hash
    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST['email']);
    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
        echo "<p class=\"Alerte\">Vous avez entré une adresse email éronnée.</p>";
        return;
    }

    newUser($username, $pass_hash, $email);
    $_SESSION['userMessage'] = 'Votre compte à bien était créé';
    header('Location: connexion.php');
    return;

} else {
    header('Location: register.php');
}
