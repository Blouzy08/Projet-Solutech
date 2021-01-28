<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
include "bdd.php";
if (isset($_GET['sujet'])){
    $sujet = $_GET['sujet'];
    $nomClient = $_GET['nom'];
    $statut = "Nouveau";
    $date = date("Y-m-d");
    $dbh->query("INSERT INTO tickets(Sujet,Client,Statut,DateCreation) VALUES (\"$sujet\",\"$nomClient\",\"$statut\",\"$date\")");
//                        echo $dbh->lastInsertId();
    header('Location: editTicket.php?id='.$dbh->lastInsertId());
}

if (isset($_GET['id'])){
    $ticket = $dbh->query("SELECT * FROM tickets WHERE id = \"".$_GET['id']."\"")->fetch();
    $client = $dbh->query("SELECT * FROM users WHERE id =\"".$ticket['Client']."\"")->fetch();
}else{
    header('Location: ticket.php');
}
if (isset($_POST['editor1'])){
    $dbh->query("INSERT INTO messagesticket(message,idTicket,idUser) VALUES (\"".$_POST['editor1']."\",\"".$_GET['id']."\","."0".")");
    $statut = $ticket["Statut"];
    if ($statut == "Nouveau"){
        $dbh->query("UPDATE tickets SET Statut = \"En cours\" WHERE id = \"".$_GET['id']."\"");
    }
    header('Location: editTicket.php?id='.$_GET['id']);

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Paper Dashboard 2 by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="./assets/css/input.css" rel="stylesheet" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
<!--    <script src="CKEditor/build/ckeditor.js"></script>-->


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!--  <link href="./assets/demo/demo.css" rel="stylesheet" />-->
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <!--        <a href="https://www.creative-tim.com" class="simple-text logo-mini">-->
            <!--          &lt;!&ndash; <div class="logo-image-small">-->
            <!--            <img src="./assets/img/logo-small.png">-->
            <!--          </div> &ndash;&gt;-->
            <!--          &lt;!&ndash; <p>CT</p> &ndash;&gt;-->
            <!--        </a>-->
            <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                <div class="logo-image-big">
                    <img src="assets/img/logo-bannière.png">
                </div>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="utilisateur.php">
                        <i class="nc-icon nc-badge"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>

                <li class="active ">
                    <a href="ticket.php">
                        <i class="nc-icon"><img class="icon-menu" src="assets/img/icons/ticket.svg"></i>
                        <p>Tickets</p>
                    </a>
                </li>

                <li>
                    <a href="wiki.html">
                        <i class="nc-icon nc-zoom-split"></i>
                        <p>Wiki</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand">Ticket</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    Nom de l'utilisateur
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">


                    <div class="wrap">
                        <div>
                            <fieldset id="bloc-editTicket">
                                <legend><input type="text" disabled value="<?php if (isset($_GET['id'])){ echo $ticket['Sujet']; }else echo "erreur" ?>"><span><?php if (isset($_GET['id'])){ echo $client['nom']; }?></span>
                                <select id="selectStatut">
                                    <option <?php if ($ticket['Statut']=="Nouveau") echo 'selected="selected"'?> value="Nouveau">Nouveau</option>
                                    <option <?php if ($ticket['Statut']=="En cours") echo 'selected="selected"'?> value="En cours">En cours</option>
                                    <option <?php if ($ticket['Statut']=="Resolu") echo 'selected="selected"'?> value="Resolu">Resolu</option>
                                </select>
                                </legend>
                                <div id="messAndTextarea">
                                    <div id="contentMess">
                                    <?php
                                        foreach ($dbh->query("SELECT * FROM messagesticket WHERE idTicket =\"".$_GET['id']."\"") as $message){
                                            echo "<div class='messageTicket ";
                                            if ($message['idUser']==0) {
                                                echo "messEnvoyee";
                                            }else {
                                                echo "messRecu";
                                            }
                                            echo "'><div class='messageT'>".$message['message']."</div></div>";
                                        }
                                    ?>
                                    </div>

                                    <?php if ($ticket['Statut']=="Resolu"){

                                    } else echo '<img id="textPopup" TITLE="Répondre" alt="Répondre" src="assets/img/icons/text.svg">'?>



                                    <form hidden class="formReponse" action="editTicket.php<?php echo "?id=".$_GET['id']; ?>" method="post">
                                        <textarea hidden <?php if ($ticket['Statut']=="Resolu") echo 'disabled'?> name="editor1" id="editor1" contenteditable="true" ></textarea>
                                        <?php

                                        ?>
                                        <button type="submit" class="btn" id="send">Envoyer</button>
                                    </form>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
            <div class="container-fluid">
                <div class="row">
                    <div class="credits ml-auto">
              <span class="copyright">
                © 2020, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.min.js"></script>
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="./assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/paper-dashboard.js" type="text/javascript"></script>
<!--<script src="./assets/js/ticket.js" type="text/javascript"></script>-->
<script src="./assets/js/input.js" type="text/javascript"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>
<script src="assets/js/editTicket.js" type="text/javascript"></script>

</body>

</html>
