
<?php

$prenom = $nom = $email = $message = "";
$confirmation = "";
$errors = [];

if(!empty($_POST)) {

  $prenom = filter_var(trim($_POST["prenom"]), FILTER_SANITIZE_STRING);
  $nom = filter_var(trim($_POST["nom"]), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

  if(empty($prenom)) {
    $errors["prenom"] = "Saisis ton prénom";
  }

  if(empty($nom)) {
    $errors["name"] = "Saisis ton nom";
  }

  if(empty($email)) {
    $errors["email"] = "Saisis ton email";
  }

  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Email invalide";
  }
  if(empty($message)) {
    $errors["message"] = "Un petit message ?";
  }

  if(empty($errors)) {

    $confirmation = "Ton message a bien été envoyé, on te recontacte bientôt!";

    $subject = "Nouveau message de " . $email;
    $contentEmail = "auteur: " . $renom . " " . $nom . ", email: " . $email . ", contenu :";
    $contentEmail .= $message;
    mail("h.naim@outlook.fr", $subject, $contentEmail);

    $prenom = $nom = $email = $message = "";
  }
}
?>

<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/font.css" />
    <title>Contactez-nous - Naïm Alumni</title>
  </head>
  <body>
    <?php
    include '../html/header.html';
    include '../html/contact.html';
    include '../html/footer.html';
    ?>
  </body>
</html>
