<?php
session_start();
require '../class/User.php';

if (!isset($_SESSION['USER_NAME'])) {
    //direct to home page
    echo "<meta http-equiv=\"refresh\"content=\"1;URL=../entrance/login.php\">";
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

        <title>Maid Booking | Manage Reservation</title>
        <?php require './library/header.php'; ?>

        <!-- Custom CSS -->
        <link href="../assets/css_sb/sb-admin.css" rel="stylesheet">
        <link href="../assets/css/chart.css" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../entrance/home.php">Maid <span class="lite">Booking</span></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $name ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Username: <b><?= $userName ?></b><br>Type: <b><?= $userType ?></b></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="../entrance/logOut.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!------------ top menu item ends ------------------------------>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="../entrance/home.php"><i class="fa fa-fw fa-dashboard"></i> Home Dashboard</a>
                        </li>
                        <li>
                            <a href="../manage_customer/"><i class="fa fa-fw fa-address-card"></i> Manage Customer</a>
                        </li>
                        <li>
                            <a href="../manage_worker/"><i class="fa fa-fw fa-users"></i> Manage Worker</a>
                        </li>
                        <li>
                            <a href="../manage_reservation/"><i class="fa fa-fw fa-calendar"></i> Manage Reservation</a>
                        </li>
                        <li class="active">
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart"></i> Report <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li class="active">
                                    <a href="../report/main_worker.php">Worker</a>
                                </li>
                                <li>
                                    <a href="#">Customer</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="font-size: 30px; padding-top: 25px;">
                                Report
                                <small>Place to analyse your business data</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="../entrance/home.php">Home Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Customer Report
                                </li>
                            </ol>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-thumbs-up fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" id="s_complete"></div>
                                            <div>Completed Booking!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#d_complete">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" id="s_new"></div>
                                            <div>New Booking!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#d_new">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-dollar fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" id="s_money"></div>
                                            <div>Total Money Spent!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#d_money">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-thumbs-down fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" id="s_cancel"></div>
                                            <div>Canceled Booking!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#d_cancel">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                    <hr/>
                    <div class="row">
                        <div class="panel panel-primary" id="d_complete">
                            <div class="panel-heading" style="font-size: 20px;">
                                Top 10 customers with highest completed booking
                            </div>
                            <div class="panel-body">
                                <div class="chart-container" style="height: 100%; min-height: 550px; width: 100%; min-width: 550px; max-height: 800px;">
                                    <canvas id="complete_canvas" style="height: 500px;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/.row-->
                    <hr/>
                    <div class="row">
                        <div class="panel panel-green" id="d_new">
                            <div class="panel-heading" style="font-size: 20px;">
                                Top 10 customers with highest new booking
                            </div>
                            <div class="panel-body">
                                <div class="chart-container" style="height: 100%; min-height: 550px; width: 100%; min-width: 550px; max-height: 800px;">
                                    <canvas id="new_canvas" style="height: 500px;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/.row-->
                    <hr/>
                    <div class="row">
                        <div class="panel panel-yellow" id="d_money">
                            <div class="panel-heading" style="font-size: 20px;">
                                Top 10 customers with highest money spent
                            </div>
                            <div class="panel-body">
                                <div class="chart-container" style="height: 100%; min-height: 550px; width: 100%; min-width: 550px; max-height: 800px;">
                                    <canvas id="money_canvas" style="height: 500px;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/.row-->
                    <hr/>
                    <div class="row">
                        <div class="panel panel-red" id="d_cancel">
                            <div class="panel-heading" style="font-size: 20px;">
                                Top 10 customers with highest canceled booking
                            </div>
                            <div class="panel-body">
                                <div class="chart-container" style="height: 100%; min-height: 550px; width: 100%; min-width: 550px; max-height: 800px;">
                                    <canvas id="cancel_canvas" style="height: 500px;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/.row-->
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Add Modal Start -->
        <div class="modal fade" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <h3 class="modal-title">Reservation</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->

                        <!-- content goes here -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Add Modal End -->  



        <!-- jQuery -->
        <?php require './library/footer.php'; ?>

        <script type="text/javascript" src="../assets/my_js/custom_function.js"></script>
        <script type="text/javascript" src="../assets/js/Chart.bundle.js"></script>
<!--<script type="text/javascript" src="../assets/js/jquery.flexdatalist.min.js"></script>-->
<!--        <script type="text/javascript" src="../assets/js/jquery.datetimepicker.full.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="../assets/js/jszip.min.js"></script>
        <script type="text/javascript" src="../assets/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="../assets/js/vfs_fonts.js"></script>-->

        <script type="text/javascript">
            $(function () {
                getSummary();
                getWorkerDataComplete();
                getWorkerDataNew();
                getWorkerDataHour();
                getWorkerDataCancel();
            });

            function getSummary() {
                $.ajax({
                    type: 'POST',
                    url: "./customer_control/getSummary.php",
                    dataType: 'json',
                    timeout: 6000,
                    success: function (data, textStatus, jqXHR) {
                        $('#s_complete').html(data.complete);
                        $('#s_new').html(data.new);
                        $('#s_money').html("RM "+data.hours);
                        $('#s_cancel').html(data.cancel);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Oops! " + errorThrown);
                    }
                });
            }

            function createGraph(objJson, chartTitle, canvas, leLable) {

//                var canvas = $('#complete_canvas');

                var lhrLabel = objJson.arrName;
                var lhrData = objJson.arrData;
                var intT = objJson.totalRow;

                var lhrColour = [];

                var lhrColourTemp = ANL_getUniqueColors(intT);
                console.log(lhrColourTemp.length);

                for (var tempI = 0; tempI < lhrColourTemp.length; tempI++) {
                    var strRGBA = "rgba(" + lhrColourTemp[tempI][0] + ", " + lhrColourTemp[tempI][1] + ", " + lhrColourTemp[tempI][2] + ", 0.5)";
                    lhrColour.push(strRGBA);
                }

                new Chart(canvas,
                        {
                            type: "bar",
                            data: {
                                labels: lhrLabel,
                                datasets: [{
                                        label: leLable,
                                        data: lhrData,
                                        fill: false,
                                        backgroundColor: lhrColour,
                                        borderColor: lhrColour,
                                        borderWidth: 1
                                    }]
                            },
                            options: {
                                legend: {
                                    display: false,
                                    position: 'top',
                                    labels: {
                                        boxWidth: 40,
                                        fontColor: 'black'
                                    }
                                },
                                scales: {
                                    yAxes: [{
                                            ticks: {beginAtZero: true}
                                        }],
                                    xAxes: [{
                                            maxBarThickness: 30,
                                            categoryPercentage: 0.5,
                                            barPercentage: 1,
                                            stacked: false,
                                            beginAtZero: true,
                                            scaleLabel: {
                                                labelString: 'Description'
                                            },
                                            ticks: {
                                                stepSize: 1,
                                                min: 0,
                                                autoSkip: false
                                            }
                                        }]
                                },
                                title: {
                                    display: true,
                                    fontSize: 20,
                                    fontFamily: 'Arial',
                                    text: chartTitle,
                                    padding: 20
                                }
                            }
                        });
            }

            function getWorkerDataComplete() {
                $.ajax({
                    type: 'POST',
                    timeout: 6000,
                    url: "./worker_control/getCompleteDetail.php",
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        createGraph(data, "Top 10 customer", $('#complete_canvas'), "Completed Booking");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Oops! Problem loading graph. " + errorThrown);
                    }
                });
            }

            function getWorkerDataNew() {
                $.ajax({
                    type: 'POST',
                    timeout: 6000,
                    url: "./worker_control/getNewDetail.php",
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        createGraph(data, "Top 10 customer", $('#new_canvas'), "New Booking");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Oops! Problem loading graph. " + errorThrown);
                    }
                });
            }

            function getWorkerDataHour() {
                $.ajax({
                    type: 'POST',
                    timeout: 6000,
                    url: "./worker_control/getHourDetail.php",
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        createGraph(data, "Top 10 customer", $('#hour_canvas'), "Duration in hours");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Oops! Problem loading graph. " + errorThrown);
                    }
                });
            }

            function getWorkerDataCancel() {
                $.ajax({
                    type: 'POST',
                    timeout: 6000,
                    url: "./worker_control/getCancelDetail.php",
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        createGraph(data, "Top 10 customer", $('#cancel_canvas'), "Canceled Booking");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Oops! Problem loading graph. " + errorThrown);
                    }
                });
            }



        </script>

    </body>

</html>
