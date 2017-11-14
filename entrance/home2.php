<?php ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Maid Booking | Home</title>

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
                <a href="#" class="logo">Maid <span class="lite">Booking</span></a>
                <!--logo end-->

                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username">Jenifer Smith</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i> My Profile</a>
                                </li>
                                <li>
                                    <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
                                </li>
                                <li>
                                    <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
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
                <div id="sidebar" class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <li class="">
                            <a class="" href="index.html">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_document_alt"></i>
                                <span>Forms</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="form_component.html">Form Elements</a></li>
                                <li><a class="" href="form_validation.html">Form Validation</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>UI Fitures</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="general.html">Components</a></li>
                                <li><a class="" href="buttons.html">Buttons</a></li>
                                <li><a class="" href="grids.html">Grids</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="widgets.html">
                                <i class="icon_genius"></i>
                                <span>Widgets</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="chart-chartjs.html">
                                <i class="icon_piechart"></i>
                                <span>Charts</span>

                            </a>

                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_table"></i>
                                <span>Tables</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="basic_table.html">Basic Table</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu ">
                            <a href="javascript:;" class="">
                                <i class="icon_documents_alt"></i>
                                <span>Pages</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="profile.html">Profile</a></li>
                                <li><a class="" href="login.html"><span>Login Page</span></a></li>
                                <li><a class="active" href="blank.html">Blank Page</a></li>
                                <li><a class="" href="404.html">404 Error</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- sidebar menu end-->
                </div>
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
                            <a style="cursor: pointer">
                                <div class="info-box blue-bg">
                                    <i class="fa fa-cloud-download"></i>
                                    <div class="count">6.674</div>
                                    <div class="title">Download</div>
                                </div>
                                <!--/.info-box-->
                            </a>
                        </div>
                        <!--/.col-->

                        <div class="col-md-6 col-xs-12">
                            <a style="cursor: pointer">
                                <div class="info-box brown-bg">
                                    <i class="fa fa-shopping-cart"></i>
                                    <div class="count">7.538</div>
                                    <div class="title">Purchased</div>
                                </div>
                                <!--/.info-box-->
                            </a>
                        </div>
                        <!--/.col-->

                        <div class="col-md-6 col-xs-12">
                            <a style="cursor: pointer">
                                <div class="info-box dark-bg">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <div class="count">4.362</div>
                                    <div class="title">Order</div>
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
                <div class="credits">
                    Maid Booking for <a href="https://www.instagram.com/p/BYsrx76gIXD/?hl=en&taken-by=rdcfc">Diploma Project</a>
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

</html>


