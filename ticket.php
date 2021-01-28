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
include "bdd.php"
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
    <link href="datatable/datatables.min.css" rel="stylesheet">

    <link href="./assets/css/input.css" rel="stylesheet" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
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
                    <?php
//                    '<form action="editTicket.php"><div class="wrap newTicket"><input name="sujet" id="sujet" placeholder="Sujet" type="text" required><select name="nom" id="nom" class=selectUser><option value="1">Louis</option></select><input type="submit" class="btn" value="Valider"></div></form>'
                    ?>
                    <a class="navbar-brand">Ticket<img id="addTicket" data-toggle="popover"  data-content='<form action="editTicket.php"><div class="wrap newTicket"><input name="sujet" id="sujet" placeholder="Sujet" type="text" required><select name="nom" id="nom" class=selectUser>

                    <?php
                        foreach ($dbh ->query("SELECT * FROM users") as $user){
                            echo "<option value=\"".$user['id']."\">".$user['nom']."</option>";
                        }
                        ?>
                    </select><input type="submit" class="btn" value="Valider"></div></form>' src="assets/img/icons/plus.svg" alt="Créer un ticket" title="Créer un ticket" width="20px" style="margin-left: 10px"></a>
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


<!--                    <div class="bloc-filtreTicket">-->
<!---->
<!--                        <h5 id="filtre">Filtre <img src="assets/img/icons/arrow.svg" width="10px"></h5>-->
<!--                        <div id="contentFiltre" style="display: none">-->
<!---->
<!---->
<!---->
<!---->
<!--                            <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>-->
<!---->
<!---->
<!--                            <div class="wrap">-->
<!--                                <div>-->
<!--                                    <label class="labelInput" for="fname">Sujet</label>-->
<!--                                    <input class="inputJS" id="fname" type="text" class="cool"/>-->
<!--                                    <label class="labelInput" for="lname">Client</label>-->
<!--                                    <input class="inputJS" id="lname" type="text" class="cool"/>-->
<!--                                    <label class="labelInput" for="email">Entreprise</label>-->
<!--                                    <input class="inputJS" id="email" type="text" class="cool"/>-->
<!---->
<!--                                    <span class="selectInput">-->
<!--                                        <label for="nouveau">Nouveau</label>-->
<!--                                        <input  id="nouveau" type="checkbox">-->
<!--                                    </span>-->
<!--                                    <span class="selectInput">-->
<!--                                        <label for="enCours">En cours</label>-->
<!--                                        <input id="enCours" type="checkbox">-->
<!--                                    </span>-->
<!--                                    <span class="selectInput">-->
<!--                                        <label for="resolu">Résolu</label>-->
<!--                                        <input id="resolu" type="checkbox">-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <table class="table table-ticket">-->
<!--                        <tr>-->
<!--                            <th>Sujet</th>-->
<!--                            <th>Client</th>-->
<!--                            <th>Entreprise</th>-->
<!--                            <th>Statut</th>-->
<!--                            <th>Date</th>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Bug</td>-->
<!--                            <td>John Doe</td>-->
<!--                            <td>John Doe Company</td>-->
<!--                            <td>Nouveau</td>-->
<!--                            <td>14/01/2021</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Panne dans le service</td>-->
<!--                            <td>John Doe</td>-->
<!--                            <td>John Doe Company</td>-->
<!--                            <td>En cours</td>-->
<!--                            <td>14/01/2021</td>-->
<!--                        </tr>-->
<!--                    </table>-->

                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>Sujet</th>
                            <th>Client</th>
                            <th>Entreprise</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($dbh ->query("SELECT * FROM tickets") as $ticket){
                            $client = $dbh ->query("SELECT * FROM users WHERE id = \"".$ticket['Client']."\"")->fetch();
                            echo "<tr id='".$ticket['id']."'>
                                      <td>".$ticket['Sujet']."</td>
                                      <td>".$client['nom']."</td>
                                      <td>".$client['entreprise']."</td>
                                      <td>".$ticket['Statut']."</td>
                                      <td>".$ticket['DateCreation']."</td>
                                  </tr>";
                        }
                        ?>

                        </tbody>
                    </table>


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
<!--  Google Maps Plugin    -->
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Chart JS -->
<script src="./assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/paper-dashboard.js" type="text/javascript"></script>
<script src="./assets/js/ticket.js" type="text/javascript"></script>
<script src="./assets/js/input.js" type="text/javascript"></script>
<script src="datatable/datatables.min.js" type="text/javascript"></script>
</body>

</html>