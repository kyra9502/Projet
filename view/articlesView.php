<?php
session_start();

$title = "Blog";

require('../controller/controller.php');
include("../view/header.php");

$articles = listArticles();


?>


<?php

foreach ($articles as $article) :
    $shortContent = substr($article['content'], 0, 300);
    $id = $article['id'];
    ?>

    <!-- Blog Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><?= isset($article['title'])? htmlspecialchars($article['title']) :'title' ?></h1>
                </div>
                <p class="text-center">Dernière modification le <?= isset($article['post_date'])? $article['post_date']: '' ?> par <?= isset($article['username'])? $article['username'] : '' ?></p>
                
            <div class="row">
                <div class="col-lg-12">
                    <p><?= isset($article['content'])? nl2br($shortContent).'...'.'
                    <a class="btn btn-success btn-lg" href="article.php?id='.$article['id'].'">Lire en entier</a>' : 'void' ?></p>
                </div>
        </div>
        <div class="row">
                <div class="col-lg-12 text-center">
                        <?php isset($article['image']) ? $image= $article['image'] : $image= '' ?>
                        <p><?php print_r('<img src="../img/'.$image.'" class="img-responsive text-center""/>');?> </p>
                </div>
            </div>
    </section>
<?php endforeach; ?>

<?php
include("../view/footer.php");
?>
