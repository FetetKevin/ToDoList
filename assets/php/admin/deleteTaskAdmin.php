<?php

session_start();

if($_SESSION['logged'] && $_SESSION['role'] == 'admin') {

}
else {
    header('Location:../../../index.php');
}

include('../config.php');


if(isset($_POST['supprimer'])) {

    $id = $_GET['id_task'];


    $sql = "DELETE FROM `tasks` WHERE `id_task` = $id";


    $conn->exec($sql);

    print 'Traitement en cours...';
    header('Refresh: 1; url=../../../index.php');

}

else {
    print 'Une erreure s\'est produite réessayez plus tard...';
    header('Refresh: 2; url=../../../index.php');
}
$conn = null;
