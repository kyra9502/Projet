<?php
session_start();
require('../controller/controller.php');

deleteArticle($_GET['id']);
header('Location: adminPanel.php');
