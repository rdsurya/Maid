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

        <title>House Cleaning 2 U System | Manage Reservation</title>
        <?php require './library/header.php'; ?>

        <!-- Custom CSS -->
        <link href="../assets/css_sb/sb-admin.css" rel="stylesheet">
        <link href="../assets/css/jquery.flexdatalist.min.css" rel="stylesheet">
        <link href="../assets/css/jquery.datetimepicker.css" rel="stylesheet">
        <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/buttons.bootstrap.min.css" rel="stylesheet">
        

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
                        <li class="active">
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
                                Manage Reservation
                                <small>Make sure reservation's information is up-to-date</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="../entrance/home.php">Home Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Manage Reservation
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="thumbnail">
                                <h4>
                                    List of Reservation
                                    <div class="pull-right">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#booking_modal" id="btnAddModal">
                                            <i class="fa fa-fw fa-plus-circle"></i> New Reservation 
                                        </button>
                                    </div>
                                </h4>

                                <hr/>
                                <div class="table-responsive" id="bookingTableDiv">
                                    
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
                        <form class="form-horizontal" id="bookingForm" autocomplete="off">
                            
                            <input type="hidden" id="modalId">
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Date</label>  
                                <div class="col-md-4">
                                    <input id="b_date" name="textinput" type="text" placeholder="Select the date" class="form-control input-md" required >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Start Time</label>  
                                <div class="col-md-4">
                                    <input id="b_start" name="textinput" type="text" placeholder="Pick a time" class="form-control input-md" required >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">End Time</label>  
                                <div class="col-md-4">
                                    <input id="b_end" name="textinput" type="text" placeholder="Pick a time" class="form-control input-md" required >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Duration (hours)</label>  
                                <div class="col-md-4">
                                    <input id="b_duration" name="textinput" type="text" placeholder="Working duration in hours" class="form-control input-md" required readonly>

                                </div>
                            </div>

                            <!-- Search input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="searchinput">Customer</label>
                                <div class="col-md-4">
                                    <input id="b_customer" name="searchinput" type="search" placeholder="Search customer" class="form-control input-md flexdatalist" required
                                           data-search-by-word="true"
                                           data-selection-required="true">

                                </div>
                            </div>

                            <!-- Search input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="searchinput">Worker</label>
                                <div class="col-md-4">
                                    <input id="b_worker" name="searchinput" type="search" placeholder="Search worker" class="form-control input-md" required>

                                </div>
                            </div>


                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="selectbasic">Status</label>
                                <div class="col-md-4">
                                    <select id="b_status" name="selectbasic" class="form-control">
                                        <option value="0">New</option>
                                        <option value="1">Completed</option>
                                        <option value="2">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Price (RM)</label>  
                                <div class="col-md-4">
                                    <input id="b_price" name="textinput" type="number" placeholder="Enter service price" class="form-control input-md" min="0" max="9999.99" step="0.01">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">Comment</label>
                                <div class="col-md-4">                     
                                    <textarea class="form-control" id="b_comment" name="textarea" maxlength="255"></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <span class="update_save_btn" id="divAdd">
                                <button id="btnAddBooking" type="button" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                            </span>
                            <span class="update_save_btn" id="divUpdate" style="display: none;">
                                <button id="btnUpdateBooking" type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Update</button>
                            </span>
                            &nbsp;
                            <span>
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_booking()"><i class="fa fa-times"></i> Close</button>
                            </span>

                        </div>

                        <!-- content goes here -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Add Modal End -->  



        <!-- jQuery -->
        <?php require './library/footer.php'; ?>

        <script type="text/javascript" src="../assets/my_js/custom_function.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.flexdatalist.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.datetimepicker.full.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="../assets/js/jszip.min.js"></script>
        <script type="text/javascript" src="../assets/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="../assets/js/vfs_fonts.js"></script>

        <script type="text/javascript">

            $(function () {
                initDateTimePicker();
                init_startTime();
                init_endTime();
                initFlexSearch('#b_customer', './control/getCustomer.php', '');
                initFlexSearch('#b_worker', './control/getWorker.php', '');
                loadBookingTable();

            });

            function clear_booking() {
                $('#bookingForm')[0].reset();
            }

            function init_startTime() {

                $('#b_start').datetimepicker({
                    format: 'H:i',
                    formatTime: 'H:i',
                    step:5,
                    onSelectTime: function (dp, $input) {
                        console.log($('#b_start').datetimepicker('getValue'));
                        console.log($('#b_end').datetimepicker('getValue'));

                        if($('#b_end').val()){
                            var end = $('#b_end').datetimepicker('getValue');
                            var start = $('#b_start').datetimepicker('getValue');

                            var startTime = (start.getHours()+":"+start.getMinutes());
                            var endTime = (end.getHours()+":"+end.getMinutes());

                            if(Date.parse('01/01/2011 '+startTime) > Date.parse('01/01/2011 '+endTime)){
                                console.log(start);
                                console.log(end);
                                alert("Start time should be earlier than end time!");
                                $('#b_start').val('');
                                //$('#b_end').val('');
                            }
                        }
                    },
                    datepicker: false
                });
            }

            function init_endTime() {

                $('#b_end').datetimepicker({
                    format: 'H:i',
                    formatTime: 'H:i',
                    step:5,
                    onSelectTime: function (dp, $input) {
                        console.log($('#b_start').datetimepicker('getValue'));
                        console.log($('#b_end').datetimepicker('getValue'));
                        if($('#b_start').val()){
                            var end = $('#b_end').datetimepicker('getValue');
                            var start = $('#b_start').datetimepicker('getValue');
                            var startTime = (start.getHours()+":"+start.getMinutes());
                            var endTime = (end.getHours()+":"+end.getMinutes());

                            if(Date.parse('01/01/2011 '+startTime) > Date.parse('01/01/2011 '+endTime)){
                                alert("End time should be later than start time!");
                                $('#b_end').val('');
    //                                                        $('#b_start').val('');
                            }
                        }
                    },
                    datepicker: false
                });
            }

            function initDateTimePicker() {

                $('#b_date').datetimepicker({
                    format: 'Y-m-d',
                    timepicker: false
                });
            }
            
            //----------- calculate hours --------------
            $('#b_start, #b_end').on('change', function(){
               var start = $('#b_start').val();
               var end = $('#b_end').val();
               
               var startAda = (start !=="" && start != null);
               var endAda = (end !=="" && end != null);
               
               if(startAda && endAda){
                   var startObj = $('#b_start').datetimepicker('getValue');
                   var endObj = $('#b_end').datetimepicker('getValue');
                   
                   var startNow = new Date(2011, 10, 1, startObj.getHours(), startObj.getMinutes());
                   var endNow = new Date(2011, 10, 1, endObj.getHours(), endObj.getMinutes());
                   
                   var seconds = (endNow - startNow)/1000;
                   
                   var hours = seconds/60/60;
                   
                   var rounded = Math.round( hours * 100 ) / 100;
                   
                   $('#b_duration').val(rounded);
                   
               } 
            });
            
            //---------------------- init flex datalist
            function initFlexSearch(elemID, url, value){
                $(elemID).flexdatalist('destroy');
                $(elemID).val(value).flexdatalist({
                    minLength: 1,
                    searchIn: 'name', 
                    searchDelay: 2000,
                    selectionRequired: true,
                    url: url,
                    visibleProperties: ['name', 'value'],
                    cache: true,
                    valueProperty: 'value'                    
                });
            }
            
            //------------------ submit booking-----------------------------------------
            $('#btnAddModal').on('click', function(){
                $('.update_save_btn').hide();
                $('#divAdd').show();
                initFlexSearch('#b_customer', './control/getCustomer.php', '');
                initFlexSearch('#b_worker', './control/getWorker.php', '');
            });
            
            function bookingCheckForm(){
                var valid = true;
                
                var workerid = $('#b_worker').val();
                var customer_id = $('#b_customer').val();
                
                if(!$('#bookingForm')[0].checkValidity() ){
                    $('<input type="submit">').hide().appendTo('#bookingForm').click().remove();
                    valid = false;
                }
                else if(customer_id==null || customer_id===""){
                    alert("Please search existing customer!");
                    $('#b_customer-flexdatalist').focus();
                    $('#b_customer-flexdatalist').val("");
                    valid=false;
                }
                else if(workerid==null || workerid===""){
                    alert("Please search existing worker!");
                    $('#b_worker-flexdatalist').focus();
                    $('#b_worker-flexdatalist').val("");
                    valid=false;
                }
                
                return valid;
            }
            
            $('#btnAddBooking').on('click', function(){
                                
                if(bookingCheckForm()){
                    var workerid = $('#b_worker').val();
                    var customer_id = $('#b_customer').val();
                    //alert($('#booking_modal #b_customer-flexdatalist').val() + " \nValue:"+$('#b_customer').val());
                    var data={
                        b_date: $('#b_date').val(),
                        b_start: $('#b_start').val(),
                        b_end: $('#b_end').val(),
                        b_duration: $('#b_duration').val(),
                        b_customerId: customer_id,
                        b_customerName: $('#booking_modal #b_customer-flexdatalist').val(),
                        b_workerId: workerid,
                        b_workerName: $('#booking_modal #b_worker-flexdatalist').val(),
                        b_status: $('#b_status').val(),
                        b_comment: $('#b_comment').val(),
                        b_price: $('#b_price').val()
                    };
                    
                    $.ajax({
                        type: 'POST',
                        data: data,
                        url: "./control/insertBooking.php",
                        timeout: 6000,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if(data.valid){
                                alert(data.msg);
                                $('#booking_modal').modal('hide');
                                loadBookingTable();
                                clear_booking();
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
            
            //----------------- update booking ---------------------
            $('#b_status').on('change', function (){
                var status = this.value;
                $('#b_price').prop('required', false);
                
                
                if(status === "1"){
                    $('#b_price').prop('required', true);
                }
            });
            
            $('#bookingTableDiv').on('click', '#btnUpdateModal', function(){
                $('.update_save_btn').hide();
                $('#divUpdate').show();
                var hiden = $(this).closest('td').find('#b_obj').val();
                var obj = JSON.parse(hiden);
                initFlexSearch('#b_customer', './control/getCustomer.php', obj.customer_id);
                initFlexSearch('#b_worker', './control/getWorker.php', obj.worker_id);
                
                $('#modalId').val(obj.leID);
                $('#b_date').val(obj.booking_date);
                $('#b_start').val(obj.startTime);
                $('#b_end').val(obj.endTime);
                $('#b_duration').val(obj.duration);
                $('#b_comment').val(obj.comment);
                $('#b_price').val(obj.price);
                $('#b_status').val(obj.status);
                
                
                $('#booking_modal').modal('show');
                
                
            });
            
            $('#btnUpdateBooking').on('click', function(){
                if(bookingCheckForm()){
                    var workerid = $('#b_worker').val();
                    var customer_id = $('#b_customer').val();
                    //alert($('#booking_modal #b_customer-flexdatalist').val() + " \nValue:"+$('#b_customer').val());
                    var data={
                        b_date: $('#b_date').val(),
                        b_start: $('#b_start').val(),
                        b_end: $('#b_end').val(),
                        b_duration: $('#b_duration').val(),
                        b_customerId: customer_id,
                        b_customerName: $('#booking_modal #b_customer-flexdatalist').val(),
                        b_workerId: workerid,
                        b_workerName: $('#booking_modal #b_worker-flexdatalist').val(),
                        b_status: $('#b_status').val(),
                        b_comment: $('#b_comment').val(),
                        b_price: $('#b_price').val(),
                        b_id: $('#modalId').val()
                    };
                    
                    $.ajax({
                        type: 'POST',
                        data: data,
                        url: "./control/updateBooking.php",
                        timeout: 6000,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if(data.valid){
                                alert(data.msg);
                                $('#booking_modal').modal('hide');
                                loadBookingTable();
                                clear_booking();
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
            
            
            //---------------- view only ------------------------------
            $('#bookingTableDiv').on('click', '#btnViewModal', function(){
                $('.update_save_btn').hide();
                
                var hiden = $(this).closest('td').find('#b_obj').val();
                var obj = JSON.parse(hiden);
                initFlexSearch('#b_customer', './control/getCustomer.php', obj.customer_id);
                initFlexSearch('#b_worker', './control/getWorker.php', obj.worker_id);
                
                $('#modalId').val(obj.leID);
                $('#b_date').val(obj.booking_date);
                $('#b_start').val(obj.startTime);
                $('#b_end').val(obj.endTime);
                $('#b_duration').val(obj.duration);
                $('#b_comment').val(obj.comment);
                $('#b_price').val(obj.price);
                $('#b_status').val(obj.status);
                
                
                $('#booking_modal').modal('show');
                
                
            });
            
            //delete booking record
            $('#bookingTableDiv').on('click', '#btnDelete', function(){
                var hiden = $(this).closest('td').find('#b_obj').val();
                var obj = JSON.parse(hiden);
                
                var yes = confirm("Are you sure you want to delete record on "+obj.booking_date+" for customer "+obj.customer_name+ "?");
                if(yes){
                    var data = {
                        b_id: obj.leID
                    };
                    
                    $.ajax({
                        type: 'POST',
                        data: data,
                        url: "./control/deleteBooking.php",
                        timeout: 6000,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if(data.valid){
                                alert(data.msg);
                               
                                loadBookingTable();
                               
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
            
            
            function loadBookingTable(){
                $.ajax({
                    type: 'POST',
                    url: "./control/getBookingTable.php",
                    timeout: 60000,
                    success: function (data, textStatus, jqXHR) {
                        $('#bookingTableDiv').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Oops!"+errorThrown);
                    }
                });
            }

        </script>

    </body>

</html>
