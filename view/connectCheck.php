<?php
session_start();
require('../controller/controller.php');

// Security Connection Form
if (isset($_POST['connexionSecure'])) {
    if (empty($_SESSION['connexionSecure'])) {
        $_SESSION['errorMessage'] = 'Erreur  veuillez vous reconnecter.';
        header('Location: connexion.php');
        return;
    }
    if ($_SESSION['connexionSecure'] !== $_POST['connexionSecure']) {
        $_SESSION['errorMessage'] = 'Erreur  veuillez vous reconnecter.';
        header('Location: connexion.php');
        return;
    }
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['errorMessage'] = 'Vous n\'avez pas remplis tout les champs';
        header('Location: connexion.php');
        return;
    }
    $_SESSION['usernameTest'] = $_POST['username'];
    $_SESSION['passwordTest'] = $_POST['password'];
    header('Location: adminPanel.php');
} else {
    $_SESSION['errorMessage'] = 'Erreur  veuillez vous reconnecter.';
    header('Location: connexion.php');
    return;
}
