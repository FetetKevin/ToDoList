<?php
$errNom="";
$errEmail="";
$errMessage="";
$result="";

if (isset($_POST["envoyer"])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];


// On verifie si un nom est entré
    if (!$_POST['nom']) {
        $errNom = "Entrez votre nom.";
    }
// On verifie si une adresse mail est entrée et valide
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Entrez une adresse mail valide.';
    }
// On verifie si un nom est entré
    if (!$_POST['message']) {
        $errMessage = "Entrez votre message.";
    }


// Si aucune erreure n'est detectée, on envoi le message
    if (!$errNom && !$errEmail && !$errMessage) {
        $result='<div class="alert alert-success">Connexion en cours !</div>';
    } else {
        $result='<div class="alert alert-danger">Désolé , il s\'emble qu\'une erreure ce soit produite.<br> Veuillez réessayer.</div>';
    }

}
?>

<?php

// S'il y des données de postées
if ($_SERVER['REQUEST_METHOD']=='POST') {


    // (1) Code PHP pour traiter l'envoi de l'email
// Récupération des variables et sécurisation des données
    $nom = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);

    /** On verifie si un nom est entré
     *   if (!empty($_POST) && isset(htmlentities($_POST['nom']))) {
     *       $nom = htmlentities($_POST['nom']);
     *   }
     *   else {
     *       $errNom = "Entrez votre nom.";
     *}
    // On verifie si un email est entré
     *    if (!empty($_POST) && isset(htmlentities($_POST['email']))) {
     *        $email = htmlentities($_POST['email']);
     *    }
     *    else {
     *        $errEmail = "Entrez votre nom.";
     *    }
    // On verifie si un message est entré
     *    if (!empty($_POST) && isset(htmlentities($_POST['message']))) {
     *        $message = htmlentities($_POST['message']);
     *    }
     *    else {
     *        $errMessage = "Entrez votre nom.";
     *    }
     *
     *
     *
     *    if (!empty($_POST) && !$errNom && !$errEmail && !$errMessage) {
     */
    // Variables concernant l'email
    $destinataire = 'fetetkevin@gmail.com'; // Adresse email du webmaster (à personnaliser)
    $sujet = 'ToDoList'; // Titre de l'email
    $contenu = '<html><head><title>ToDoList</title></head><body>';
    $contenu .= '<p>Bonjour, vous avez  un message provenant de votre site web.</p>';
    $contenu .= '<p><strong>Nom</strong>: ' . $nom . '</p>';
    $contenu .= '<p><strong>Email</strong>: ' . $email . '</p>';
    $contenu .= '<p><strong>Message</strong>: ' . $message . '</p>';
    $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)

    // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Envoyer l'email
    mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
}
echo '<h4>Message envoyé!</h4>';// Afficher un message pour indiquer que le message a été envoyé
header('Refresh: 1; url=../../index.php');
/**    else {
 *        $result='<div class="alert alert-danger">Désolé , il s\'emble qu\'une erreure ce soit produite.<br> Veuillez réessayer.</div>';
 *    }
 *   // (2) Fin du code pour traiter l'envoi de l'email
 *
 *
 */
