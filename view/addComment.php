<?php
session_start();
require('../controller/controller.php');


function get_escape($field) {
    $value = iconv(
      'UTF-8',
      'UTF-8//IGNORE',
      isset($_GET[$field]) ? $_GET[$field] : ''
    );
    return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
  }

if (htmlspecialchars($_POST['commentSecure'])) {
    if (empty(htmlspecialchars($_SESSION['commentSecure']))) {
?>

        <p>Une erreur s'est produite lors de l'envoi de votre commentaire.</p></br>
        <p><a href=<?='"article.php?id=' . get_escape($_GET["id"]).'" '?> >Retour à l\'article</a></p>
<?php        
    }
    elseif (htmlspecialchars($_SESSION['commentSecure']) !== htmlspecialchars($_POST['commentSecure'])) {
?>

        <p>Une erreur s'est produite lors de l'envoi de votre commentaire.</p></br>
        <p><a href=<?='"article.php?id=' . get_escape($_GET["id"]).'" '?> >Retour à l\'article</a></p>
<?php       
        
    }
    elseif (empty(htmlspecialchars($_POST['authorComment'])) || empty(htmlspecialchars($_POST['content']))) {
?>

        <p>Une erreur s'est produite lors de l'envoi de votre commentaire.</p></br>
        <p><a href=<?='"article.php?id=' . get_escape($_GET["id"]).'" '?> >Retour à l\'article</a></p>
<?php       
        
    }
    newComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['authorComment']), htmlspecialchars($_POST['content']));
    header('Location: article.php?id='.htmlspecialchars($_GET['id']));
} else {
    header('Location: article.php?id='.htmlspecialchars($_GET['id']));
}
?>