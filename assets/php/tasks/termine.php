<?php

session_start();

include('../config.php');

$id = $_GET['id_task'];

$sql = "UPDATE `tasks` SET `date`= NOW() , `state`= 'Terminé' WHERE `id_task` = $id";


$conn->exec($sql);

print 'Traitement en cours...';
header('Location:../../../index.php');
