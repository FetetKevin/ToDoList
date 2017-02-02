<?php

session_start();

if($_SESSION['logged'] && $_SESSION['role'] == 'admin') {

}
else {
    header('Location:../../../index.php');
}

include('../config.php');

        $id = $_GET['id_user'];
        $account = 'off';

        $sql = "UPDATE `users` SET `account` = '$account' WHERE `id_user` = $id";
        $conn->exec($sql);

        print 'Traitement en cours...';
        header('Refresh: 1; url=../../../index.php');

