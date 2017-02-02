<?php

session_start();

include('../config.php');


if(isset($_POST['supprimer'])) {

    $account = 'off';
    $id = $_SESSION['id'];


    $sql = "UPDATE `users` SET `account`= '$account' WHERE `id_user` = $id";


    $conn->exec($sql);
    $_SESSION['logged'] = false;

    print 'Traitement en cours...';
    header('Refresh: 1; url=../../../index.php');

}

else {
    print 'Une erreure s\'est produite réessayez plus tard...';
    header('Refresh: 2; url=../../../index.php');

}
$conn = null;

