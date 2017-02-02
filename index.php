<?php

$_SESSION['logged'] = false;


session_start();


include('assets/php/config.php');

if($_SESSION['logged'] == '') {
    $_SESSION['logged'] = false;
}

//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>TDL | Accueil</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">


        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- PrettyPhoto -->
        <link rel="stylesheet" href="assets/css/prettyPhoto.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Modernizr -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>


    </head>
<body>
<!-- NAVBAR
================================================== -->

<header class="main-header">

    <nav class="navbar navbar-static-top">

        <div class="navbar-top">

            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> 06.24.12.16.49 </li>
                            <li> <i class="fa fa-envelope"></i> fetetkevin@gmail.com </li>
                        </ul> <!-- /.header-contact  -->

                    </div>


                </div>
            </div>

        </div>

        <div class="navbar-main">

            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand" href="index.php"><img src="assets/images/TDL.png" style="height:60px;width:60px;margin-top:-17px;" alt=""></a>

                </div>

                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav">

                        <li><a class="is-active" href="index.php">Accueil</a></li>
                        <!-- <li><a href="index.php">Creer une liste</a></li> -->
                        <?php
                        if ($_SESSION['logged'] && $_SESSION['role'] == 'admin'){
                            ?>
                            <li class="has-child"><a href="assets/php/admin/admin.php"> Espace Admin</a>
                                <ul class="submenu">
                                    <li class="submenu-item"><a href="assets/php/admin/admin.php">Profil </a></li>
                                    <li class="submenu-item"><a href="assets/php/admin/listUsers.php">List Users </a></li>
                                    <li class="submenu-item"><a href="assets/php/admin/listTasks.php">List Tasks </a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>


                    <ul class="nav navbar-nav pull-right">
                        <?php
                        if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'Assisstant') {
                            ?>
                            <li><a data-toggle="modal" data-target="#profilModal"> Profil</a></li>
                            <li><a href="assets/php/deconnexion.php">Deconnexion</a></li>
                            <?php
                        } else if($_SESSION['logged'] && $_SESSION['role'] = 'admin'){
                            ?>
                            <li><a href="assets/php/deconnexion.php">Deconnexion</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        if (!$_SESSION['logged']) {
                            ?>
                            <li><a href="#" data-toggle="modal" data-target="#inscriptionModal"> Inscription</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#connexionModal"> Connexion</a></li>
                            <?php
                        }
                        ?>


                    </ul>

                </div> <!-- /#navbar -->

            </div> <!-- /.container -->

        </div> <!-- /.navbar-main -->


    </nav>

</header> <!-- /. main-header -->




<div class="page-heading text-center">

    <div class="container zoomIn animated">

        <h1 class="page-title" style="color: #29252c;">Créez votre liste ici ! <span class="title-under"></span></h1>

    </div>

</div>
<br>

<div class="main-container">

    <div class="our-causes fadeIn animated">

        <div class="container">


            <div class="container" style="font-family: 'Dosis', sans-serif;font-size: 20px;text-align: center;">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if($_SESSION['logged']) {
                            ?>
                            <p>Bienvenu <span style='color:red;font-weight: bold;'><?= $_SESSION['name']; ?></span> , vous pouvez desormais
                                interagir avec la liste !</p>
                            <?php
                        } else {
                            ?>
                            <p>Bienvenu, <a href="#" data-toggle="modal" data-target="#inscriptionModal"><span style="color:red;">inscrivez-vous</span></a> et <a href="#" data-toggle="modal" data-target="#connexionModal"><span style="color:red;">connectez-vous</span></a> pour interagir avec la liste !</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <?php
            if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin') {
                ?>
                <center><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#beginModal"> Cliquez ici
                        pour commencer !</a></center>
                <br>
                <br>
                <?php
            }
            ?>


            <div class="row">


                <div class="col-md-4 col-sm-6">

                    <div class="cause">

                        <!-- <img src="assets/images/causes/doing.jpg" alt="" class="cause-img"> -->
                        <div class="about-us-col4">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/our-mission-icon.png" alt="">
                            </div>
                            <h3 class="col-title">Exemple de tâche a faire !</h3>
                            <div class="col-details">
                                <p>Iam in altera philosophiae parte. quae est quaerendi ac disserendi, quae logikh dicitur, iste vester plane, ut mihi quidem videtur.</p>
                            </div>
                            <p>Posté par: NomRandom le 88/88/8888.</p>
                        </div>

                        <?php
                        $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         WHERE state = 'A faire'");
                        $nb_lignes = $sql->rowCount();
                            ?>
                            <h4 class="cause-title">Liste de choses à faire : ( <?= $nb_lignes; ?> )</h4>

                    </div> <!-- /.cause -->

                    <hr>
                    <br>

                    <?php
                    $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         JOIN users
                                         ON tasks.id_user = users.id_user
                                         WHERE state = 'A faire' 
                                         ORDER BY id_task");
                    while ($row = $sql->fetch()) {
                    ?>
                        <!-- Modifier Modal -->
                        <div class="modal fade" id="modifModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true" style="z-index:9999;">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: orange;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="donateModalLabel">Modifier tâche</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-donation" method="POST" action="assets/php/admin/modifTask.php?id_task=<?= $row['id_task'];?>">

                                            <h3 class="title-style-1 text-center">Modifier cette tâche <span class="title-under"></span>  </h3>


                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="title" placeholder="Intitulé">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" name="description" placeholder="Details..."></textarea>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn Valide pull-right" name="modifier" >Valider</button>
                                                </div>

                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.modal -->

                               <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="donateModalLabel">Supprimer tâche</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-donation" method="POST" action="assets/php/admin/deleteTaskAdmin.php?id_task=<?= $row['id_task'];?>">

                                            <h3 class="title-style-1 text-center">Etes-vous sur ?<span class="title-under"></span>  </h3>

                                            <div class="row">

                                                <div class="form-group col-md-2 col-md-offset-3">
                                                    <button type="submit" class="btn Valide" name="supprimer" > Valider</button>
                                                </div>


                                                <div class="form-group col-md-5 col-md-offset-1">
                                                    <button type="submit" class="btn Delete" name="donateNow" > Annuler</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.modal -->

                        <div class="about-us-col">

                        <div class="col-icon-wrapper">
                            <img src="assets/images/icons/our-mission-icon.png" alt="">
                            <?php
                            if($_SESSION['logged']) {
                                ?>
                                <a href="assets/php/tasks/enCours.php?id_task=<?= $row['id_task']; ?>"><img src="assets/images/prettyPhoto/facebook/btnNext.png" alt=""></a>
                                <?php
                            }
                            ?>
                        </div>

                            <h3 class="col-title"><?= $row['title']; ?></h3>
                            <div class="col-details">

                                <p><?= $row['description']; ?></p>

                            </div>
                        <?php
                        if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin') {
                            ?>
                            <a href="#" class="btn Modif" data-toggle="modal" data-target="#modifModal-<?= $row['id_task'];?>">
                                Modifier</a>
                            <a href="#" class="btn Delete" data-toggle="modal" data-target="#deleteModal-<?= $row['id_task'];?>">
                                Supprimer</a>
                            <?php
                        }
                        ?>


                            <p>Posté par :  <?= strtoupper($row['name']); ?>  le  <?= $row['date']; ?> .</p>


                    </div>
                    <hr>
                        <?php
                    }
                    ?>


                </div>

                <div class="col-md-4 col-sm-6">

                    <div class="cause2">

                        <!-- <img src="assets/images/causes/doing.jpg" alt="" class="cause-img"> -->
                        <div class="about-us-col4">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/programs-icon.png" alt="">
                            </div>
                            <h3 class="col-title">Exemple de tâche en cours !</h3>
                            <div class="col-details">
                                <p>Iam in altera philosophiae parte. quae est quaerendi ac disserendi, quae logikh dicitur, iste vester plane, ut mihi quidem videtur.</p>
                            </div>
                            <p>Pris en charge par: NomRandom le 88/88/8888.</p>
                        </div>

                        <?php
                        $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         WHERE state = 'En cours'");
                        $nb_lignes = $sql->rowCount();
                        ?>
                        <h4 class="cause-title">Travaux en cours : ( <?= $nb_lignes; ?> )</h4>


                    </div> <!-- /.cause -->
                    <hr>
                    <br>


                    <?php
                    $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         JOIN users
                                         ON tasks.id_user = users.id_user
                                         WHERE state = 'En cours' 
                                         ORDER BY id_task");
                    while ($row = $sql->fetch()) {
                    ?>
                        <!-- Modifier Modal -->
                        <div class="modal fade" id="modifModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: orange;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="donateModalLabel">Modifier tâche</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-donation" method="POST" action="assets/php/admin/modifTask.php?id_task=<?= $row['id_task'];?>">

                                            <h3 class="title-style-1 text-center">Modifier cette tâche <span class="title-under"></span>  </h3>


                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="title" placeholder="Intitulé">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" name="description" placeholder="Details..."></textarea>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn Valide pull-right" name="modifier" >Valider</button>
                                                </div>

                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.modal -->

                               <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="donateModalLabel">Supprimer tâche</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-donation" method="POST" action="assets/php/admin/deleteTaskAdmin.php?id_task=<?= $row['id_task'];?>">

                                            <h3 class="title-style-1 text-center">Etes-vous sur ?<span class="title-under"></span>  </h3>

                                            <div class="row">

                                                <div class="form-group col-md-2 col-md-offset-3">
                                                    <button type="submit" class="btn Valide" name="supprimer" > Valider</button>
                                                </div>


                                                <div class="form-group col-md-5 col-md-offset-1">
                                                    <button type="submit" class="btn Delete" name="donateNow" > Annuler</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.modal -->

                    <div class="about-us-col2">

                        <div class="col-icon-wrapper">
                            <?php
                            if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin' || $_SESSION['logged'] && $_SESSION['id'] == $row['id_user']) {
                                ?>
                                <a href="assets/php/tasks/aFaire.php?id_task=<?= $row['id_task']; ?>"><img src="assets/images/prettyPhoto/facebook/btnPrevious.png" alt=""></a>
                                <?php
                            }
                            ?>
                            <img src="assets/images/icons/programs-icon.png" alt="">
                            <?php
                            if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin' || $_SESSION['logged'] && $_SESSION['id'] == $row['id_user']) {
                                ?>
                                <a href="assets/php/tasks/termine.php?id_task=<?= $row['id_task']; ?>"><img src="assets/images/prettyPhoto/facebook/btnNext.png" alt=""></a>
                                <?php
                            }
                            ?>
                        </div>
                        <h3 class="col-title" style="color:#495664;"><?= $row['title']; ?></h3>
                        <div class="col-details">

                            <p style="color:#495664;"><?= $row['description']; ?></p>

                        </div>
                        <?php
                        if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin') {
                            ?>
                            <a href="#" class="btn Modif" data-toggle="modal" data-target="#modifModal-<?= $row['id_task'];?>">
                                Modifier</a>
                            <a href="#" class="btn Delete" data-toggle="modal" data-target="#deleteModal-<?= $row['id_task'];?>">
                                Supprimer</a>
                            <?php
                        }
                        ?>


                        <p style="color:#495664;">Pris en charge par : <?= strtoupper($row['name']); ?> le <?= $row['date']; ?>.</p>


                    </div>
                        <hr>
                        <?php
                    }
                    ?>

                </div>


                <div class="col-md-4 col-sm-6">

                    <div class="cause3">

                        <!-- <img src="assets/images/causes/doing.jpg" alt="" class="cause-img"> -->
                        <div class="about-us-col4">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/help-icon.png" alt="">
                            </div>
                            <h3 class="col-title">Exemple de tâche terminée !</h3>
                            <div class="col-details">
                                <p>Iam in altera philosophiae parte. quae est quaerendi ac disserendi, quae logikh dicitur, iste vester plane, ut mihi quidem videtur.</p>
                            </div>
                            <p>Effectué par: NomRandom le 88/88/8888.</p>

                        </div>

                        <?php
                        $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         WHERE state = 'Terminé'");
                        $nb_lignes = $sql->rowCount();
                        ?>
                        <h4 class="cause-title">Travaux terminés : ( <?= $nb_lignes; ?> )</h4>


                    </div> <!-- /.cause -->
                    <hr>
                    <br>


                    <?php
                    $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         JOIN users
                                         ON tasks.id_user = users.id_user
                                         WHERE state = 'Terminé' 
                                         ORDER BY id_task");
                    while ($row = $sql->fetch()) {
                        ?>
                        <!-- Modifier Modal -->
                        <div class="modal fade" id="modifModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: orange;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="donateModalLabel">Modifier tâche</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-donation" method="POST" action="assets/php/admin/modifTask.php?id_task=<?= $row['id_task'];?>">

                                            <h3 class="title-style-1 text-center">Modifier cette tâche <span class="title-under"></span>  </h3>


                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="title" placeholder="Intitulé">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" name="description" placeholder="Details..."></textarea>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn Valide pull-right" name="modifier" >Valider</button>
                                                </div>

                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.modal -->

                               <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="donateModalLabel">Supprimer tâche</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-donation" method="POST" action="assets/php/admin/deleteTaskAdmin.php?id_task=<?= $row['id_task'];?>">

                                            <h3 class="title-style-1 text-center">Etes-vous sur ?<span class="title-under"></span>  </h3>

                                            <div class="row">

                                                <div class="form-group col-md-2 col-md-offset-3">
                                                    <button type="submit" class="btn Valide" name="supprimer" > Valider</button>
                                                </div>


                                                <div class="form-group col-md-5 col-md-offset-1">
                                                    <button type="submit" class="btn Delete" name="donateNow" > Annuler</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.modal -->
                        <div class="about-us-col3">

                            <div class="col-icon-wrapper">
                                <?php
                                if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin' || $_SESSION['logged'] && $_SESSION['id'] == $row['id_user']) {
                                    ?>
                                    <a href="assets/php/tasks/enCours.php?id_task=<?= $row['id_task']; ?>"><img src="assets/images/prettyPhoto/facebook/btnPrevious.png"
                                                     alt=""></a>
                                    <?php
                                }
                                ?>
                                <img src="assets/images/icons/help-icon.png" alt="">
                            </div>
                            <h3 class="col-title" style="color:#495664;"><?= $row['title']; ?></h3>
                            <div class="col-details">

                                <p style="color:#495664;"><?= $row['description']; ?></p>

                            </div>
                            <?php
                            if($_SESSION['logged'] && $_SESSION['role'] == 'Chef de projet' || $_SESSION['logged'] && $_SESSION['role'] == 'admin') {
                                ?>
                                <a href="#" class="btn Modif" data-toggle="modal" data-target="#modifModal-<?= $row['id_task'];?>">
                                    Modifier</a>
                                <a href="#" class="btn Delete" data-toggle="modal" data-target="#deleteModal-<?= $row['id_task'];?>">
                                    Supprimer</a>
                                <?php
                            }
                            ?>


                            <p style="color:#495664;">Terminé par :  <?= strtoupper($row['name']); ?>  le  <?= $row['date']; ?> .</p>


                        </div>
                        <hr>
                        <?php
                    }
                    ?>

                </div>

            </div>

        </div>

    </div> <!-- /.our-causes -->




</div> <!-- /.main-container  -->


<!-- FOOTER -->
<footer class="main-footer">

    <div class="footer-top">

    </div>


    <div class="footer-main">
        <div class="container">

            <div class="row">
                <div class="col-md-4">

                    <div class="footer-col">

                        <h4 class="footer-title">A propos de l'application <span class="title-under"></span></h4>

                        <div class="footer-content">

                            <p>
                                <strong>ToDoList©</strong> est une application servant a repartir et organiser les tâches d'un projet de groupe.
                            </p>

                            <p>
                                Par soucis de securitée, seul le Chef de projet pourra ajouter ou supprimer une tâche.
                            </p>

                            <p>
                                Notre objectif : vous donner les moyens de réaliser vos projets dans les meilleures conditions d'optimisation.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="footer-col">

                        <h4 class="footer-title">Knab Corp.<span class="title-under"></span></h4>

                        <div class="footer-content">
                            <ul class="tweets list-unstyled">
                                <li class="tweet">

                                    <p>88000 Epinal</p>

                                </li>

                                <li class="tweet">

                                    <p>Contact : Fetet Kevin</p>

                                    <p>Mobile : 06 06 06 06 06</p>

                                </li>

                                <li class="tweet">

                                    <p>Email : exemple@domain.com</p>

                                    <p>Web : kevinf.simplon-epinal.tk</p>

                                </li>

                            </ul>
                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="footer-col">
                        <?php
                        $errNom="";
                        $errEmail="";
                        $errMessage="";
                        $result=""; ?>
                        <h4 class="footer-title">Contactez-moi <span class="title-under"></span></h4>

                        <div class="footer-content">

                            <div class="footer-form">

                                <div class="footer-form" >

                                    <form class="" method="POST" action="assets/php/sendMail.php">

                                        <div class="form-group">
                                            <input type="text" name="nom" class="form-control" placeholder="nom" required>
                                            <?php
                                            echo "<p class='text-danger'>$errNom</p>";
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="email" required>
                                            <?php
                                            echo "<p class='text-danger'>$errEmail</p>";
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="message" required></textarea>
                                            <?php
                                            echo "<p class='text-danger'>$errMessage</p>";
                                            ?>
                                        </div>

                                        <div class="form-group alerts">

                                            <div class="alert alert-success" role="alert">

                                            </div>

                                            <div class="alert alert-danger" role="alert">

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-submit pull-right" name="envoyer">Envoyer</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="clearfix"></div>



            </div>


        </div>


    </div>

    <div class="footer-bottom">

        <div class="container text-right">
            © Copyright 2016 - Knab Corp. | Tous droits reservés
        </div>
    </div>

</footer> <!-- main-footer -->




<!-- ------------------------------------------- MODAL ZONE ------------------------------------------------------- -->


<!-- Inscription Modal -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Inscription</h4>
            </div>
            <div class="modal-body">

                <form class="form-donation" action="assets/php/register.php" method="POST">

                    <h3 class="title-style-1 text-center">Inscrivez-vous <span class="title-under"></span>  </h3>


                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="name" placeholder="Nom / Pseudo" required>
                        </div>
                    </div>
<hr>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="pass" placeholder="Mot de passe" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="verif" placeholder="Verification" required>
                        </div>
                    </div>



                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn Valide pull-right" >Valider</button>
                        </div>

                    </div>



                </form>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->



<!-- Connection Modal -->
<div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Connexion</h4>
            </div>
            <div class="modal-body">

                <form class="form-donation" action="assets/php/connexion.php" method="POST">

                    <h3 class="title-style-1 text-center">Connectez-vous <span class="title-under"></span>  </h3>


                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="name" placeholder="Nom / Pseudo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="pass" placeholder="Mot de passe">
                        </div>
                    </div>



                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn Valide pull-right" name="donateNow" > Connexion</button>
                        </div>

                    </div>



                </form>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->



<!-- Profil Modal -->
<div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: <?php if ($_SESSION['role'] == 'Chef de projet') {
                echo 'orange';
            } else {
                echo 'green';
            }
            ?>;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Profil</h4>
            </div>
            <div class="modal-body">


                <h2 class="title-style-1">Votre profil <span class="title-under"></span></h2>


                <div class="row">

                    <div class="col-md-8 col-sm-12 col-md-offset-2">

                        <div class="team-member" style="border: 1px solid
                        <?php if ($_SESSION['role'] == 'Chef de projet') {
                            echo 'orange';
                        } else {
                            echo 'green';
                        }
                        ?>;background: <?php if ($_SESSION['role'] == 'Chef de projet') {
                            echo 'orange';
                        } else {
                            echo 'green';
                        }
                        ?>;">

                            <div class="thumnail">

                                <img src= "assets/images/team/<?= $_SESSION['image'];?>" alt="" class="cause-img">

                            </div>


                            <br>
                            <h4 class="member-name" style="color: black;"><?= $_SESSION['name']; ?></h4>

                            <div class="member-position" style="color: black;">
                                <?= $_SESSION['role']; ?>
                            </div>
                            <br>
                            <br>

                            <div class="btn-holder">

                                <a href="#" class="btn Modif" data-toggle="modal"
                                   data-target="#modifProfilModal"> Modifier</a>
                                <?php
                                if($_SESSION['logged'] && $_SESSION['role'] == 'Assisstant') {
                                    ?>
                                    <a href="#" class="btn Delete" data-toggle="modal"
                                       data-target="#deleteProfilModal"> Supprimer</a>
                                    <?php
                                }
                                ?>
                            </div>


                        </div> <!-- /.team-member -->

                    </div>

                </div> <!-- /.row -->

                <br>
                <br>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->





<!-- Modifier Profil Modal -->
<div class="modal fade" id="modifProfilModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: orange;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Modifier profil</h4>
            </div>
            <div class="modal-body">

                <form class="form-donation" method="POST" action="assets/php/users/modifProfil.php">

                    <h3 class="title-style-1 text-center">Modifier votre profil <span class="title-under"></span>  </h3>


                    <div class="row">
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Nom" required>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <input type="password" class="form-control" name="pass" placeholder="Mot de passe" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <input type="password" class="form-control" name="verif" placeholder="Validation" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <input type="submit" class="btn Valide pull-right" name="modifier" value="Modifier infos.">
                        </div>
                        <span style="color: #6c7a89;font-size:12px;float:right;">* vous devrez vous reconnecter.</span>

                    </div>
                    <span style="color: #6c7a89;font-size:12px;float:right;">** remplissez les 2 champs.</span>


                </form>

                    <br>
                    <hr>

                <div class="row">
                    <div class="form-group col-md-12">
                        <img alt="User Pic" src="assets/images/team/<?= $_SESSION['image']; ?>"
                             class="img-squarre img-responsive" style="max-height:300px; max-width:200px;border: 1px solid red;">
                        <br>
                        <form method="POST" action="assets/php/upload_avatar.php" enctype="multipart/form-data">
                            <!-- On limite le fichier à 100Ko -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                            <input type="file" name="avatar" class="btn Modif">
                            <input type="submit" class="btn Valide pull-right" name="envoyer" value="Modifier image">
                        </form>
                    </div>
                    <span style="color: #6c7a89;font-size:12px;float:right;">* vous devrez vous reconnecter.</span>
                </div>
                <span style="color: #6c7a89;font-size:12px;float:right;">** Image < 500 Ko .</span>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->


<!-- Delete Profil Modal -->
<div class="modal fade" id="deleteProfilModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Supprimer profil</h4>
            </div>
            <div class="modal-body">

                <form class="form-donation" method="POST" action="assets/php/users/deleteProfil.php">

                    <h3 class="title-style-1 text-center">Etes-vous sur ?<span class="title-under"></span>  </h3>

                    <div class="row">

                        <div class="form-group col-md-2 col-md-offset-3">
                            <button type="submit" class="btn Valide" name="supprimer" > Valider</button>
                        </div>


                        <div class="form-group col-md-5 col-md-offset-1">
                            <a href='index.php'><input type="button" class="btn Delete" value="Annuler" ></a>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->





<!-- Commencer Modal -->
<div class="modal fade" id="beginModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: green;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Création de tâche</h4>
            </div>
            <div class="modal-body">

                <form class="form-donation" method="POST" action="assets/php/admin/createTask.php">

                    <h3 class="title-style-1 text-center">Ajoutez une nouvelle tâche <span class="title-under"></span>  </h3>


                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="title" placeholder="Intitulé">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="description" placeholder="Details..."></textarea>
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn Valide pull-right" name="donateNow" >Valider</button>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->




<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Bootsrap javascript file -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- PrettyPhoto javascript file -->
<script src="assets/js/jquery.prettyPhoto.js"></script>



<!-- Google map  -->
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>


<!-- Template main javascript -->
<script src="assets/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
