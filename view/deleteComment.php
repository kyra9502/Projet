<?php
session_start();
require('../controller/controller.php');
deleteComment($_GET['id']);
$_SESSION['commentMessage'] = "Le commentaire numéro ".$_GET['id']." a bien été supprimé";
header('Location: adminPanel.php');
