<?php
session_start();

$title = "Blog";

require('../controller/controller.php');
include("../view/header.php");



if (!empty($_SESSION['username'])) {
    echo "</br></br></br></br></br></br>Vous êtes déjà connecté</br> <a href=\"adminPanel.php\">Retourner à l'administration</a>";
    return;
}
$_SESSION['connexionSecure'] = bin2hex(random_bytes(32));
?>

<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Connexion</h1>
                <div class="row">
                    <div class="img-responsive text-center portfolio-item">
                        <a href="connexion.php#Se_connecter">
                            <img src="../img/connexion.jpg"  alt="">
                            </a>
                    </div>
                </div><br /><br />
                <form action="connectCheck.php" method="post">
                    <?php
                    
                    if (isset($_SESSION['errorMessage'])) {
                    ?>
                        <?= $_SESSION['errorMessage']; ?>

                    <?php
                        unset($_SESSION['errorMessage']);
                    }
                    if (isset($_SESSION['userMessage'])) {
                    ?>
                        <?= $_SESSION['userMessage']; ?>
                    <?php
                        unset($_SESSION['userMessage']);
                    }
                    ?>
                    <br /><br />
                    <p>Pseudo : <br /><input type="text" name="username" id="username" /></p>
                    <p>Mot de passe: <br /><input type="password" name="password" id="password"/></p>
                    <input type="submit" value="Se connecter" id="button"/>
                    <input type="hidden" name="connexionSecure" id="connexionSecure" value=<?='"' .$_SESSION['connexionSecure'].'"'; ?> />
                    <br /><br />
                    <p><a href="register.php">Nouveau compte</a></p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include("../view/footer.php");
?>
