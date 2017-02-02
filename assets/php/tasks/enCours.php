<?php

session_start();

include('../config.php');

    $id_user = $_SESSION['id'];
    $id = $_GET['id_task'];

    $sql = "UPDATE `tasks` SET `date`= NOW() , `state`= 'En cours', `id_user`= '$id_user' WHERE `id_task` = $id";


    $conn->exec($sql);

    print 'Traitement en cours...';
header('Location:../../../index.php');

