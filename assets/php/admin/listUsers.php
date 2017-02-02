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
                                                     FROM users 
                                                     WHERE account = 'on'");
$nb_lignes = $sql->rowCount();
?>
<h2 class="title-style-1">Liste des Users (Actifs ( <?= $nb_lignes; ?> )) : <span class="title-under"></span></h2>

<div class="container">
    <div class="row">
        <?php
        $sql = $conn->query("SELECT * FROM users WHERE account = 'on' ORDER BY id_user");
        while ($row = $sql->fetch()) {
            ?>
            <!-- Delete Profil Admin Modal -->
            <div class="modal fade" id="deleteProfilAdminModal-<?= $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="donateModalLabel">Supprimer profil</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-donation" method="POST" action="../admin/deleteProfilAdmin.php?id_user=<?=(int)$row['id_user']?>">

                                <h3 class="title-style-1 text-center">Etes-vous sur ?<span class="title-under"></span>  </h3>

                                <div class="row">

                                    <div class="form-group col-md-2 col-md-offset-3">
                                        <button type="submit" class="btn Valide" name="donateNow" > Valider</button>
                                    </div>

                                    <div class="col-md-5 col-md-offset-1">
                                        <button class="btn Delete" name="" > Annuler</button>
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div> <!-- /.modal -->

                   <!-- Modifier Profil Modal ADMIN-->
            <div class="modal fade" id="modifProfilAdminModal-<?= $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: orange;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="donateModalLabel">Modifier profil</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-donation" method="POST" action="modifProfilAdmin.php?id_user=<?= (int)$row['id_user']; ?>">

                                <h3 class="title-style-1 text-center">Modifier ce profil id=<?= $row['id_user']; ?><span class="title-under"></span>  </h3>


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
                                        <input type="password" class="form-control" name="verif" placeholder="Verification" required>
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
                                    <img alt="User Pic" src="../../images/team/<?= $row['image']; ?>"
                                         class="img-squarre img-responsive" style="max-height:300px; max-width:200px;border: 1px solid red;">
                                    <br>
                                    <form method="POST" action="upload_avatar_admin.php?id_user=<?= $row['id_user']; ?>" enctype="multipart/form-data">
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


            <div class="col-md-3">
                <div class="team-member" style="border: 1px solid
                <?php if ($row['role'] == 'admin') {
                    echo '#E52C27';
                } else if ($row['role'] == 'Chef de projet') {
                    echo 'yellow';
                } else {
                    echo 'green';
                }
                ?>;background: <?php if ($row['role'] == 'admin') {
                    echo '#E52C27';
                } else if ($row['role'] == 'Chef de projet') {
                    echo 'yellow';
                } else {
                    echo 'green';
                }
                ?>;">

                    <div class="thumnail">

                        <img src="../../images/team/<?= $row['image']; ?>" alt="" class="cause-img" style="max-height:250px;min-height:250px;">

                    </div>


                    <br>
                    <h4 class="member-name" style="color: <?php if ($row['role'] == 'admin') {
                        echo 'white';
                    } else if ($row['role'] == 'Chef de projet') {
                        echo 'black';
                    } else {
                        echo 'black';
                    }
                    ?>"><?= $row['name']; ?></h4>

                    <div class="member-position" style="color: <?php if ($row['role'] == 'admin') {
                        echo 'white';
                    } else if ($row['role'] == 'Chef de projet') {
                        echo 'black';
                    } else {
                        echo 'black';
                    }
                    ?>;">
                        <?= strtoupper($row['role']); ?>
                    </div>
                    <br>
                    <br>

                    <div class="btn-holder">

                        <button href="#" class="btn Modif" data-toggle="modal"
                                data-target="#modifProfilAdminModal-<?= $row['id_user'] ?>"> Modifier
                        </button>
                        <button href="#" class="btn Delete" data-toggle="modal"
                                data-target="#deleteProfilAdminModal-<?= $row['id_user'] ?>"> Supprimer
                        </button>


                    </div>


                </div> <!-- /.team-member -->

            </div>
            <?php
        }
        ?>
        <br>
    </div>
</div>
<br>
<br>



<?php
$sql = $conn->query("SELECT * 
                                                     FROM users 
                                                     WHERE account = 'off'");
$nb_lignes = $sql->rowCount();
?>
<h2 class="title-style-1">Liste des Users (Désactivés ( <?= $nb_lignes; ?> )) : <span class="title-under"></span></h2>


<div class="container">
    <div class="row">
        <?php
        $sql = $conn->query("SELECT * FROM users WHERE account = 'off' ORDER BY id_user");
        while ($row = $sql->fetch()) {
            ?>
            <!-- Activate Profil Admin Modal -->
            <div class="modal fade" id="activateProfilAdminModal-<?=$row['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: green;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="donateModalLabel">Reactiver profil</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-donation" method="POST" action="../admin/activateProfilAdmin.php?id_user=<?=(int)$row['id_user']?>">

                                <h3 class="title-style-1 text-center">Etes-vous sur ?<span class="title-under"></span>  </h3>

                                <div class="row">

                                    <div class="form-group col-md-2 col-md-offset-3">
                                        <button type="submit" class="btn Valide" name="donateNow" > Valider</button>
                                    </div>

                                    <div class="col-md-5 col-md-offset-1">
                                        <button class="btn Delete" name="" > Annuler</button>
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div> <!-- /.modal -->

                   <!-- Modifier Profil Modal ADMIN-->
            <div class="modal fade" id="modifProfilAdminModal-<?= $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: orange;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="donateModalLabel">Modifier profil</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-donation" method="POST" action="../users/modifProfil.php">

                                <h3 class="title-style-1 text-center">Modifier ce profil <span class="title-under"></span>  </h3>


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
                                        <input type="password" class="form-control" name="verif" placeholder="Verification" required>
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
                                    <img alt="User Pic" src="../../images/team/<?= $row['image']; ?>"
                                         class="img-squarre img-responsive" style="max-height:300px; max-width:200px;border: 1px solid red;">
                                    <br>
                                    <form method="POST" action="../upload_avatar.php" enctype="multipart/form-data">
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


            <div class="col-md-3">
                <div class="team-member" style="border: 1px solid
                <?php if ($row['role'] == 'admin') {
                    echo '#E52C27';
                } else if ($row['role'] == 'Chef de projet') {
                    echo 'yellow';
                } else {
                    echo 'green';
                }
                ?>;background: <?php if ($row['role'] == 'admin') {
                    echo '#E52C27';
                } else if ($row['role'] == 'Chef de projet') {
                    echo 'yellow';
                } else {
                    echo 'green';
                }
                ?>;">

                    <div class="thumnail">

                        <img src="../../images/team/<?= $row['image']; ?>" alt="" class="cause-img" style="max-height:250px;">

                    </div>


                    <br>
                    <h4 class="member-name" style="color: <?php if ($row['role'] == 'admin') {
                        echo 'white';
                    } else if ($row['role'] == 'Chef de projet') {
                        echo 'black';
                    } else {
                        echo 'black';
                    }
                    ?>"><?= $row['name']; ?></h4>

                    <div class="member-position" style="color: <?php if ($row['role'] == 'admin') {
                        echo 'white';
                    } else if ($row['role'] == 'Chef de projet') {
                        echo 'black';
                    } else {
                        echo 'black';
                    }
                    ?>;">
                        <?= strtoupper($row['role']); ?>
                    </div>
                    <br>
                    <br>

                    <div class="btn-holder">

                        <button href="#" class="btn Modif" data-toggle="modal"
                                data-target="#modifProfilAdminModal-<?= $row['id_user'] ?>"> Modifier
                        </button>
                        <button href="#" class="btn Valide" data-toggle="modal"
                                data-target="#activateProfilAdminModal-<?= $row['id_user'] ?>"> Reactiver
                        </button>


                    </div>


                </div> <!-- /.team-member -->

            </div>
            <?php
        }
        ?>
        <br>
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
