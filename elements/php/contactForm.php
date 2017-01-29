<?php

$firstname = $lastname = $email = $message = "";
$error = [];
$confirmation = "";

if (!empty($_POST)) {
  $firstname = filter_var(trim($_POST["prenom"]), FILTER_SANITIZE_STRING);
  $lastname = filter_var(trim($_POST["nom"]), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);
}

if (empty($firstname)) {
  $error[firstname] = "Veuillez entrer votre Prénom.";
}
if (empty($lastname)) {
  $error[lastname] = "Veuillez entrer votre Nom.";
}
if (empty($email)) {
  $error[email] = "Veuillez entrer votre adresse email.";
}
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[email] = "l'adresse email entrée est invalide.";
  }
if (empty($message)) {
  $error[message] = "Veuillez écrire un message.";
}
if (empty($error)) {
  $confirmation = "Merci, votre message a bien été transmis !";
  $subject = "Nouveau message de " . $email;
  $contentEmail = "auteur: " . $firstname . " " . $lastname . ", email: " . $email . ", contenu :";
  $contentEmail .= $message;
  mail("h.naim@outlook.fr", $subject, $contentEmail);

  $firstname = $lastname = $email = $message = "";
}

?>

<link rel="stylesheet" href="../css/contact.css" />
<h3>Une question ? Une remarque ? Écrivez-nous !</h3>

<form id="" action="" method="POST">
  <div class="saisie-nom">
    <input type="text" name="firstname" placeholder="Prénom" />
    <input type="text" name="name" placeholder="Nom" />
    <input type="text" name="email" placeholder="email" />
  </div>
</br>
  <div class="message">
    <textarea name="message" placeholder="Votre message"></textarea>
  </div>
</br>
  <div class="bouton">
    <input type="submit" value="Envoyer">
  <p class="message-confirmation">
    <?php
      if(isset($error[firstname])) { echo "$error[firstname] <br>"; }
      if(isset($error[lastname])) { echo "$error[lastname] <br>"; }
      if(isset($error[email])) { echo "$error[email] <br>"; }
      if(isset($error[message])) { echo "$error[message] <br>"; }
      if(!empty($confirmation)) { echo "$confirmation <br>"; }
      ?>
  </p>
  </div>
</form>
