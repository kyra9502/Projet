<?php
session_start();

require('../controller/controller.php');
include("../view/header.php");

$title = "Administration";
$articles = listArticles();
$listComments = listComments();

if (!isset($_SESSION['user_id'])) {
    //check Connexion form
    $username = htmlspecialchars($_SESSION['usernameTest']);
    $loginInfo = loginInfo($username);
    if (!$loginInfo) {
        $_SESSION['errorMessage'] = 'Mauvais identifiant ou mot de passe !';
        header('Location: connexion.php');
        return;
    }

    // check password
    $isPasswordCorrect = password_verify($_SESSION['passwordTest'], $loginInfo['password']);
    if (!$isPasswordCorrect) {
        $_SESSION['errorMessage'] = 'Mauvais identifiant ou mot de passe !';
        header('Location: connexion.php');
        return;
    }

    // check administrator state
    if ($loginInfo['validated'] != 1) {
        $_SESSION['errorMessage'] = 'Vous n\'avez pas les droits suffisants';
        header('Location: connexion.php');
        return;
    }

    sleep(1);

    // Creating Session Vars
    $_SESSION['user_id'] = $loginInfo['id'];
    $_SESSION['username'] = $username;
    $_SESSION['validated'] = $loginInfo['validated'];

    // Cleaning Useless Session vars
    unset($_SESSION['connexionSecure']);
    unset($_SESSION['usernameTest']);
    unset($_SESSION['passwordTest']);
}
?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Espace Administration</h1></br></br>
                <form action="logout.php" method="post" class="connect_zone">
                    <input type="submit" style="color:black" value="Déconnexion" name= "deconnect" id="button"/></br></br>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <?= isset($_SESSION['username'])? ('<p>Vous êtes identifier en tant que <strong>'.$_SESSION['username'].'</strong></p>') : '' ?>
            </div>
        </div>
    </div>
</section>

<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3>Poster un article</h3>
                <a href="postArticle.php">Poster un nouvel Article</a>
            </div>
            <div class="col-lg-6 text-center">
                <img class="img-responsive" src="../img/ecrire.jpg" alt="">
            </div>
        </div>
    </div>
</section><hr><hr>

<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3>Modifier un article</h3>
                <?php
                // display Articles for edition
                foreach ($articles as $article) : ?>
                    <p><?= isset($article['title'])? htmlspecialchars($article['title']) :'title' ?> par <?= isset($article['username'])? $article['username'] : '' ?> <?= $_SESSION['validated'] == 1 ? '<a href="editArticle.php?id='.htmlspecialchars($article['id']).'">Modifier l\'article</a>' : '' ?></p>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 text-center">
                <img class="img-responsive" src="../img/plume.jpg" alt="">
            </div>
        </div>
    </div>
</section><hr><hr>

<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3>Valider un Commentaire</h3>
                <?php if (isset($_SESSION['commentMessage'])): ?>
                    <span style="color: lightblue"><?= $_SESSION['commentMessage'] ?></span><br />
                    <?php
                    unset($_SESSION['commentMessage']);
                endif;
                // display comments waiting validate
                foreach ($listComments as $comment) : ?> Par <?= isset($comment['author'])? $comment['author'] : '' ?>
                </br><?= isset($comment['content'])? htmlspecialchars($comment['content']): ''?></br>
                <a href="authorizedComment.php?id=<?= $comment['id']?>">Valider</a> /
                <a href="deleteComment.php?id=<?= $comment['id']?>">Effacer</a>
                </br>
                <p>___________</p><?php endforeach; ?>
            </div>
            <div class="col-lg-6 text-center">
                <img class="img-responsive" src="../img/valide.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<?php
include("../view/footer.php");
?>
