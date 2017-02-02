<?php

session_start();

if($_SESSION['logged'] && $_SESSION['role'] == 'admin') {

}
else {
    header('Location:../../../index.php');
}


include('../config.php');

?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>TDL | Espace Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

    <!-- Bootsrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">


    <!-- Font awesome -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">

    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="../../css/prettyPhoto.css">

    <!-- Template main Css -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Modernizr -->
    <script src="../../js/modernizr-2.6.2.min.js"></script>


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

                    <a class="navbar-brand" href="../../../index.php"><img src="../../../assets/images/TDL.png" style="height:60px;width:60px;margin-top:-17px;" alt=""></a>

                </div>

                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav">

                        <li><a  href="../../../index.php">Accueil</a></li>
                        <!-- <li><a href="index.php">Creer une liste</a></li> -->
                        <?php
                        if ($_SESSION['logged'] && $_SESSION['role'] == 'admin'){
                            ?>
                            <li class="has-child"><a href="admin.php" class="is-active"> Espace Admin</a>
                                <ul class="submenu">
                                    <li class="submenu-item"><a href="admin.php">Profil </a></li>
                                    <li class="submenu-item"><a href="listUsers.php">List Users </a></li>
                                    <li class="submenu-item"><a href="listTasks.php">List Tasks </a></li>
                                </ul>
                            </li>                            <?php
                        }
                        ?>
                    </ul>


                    <ul class="nav navbar-nav pull-right">
                        <?php
                        if($_SESSION['logged']) {
                            ?>
                            <li><a href="../deconnexion.php">Deconnexion</a></li>
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

        <h1 class="page-title" style="color: #29252c;">Espace Admin ! <span class="title-under"></span></h1>

    </div>

</div>
<br>

<?php
$sql = $conn->query("SELECT *
FROM tasks");
$nb_lignes = $sql->rowCount();
?>
<h2 class="title-style-1">Liste des Taches ( <?= $nb_lignes; ?> ) : <span class="title-under"></span></h2>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="cause">
                <?php
                $sql = $conn->query("SELECT * 
                                                     FROM tasks 
                                                     WHERE state = 'A faire'");
                $nb_lignes = $sql->rowCount();
                ?>
                <h4 class="cause-title">Liste de choses à faire : ( <?= $nb_lignes; ?> )</h4>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
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
            <div class="modal fade" id="modifModal-<?= $row['id_task'];?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: orange;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="donateModalLabel">Modifier tâche</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-donation" method="POST" action="modifTask.php?id_task=<?= $row['id_task'];?>">

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

                            <form class="form-donation" method="POST" action="deleteTaskAdmin.php?id_task=<?= $row['id_task'];?>">

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

            <div class="col-md-4">
                <div class="about-us-col">
                    <div class="col-icon-wrapper">
                        <img src="../../images/icons/our-mission-icon.png" alt="">
                    </div>
                    <h3 class="col-title"><?= $row['title']; ?></h3>
                    <div class="col-details">

                        <p><?= $row['description']; ?></p>

                    </div>
                    <div class="row">
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


                        <p>Pris en charge par : <?= strtoupper($row['name']); ?> le <?= $row['date']; ?>.</p>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>


    </div>

</div>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="cause2">
                <?php
                $sql = $conn->query("SELECT * 
                                                     FROM tasks 
                                                     WHERE state = 'en cours'");
                $nb_lignes = $sql->rowCount();
                ?>
                <h4 class="cause-title">Travaux en cours : ( <?= $nb_lignes; ?> )</h4>

            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <?php
        $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         JOIN users
                                         ON tasks.id_user = users.id_user
                                         WHERE state = 'en cours' 
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

                            <form class="form-donation" method="POST" action="modifTask.php?id_task=<?= $row['id_task'];?>">

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

                            <form class="form-donation" method="POST" action="deleteTaskAdmin.php?id_task=<?= $row['id_task'];?>">

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

            <div class="col-md-4">
                <div class="about-us-col2">
                    <div class="col-icon-wrapper">
                        <img src="../../images/icons/programs-icon.png" alt="">
                    </div>
                    <h3 class="col-title" style="color:#495664;"><?= $row['title']; ?></h3>
                    <div class="col-details">

                        <p style="color:#495664;"><?= $row['description']; ?></p>

                    </div>
                    <div class="row">
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
                </div>
            </div>
            <?php
        }
        ?>

    </div>

</div>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="cause3">
                <?php
                $sql = $conn->query("SELECT * 
                                                     FROM tasks 
                                                     WHERE state = 'termine'");
                $nb_lignes = $sql->rowCount();
                ?>
                <h4 class="cause-title">Travaux terminés : ( <?= $nb_lignes; ?> )</h4>
            </div>
        </div>
    </div>
</div>




<div class="container">
    <div class="row">
        <?php
        $sql = $conn->query("SELECT * 
                                         FROM tasks 
                                         JOIN users
                                         ON tasks.id_user = users.id_user
                                         WHERE state = 'termine' 
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

                            <form class="form-donation" method="POST" action="modifTask.php?id_task=<?= $row['id_task'];?>">

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

                            <form class="form-donation" method="POST" action="deleteTaskAdmin.php?id_task=<?= $row['id_task'];?>">

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

            <div class="col-md-4">
                <div class="about-us-col3">
                    <div class="col-icon-wrapper">
                        <img src="../../images/icons/help-icon.png" alt="">
                    </div>
                    <h3 class="col-title" style="color:#495664;"><?= $row['title']; ?></h3>
                    <div class="col-details">

                        <p style="color:#495664;"><?= $row['description']; ?></p>

                    </div>
                    <div class="row">
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
                </div>
            </div>
            <?php
        }
        ?>

    </div>

</div>
<br>
<br>
<br>
<br>


<!-- FOOTER -->
<footer class="main-footer">

    <div class="footer-main">

        <div class="container">

            <div class="row">

                <div class="container text-right">
                    © Copyright 2016 - Knab Corp. | Tous droits reservés
                </div>

                <div class="clearfix"></div>

            </div>

        </div>

    </div>

</footer> <!-- main-footer -->





<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Bootsrap javascript file -->
<script src="../../js/bootstrap.min.js"></script>

<!-- PrettyPhoto javascript file -->
<script src="../../js/jquery.prettyPhoto.js"></script>



<!-- Google map  -->
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>


<!-- Template main javascript -->
<script src="../../js/main.js"></script>

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
