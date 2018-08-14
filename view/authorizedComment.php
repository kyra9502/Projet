<?php
session_start();
require('../controller/controller.php');
authorizedComment($_GET['id']);
$_SESSION['commentMessage'] = "Le commentaire numéro ".$_GET['id']." a bien été validé";
header('Location: adminPanel.php');
