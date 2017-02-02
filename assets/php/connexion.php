<?php

session_start();

include('config.php');


if (isset($_POST) && (!empty($_POST['name'])) || (!empty($_POST['pass'])) ) {
    $name = $_POST['name'];
    $pass = crypt($_POST['pass'],'encrypt_pass');




    // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    $sql = $conn->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$pass' AND `account` = 'on'");


    if ($row = $sql->fetch(PDO::FETCH_BOTH)) {

        if ($name == $row['name'] && $pass == $row['password'] && $row['account'] = 'on') {

            $_SESSION['id'] = $row['id_user'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['account'] = $row['account'];
            $_SESSION['logged'] = true;

            print 'Connexion en cours "'.strtoupper($_SESSION['name']).'" ...';
            header('Refresh: 1; url=../../index.php');

        }

    } else {

        $_SESSION['logged'] = false;

        print 'Le nom d\'utilisateur ou le mot de passe saisi n\'existent pas, ou le compte a été supprimé redirection en cours...';
        header('Refresh: 2; url=../../index.php');
    }

}
$conn = null;







