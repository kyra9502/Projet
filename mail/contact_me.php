<?php
// Check for empty fields


$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

if (empty(htmlspecialchars($_POST['name'])) ||
empty(htmlspecialchars($_POST['email'])) ||
empty(htmlspecialchars($_POST['message'])) ||
!filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

// Create the email and send the message
$to = 'pauline9502@live.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "Vous avez reçu un nouveau message de votre formulaire de contact.\n\n"."Voilà les détails:\n\nNom: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers = "Reply-To: $email_address";
mail($to, $email_subject, $email_body, $headers);
return true;
