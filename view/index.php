<?php



session_start();

include("../view/header.php");

$title = "Developpeuse PHP";

?>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="../img/moi2.png" alt="">
                <div class="intro-text">
                    <span class="name"></span>
                    <hr class="star-primary">
                    <span class="skills">La développeuse qu'il vous faut !</span>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Blog Section -->
<section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Blog</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="img-responsive text-center portfolio-item">
                    <a href="articlesView.php">
                        <img src="../img/portfolio/portfolio.jpeg"  alt="">
                        </a>
                 </div>
            </div>
        </div>
</section>
<hr>
<hr>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Merci d'entrer votre nom.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Adresse Mail</label>
                            <input type="email" class="form-control" placeholder="Adresse Email" id="email" required data-validation-required-message="Veuillez entrer votre adresse mail">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Merci d'écrire un message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<?php
include("../view/footer.php");
?>
