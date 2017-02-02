<?php

include_once('config.php');


    if (!empty($_POST) && isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['verif'])) {
        $name = $_POST['name'];
        $pass = crypt($_POST['pass'], 'encrypt_pass');
        $verif = crypt($_POST['verif'], 'encrypt_pass');

        if ($pass == $verif) {

            $sql = "INSERT INTO `users`( `name`, `password`, `image`, `role`, `account`) VALUES ('" . $name . "','" . $pass . "', 'default.jpg', 'Assisstant', 'on')";


            // use exec() because no results are returned
            $conn->exec($sql);
            print 'Traitement en cours...';
            header('Refresh: 1; url=../../index.php');
        } else {
            echo 'Une erreure s\'est produite , réessayez ...';
            header('Refresh: 2; url=../../index.php');
        }

    }











