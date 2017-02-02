<?php

session_start();


if($_SESSION['logged'] && $_SESSION['role'] == 'admin') {

}
else {
    header('Location:../../../index.php');
}



include ('../config.php');

$dossier = '../../images/team/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 500000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
    $erreur = 'Le fichier est trop gros...';

}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        //echo 'Votre avatar a été modifié avec succès !';
        // header('Refresh: 2; url=../../index.php');
        // if(isset($_POST["submit"]) && (!empty($_FILES['fileToUpload']))) {
        //    $avatar = $_FILES['fileToUpload']['name'];


        $id_user = $_GET['id_user'];

        $sql = "UPDATE users SET `image` = '$fichier' WHERE `id_user` = '$id_user'";

        // use exec() because no results are returned
        $conn->exec($sql);
        $_SESSION['logged'] = false;

        print 'Traitement en cours...';
        header('Refresh: 1; url=../../../index.php');

    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
        header('Refresh: 2; url=../../../index.php');
    }
}
else
{
    echo $erreur;
}
