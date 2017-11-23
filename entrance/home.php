<?php
session_start();
require '../class/User.php';
if (!isset($_SESSION['USER_NAME'])) {
    //direct to home page
    echo "<meta http-equiv=\"refresh\"content=\"1;URL=login.php\">";
    echo 'Username is not set';
    return;
} else {
    $userName = $_SESSION[User::$keyUserName];
    $name = $_SESSION[User::$keyName];
    $myUser = $_SESSION[User::$keyUserObj];
    $userType = $_SESSION[User::$keyUserType];
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="img/favicon.png">

        <title>House Cleaning 2 U System  | Home</title>

        <!-- Bootstrap CSS -->
        <?php require './library/header.php'; ?>
        <!-- bootstrap theme -->
        <link href="../assets/css_na/bootstrap-theme.css" rel="stylesheet">
        <!-- font icon -->
        <link href="../assets/css_na/elegant-icons-style.css" rel="stylesheet" />

        <!-- Custom styles -->
        <link href="../assets/css_na/style.css" rel="stylesheet">
        <link href="../assets/css_na/style-responsive.css" rel="stylesheet" />


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <script src="js/lte-ie7.js"></script>
          <![endif]-->

        <!-- =======================================================
          Theme Name: NiceAdmin
          Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
          Author: BootstrapMade
          Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>

    <body>
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->

            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="#" class="logo">House Cleaning <span class="lite">2 U System</span></a>
                <!--logo end-->

                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username"><?= $name ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i>
                                        Username: <b><?= $userName ?></b><br>
                                        Type: <b><?= $userType ?></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="changePwd.php"><i class="fa fa-key"></i> Change password?</a>
                                </li>
                                <li>
                                    <a href="logOut.php"><i class="fa fa-power-off"></i> Log Out</a>
                                </li>

                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <?php require './library/sideBar.php'; ?>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa fa-bars"></i>HOME</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- page start-->
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <a style="cursor: pointer" href="../manage_customer/">
                                <div class="info-box blue-bg">
                                    <i class="fa fa-address-card-o"></i>
                                    <div class="count" id="totalCustomer"></div>
                                    <div class="title">Customers</div>
                                    <br>
                                    <div class="small">Go to Manage Customer</div>
                                </div>
                                <!--/.info-box-->
                            </a>
                        </div>
                        <!--/.col-->

                        <div class="col-md-6 col-xs-12">
                            <a style="cursor: pointer" href="../manage_worker/">
                                <div class="info-box brown-bg">
                                    <i class="fa fa-users"></i>
                                    <div class="count" id="totalWorker"></div>
                                    <div class="title">Workers</div>
                                    <br>
                                    <div class="small">Go to Manage Worker</div>
                                </div>
                                <!--/.info-box-->
                            </a>
                        </div>
                        <!--/.col-->

                        <div class="col-md-6 col-xs-12">
                            <a style="cursor: pointer" href="../manage_reservation/">
                                <div class="info-box dark-bg">
                                    <i class="fa fa-calendar"></i>
                                    <div class="count" id="totalBooking"></div>
                                    <div class="title">Reservation</div>
                                    <br>
                                    <div class="small">Go to Manage Reservation</div>
                                </div>
                                <!--/.info-box-->
                            </a>
                        </div>
                        <!--/.col-->     

                        <div class="col-md-6 col-xs-12">
                            <a style="cursor: pointer" href="../report/main_worker.php">
                                <div class="info-box orange-bg">
                                    <i class="fa fa-bar-chart"></i>
                                    <div class="count" > $ % ?</div>
                                    <div class="title">Report</div>
                                    <br>
                                    <div class="small">Go to View Report</div>
                                </div>
                                <!--/.info-box-->
                            </a>
                        </div>
                        <!--/.col-->                 
                    </div>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
            <div class="text-right">
                <div class="credits" style="padding: 10px;">
                    House Cleaning 2 U System  for <a href="https://www.instagram.com/p/BYsrx76gIXD/?hl=en&taken-by=rdcfc">Diploma Project</a>
                </div>
            </div>
        </section>
        <!-- container section end -->

       

        <!-- javascripts -->
        <?php require './library/footer.php'; ?>
        <!-- nice scroll -->
        <script src="../assets/js_na/jquery.scrollTo.min.js"></script>
        <script src="../assets/js_na/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="../assets/js_na/scripts.js"></script>


    </body>
    <script>
        $(function () {
            $.ajax({
                type: 'POST',
                url: "./control/getTotalWorker.php",
                timeout: 6000,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    $('#totalWorker').html(data.total);
                }
            });
            $.ajax({
                type: 'POST',
                url: "./control/getTotalCustomer.php",
                timeout: 6000,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    $('#totalCustomer').html(data.total);
                }
            });
            $.ajax({
                type: 'POST',
                url: "./control/getTotalBooking.php",
                timeout: 6000,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    $('#totalBooking').html(data.total);
                }
            });
            
           
        });
    </script>

</html>


