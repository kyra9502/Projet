<?php
session_start();

$title = "Nouvel Article";

require('../controller/controller.php');
include("../view/header.php");

// Check Administrator state
if ($_SESSION['validated'] != 1) {
    $_SESSION['errorMessage'] = 'Vous n\'avez pas les droits suffisants pour accéder à la création d\'article.';
    echo $_SESSION['errorMessage'];
    return;
}
$_SESSION['articleNewSecure'] = bin2hex(random_bytes(32));
?>

<!-- Blog Section -->
<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Nouvel Article</h1>
                <?= isset($_SESSION['username'])? ('<p>Vous êtes identifié en tant que <strong>'.$_SESSION['username'].'</strong></p>') : '' ?>
            </div>
        </div>
        <div class="row"></br></br>
            <div class="col-lq-12 comments">
                <form method="post" class="text-center form-group" action="newArticle.php" method="post">
                    <div>
                        <label for="title">Titre</label><br />
                        <input type="text" style="color:black" id="articleTitle" name="articleTitle" size="50" />
                    </div></br>
                    <div>
                        <label for="content">Contenu</label><br />
                        <textarea id="articleContent" style="color:black" class="form-control" name="articleContent" rows="10"></textarea>
                    </div></br>
                    <div>
                        <input type="submit" style="color:black"/>
                        <input type="hidden" name="articleNewSecure" id="articleNewSecure" value="<?php echo $_SESSION['articleNewSecure']; ?>" />
                    </div>
                </form>
                <p><a href="adminPanel.php" style="color:black" class="return_index">Retour à l'administration</a></p>
            </div>
        </div>
    </div>
</section>
<script> 
    tinymce.init({ 
        selector:'textarea', 
        forced_root_block : '', 
        force_br_newlines : true, 
        force_p_newlines : false, 
    }); 
</script>
<?php
include("../view/footer.php");
?>
