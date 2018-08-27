<?php
session_start();

$title = "Blog";

require('../controller/controller.php');
include("../view/header.php");

if (!isset($_GET['id']) || $_GET['id'] <= 0) {
    echo "Cet article n'existe pas.";
    return;
}

$article = showArticle($_GET['id']);
$author = getAuthor($_GET['id']);
$comments = getComments($_GET['id']);

$_SESSION['commentSecure'] = htmlspecialchars(bin2hex(random_bytes(32)));
?>


<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1><?= isset($article['title'])? htmlspecialchars($article['title']) :'titre' ?></h1>
            </div>
            <p class="text-center">Dernière modification le <?= isset($article['post_date'])? $article['post_date']: '' ?> par <?= isset($author['username'])? $author['username'] : 'inconnu' ?></p>
            <p class="text-center"><?= isset($_SESSION['validated'])? ($_SESSION['validated'] === 1 ? '<a href="editArticle.php?id='.$article['id'].'">Editer</a>' : '') : '' ?></p>
        </div>
        <div class="row">
                <div class="img-responsive center">
                        <?php isset($article['image']) ? htmlspecialchars($image= $article['image']) : $image= '' ?>
                        <p><?php echo'<img src="../img/'.$image.'" class="img-responsive text-center""/>';?> </p>
                </div>
        </div></br></br>
        <div class="row">
            <div class="col-lg-12">
                <p><?= isset($article['content'])? nl2br($article['content']) : 'void' ?></p>
            </div>
        </div>
        <div class="row"></br></br>
            <div class="col-lg-12 text-center comments"><h3>Commentaires</h2>
                <?php
                
                foreach ($comments as $comment) :
                    if ($comment['authorized'] == 1) {
                        ?><strong>
                            <p class="col-md-12">le <?= isset($comment['comment_date'])? $comment['comment_date']: 'inconnu'?> par <?= isset($comment['author'])? htmlspecialchars($comment['author']): 'inconnu'?></p>
                        </strong>
                        <p class="col-md-12 border-divider"><?= isset($comment['content'])? nl2br(htmlspecialchars($comment['content'])) : 'Aucun contenu'?></p>
                        <?php
                    }
                endforeach; ?>
            </div>
            
                <div class="col-lg-12 text-center"></br>
                    <h3>Ajouter un commentaire</h3>
                    <hr class="star-primary">
                </div>
                <div class="col-lq-12 comments">
                    <form method="post" class="text-center form-group" action="addComment.php?id=<?= $article['id'] ?>" method="post">
                        <div>
                            <label for="author">Auteur</label><br />
                            <input type="text" id="authorComment" name="authorComment" value="<?= isset($_SESSION['username'])? htmlspecialchars($_SESSION['username']) :'' ?>" />
                        </div></br>
                        <div>
                            <label for="content">Commentaire</label><br />
                            <textarea id="content" class="form-control" name="content" rows="10"></textarea>
                        </div></br>
                        <div>
                            <input type="submit" />
                            <input type="hidden" name="commentSecure" id="commentSecure" value=" $_SESSION['commentSecure'] " />
                        </div>
                    </form>
                </div>
            
        
        </div>
    </div>
</section>

<?php
include("../view/footer.php");
?>
