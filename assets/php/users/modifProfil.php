<?php

session_start();

include('../config.php');


if(!empty($_POST) && isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['verif'])) {

    $name = $_POST['name'];
    $pass = crypt($_POST['pass'], 'encrypt_pass');
    $verif = crypt($_POST['verif'], 'encrypt_pass');
    $id = $_SESSION['id'];

    if ($pass == $verif) {

        $sql = "UPDATE `users` SET `name`= '$name',`password`= '$pass' WHERE `id_user` = $id";


        $conn->exec($sql);
        $_SESSION['logged'] = false;

        print 'Traitement en cours...';
        header('Refresh: 1; url=../../../index.php');

    } else {
        print 'Une erreure s\'est produite réessayez plus tard...';
        header('Refresh: 2; url=../../../index.php');

    }
}
$conn = null;




