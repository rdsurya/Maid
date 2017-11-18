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

        <title>Maid Booking | Manage Password</title>
        <?php require './library/header.php'; ?>

        <!-- Custom CSS -->
        <link href="../assets/css_sb/sb-admin.css" rel="stylesheet">



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
                            <a href="#"><i class="fa fa-fw fa-calendar"></i> Manage Reservation</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart"></i> Report <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="../report/main_worker.php">Worker</a>
                                </li>
                                <li>
                                    <a href="../report/main_customer.php">Customer</a>
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
                            <h1 class="page-header">
                                Manage Password
                                <small>Make sure you change your password frequently</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="../entrance/home.php">Home Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Manage Password
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="thumbnail">
                                <!-- content goes here -->
                                <form class="form-horizontal" id="pwd_form">
                                    <!-- Form Name -->
                                    <legend>Change Password</legend>

                                    <!-- Password input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="passwordinput">Current Password</label>
                                        <div class="col-md-4">
                                            <input id="old_pwd" name="passwordinput" type="password" placeholder="Enter your current password" class="form-control input-md" required >

                                        </div>
                                    </div>

                                    <!-- Password input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="passwordinput">New Password</label>
                                        <div class="col-md-4">
                                            <input id="new_pwd" name="passwordinput" type="password" placeholder="Enter your new password" class="form-control input-md" required minlength="3" max="10">

                                        </div>
                                    </div>

                                    <!-- Password input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="passwordinput">Retype Password</label>
                                        <div class="col-md-4">
                                            <input id="re_pwd" name="passwordinput" type="password" placeholder="Retype your new password" class="form-control input-md" required minlength="3" max="10">

                                        </div>
                                    </div>

                                </form>
                                <!-- content goes here -->
                                <div class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary" id="btnChange"><i class="fa fa-floppy-o"></i> Change</button>
                                        
                                        <button class="btn btn-default" id="btnClear"><i class="fa fa-ban"></i> Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->



        <!-- jQuery -->
        <?php require './library/footer.php'; ?>

        <script type="text/javascript" src="../assets/my_js/custom_function.js"></script>
        <script>
            $('#btnChange').on('click', function(){
                var p1 = $('#new_pwd').val();
                var p2 = $('#re_pwd').val();
                
                if(!$('#pwd_form')[0].checkValidity() ){
                    $('<input type="submit">').hide().appendTo('#pwd_form').click().remove();
                }
                else if(p1 !== p2){
                    alert("New password and retype password does not match!");
                    $('#new_pwd').val("");
                    $('#re_pwd').val("");
                }
                else{
                    var old = $('#old_pwd').val();
                    var data = {
                        old: old,
                        p1: p1
                    };
                    
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        timeout: 60000,
                        url: "./control/changePwdProcess.php",
                        data: data,
                        success: function (data, textStatus, jqXHR) {
                            if(data.valid){
                                alert(data.msg);
                                window.location="logOut.php";
                            }
                            else{
                                alert(data.msg);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert("Oops! "+errorThrown);
                        }
                    });
                }
            });
            
            $('#btnClear').on('click', function(){
                $('#pwd_form')[0].reset();
            });
        </script>

    </body>

</html>
