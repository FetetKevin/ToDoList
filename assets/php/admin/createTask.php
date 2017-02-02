<?php

session_start();

if($_SESSION['logged'] && $_SESSION['role'] == 'admin' || $_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet') {

}
else {
    header('Location:../../../index.php');
}

include_once('../config.php');


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_POST) && isset($_POST['title']) && isset($_POST['description'])) {
        $title = htmlentities($_POST['title'],ENT_QUOTES);
        $description = htmlentities($_POST['description'],ENT_QUOTES);
        $id = $_SESSION['id'];

        $sql = "INSERT INTO `tasks`(`title`, `description`, `date`,`state`, `id_user`) VALUES ('".$title."','".$description."', NOW() , 'A faire' ,'".$id."')";

    }

    // use exec() because no results are returned
    $conn->exec($sql);
    print 'Traitement en cours...';
    header('Refresh: 1; url=../../../index.php');

}


catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

