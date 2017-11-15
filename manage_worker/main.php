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

        <title>Maid Booking | Manage Customer</title>
        <?php require './library/header.php'; ?>
        <?php require './library/easy-ui_header.php'; ?>
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
                                <a href="#"><i class="fa fa-fw fa-user"></i> Username: <b><?= $userName ?></b></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-question"></i> Type: <b><?= $userType ?></b></a>
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
                        <li class="active">
                            <a href="#"><i class="fa fa-fw fa-users"></i> Manage Worker</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                        </li>
                        <li>
                            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                        </li>
                        <li>
                            <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                                <li>
                                    <a href="#">Dropdown Item</a>
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
                                Manage Worker
                                <small>Make sure worker's information is up-to-date</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="../entrance/home.php">Home Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Manage Worker
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="thumbnail">
                                <!--datagrid start-->
                                <table id="dg" title="WORKER INFORMATION" class="easyui-datagrid" style="width:97%;min-height:550px; height: 100%"
                                       url="datagridworker.php" 
                                       toolbar="#toolbar" pagination="true"
                                       singleSelect="true" fitColumns="true" remoteSort="false">
                                    <thead>
                                        <tr>
                                            <th field="workersid" hidden="true" width="200" sortable="true">Workers ID</th>
                                            <th field="username" align="center" width="200" sortable="true">Username</th>
                                            <th field="workersname" align="center" width="200" sortable="true">Name</th>
                                            <th field="workersphonenumber" align="center" width="200" sortable="true">Phone Number</th>
                                            <th field="workersalary" align="center" width="200" sortable="true">Salary</th>
                                            <th field="type" align="center" width="200" sortable="true">Type</th>                                 
                                            <th field="workerstatus" align="center" width="200" sortable="true">Status</th>                                 

                                    </thead>
                                </table>
                                <div id="toolbar">
                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newworker()">New worker</a>
                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editworker()">Update</a>
                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Delete</a>
                                    &nbsp;
                                    <span>Search:</span>
                                    <input id="searchKey" class="easyui-textbox">
                                    <a class="easyui-linkbutton" plain="true" onclick="doSearch()" title="Search"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
                                    <a class="easyui-linkbutton" plain="true" onclick="doReloadData()" title="Refresh"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></a>
                                </div>
                                <!--datagrid end-->
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

        <!--dialog div-->
        <div id="dlg" class="easyui-dialog" style="width:400px;height:500px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
            <div class="ftitle">Worker Information</div>
            <form id="fm" method="post" novalidate>

                <div class="fitem">

                    <input name="workersid" cdlass="easyui-textbox" type="hidden" >
                </div>
                <div class="fitem" style="padding: 5px;">
                    <label>Username:</label>
                    <input name="username" id="username" class="easyui-textbox tb" data-options="validType:'length[3,20]',validateOnCreate:false,validateOnBlur:true,err:err">
                    <p class="small">Optional, only for admin type.</p>
                </div>
                <div class="fitem" style="padding: 5px;">
                    <label>Name:</label>
                    <input name="workersname" class="easyui-textbox tb" data-options="required:true,validType:'length[3,20]',validateOnCreate:false,validateOnBlur:true,err:err">
                </div>
                <div class="fitem" style="padding: 5px;">
                    <label>Phone Number:</label>
                    <input name="workersphonenumber" class="easyui-textbox" data-options="required:true,validType:'length[3,20]',validateOnCreate:false,validateOnBlur:true,err:err">
                </div>
                <div class="fitem" style="padding: 5px;">
                    <label>Salary:</label>
                    <input name="workersalary" class="easyui-textbox" type="number" min="0" max="9999" step="1" data-options="required:true,validateOnCreate:false,validateOnBlur:true,err:err">
                </div>
                <div class="fitem" style="padding: 5px;">
                    <label>Type:</label>
                    <select name="type" data-options="required:true,validateOnCreate:false,validateOnBlur:true,err:err">
                        <option value="admin">Admin</option>
                        <option value="worker">Worker</option>
                    </select>
                </div>
                <div class="fitem" style="padding: 5px;">
                    <label>Status:</label>
                    <select name="workerstatus" data-options="required:true,validateOnCreate:false,validateOnBlur:true,err:err">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveworker()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
        </div>
        <!--dialog end-->

        <!-- jQuery -->
        <?php require './library/footer.php'; ?>
        <?php require './library/easy-ui_footer.php'; ?>
        <script type="text/javascript" src="../assets/js/datagrid-detailview.js"></script>
        <script type="text/javascript" src="../assets/js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../assets/js/datagrid-scrollview.js"></script>
        <script type="text/javascript" src="../assets/my_js/custom_function.js"></script>

        <script type="text/javascript">

                var url;
                function newworker() {
                    $('#dlg').dialog('open').dialog('setTitle', 'New worker');
                    $('#fm').form('clear');
                    $("#_easyui_textbox_input1").prop('disabled', false);
                    url = 'insertworker.php';
                }
                function editworker() {
                    var row = $('#dg').datagrid('getSelected');
                    if (row) {
                        $('#dlg').dialog('open').dialog('setTitle', 'Edit worker');
                        $('#fm').form('load', row);
                        $("#_easyui_textbox_input1").prop('disabled', true);
                        url = 'updateworker.php?workersid=' + row.workersid;
                    }
                }


                function destroyUser() {
                    var row = $('#dg').datagrid('getSelected');
                    if (row) {
                        $.messager.confirm('Confirm', 'Are you sure you want to delete this worker?', function (r) {
                            if (r) {
                                var data={
                                    workersid: row.workersid,
                                    type: row.type
                                };
                                $.post('deleteworker.php', data, function (result) {
                                    if (result.status) {
                                        $('#dg').datagrid('reload');	// reload the user data
                                    } else {
                                        $.messager.show({// show error message
                                            title: 'Error',
                                            msg: result.msg
                                        });
                                    }
                                }, 'json');
                                //location.reload(true);
                            }
                        });
                    }
                }

                function doSearch() {
                    $('#dg').datagrid('load', {
                        key: $('#searchKey').val()
                    });
                }

                function doReloadData() {

                    $('#searchKey').val("");
                    doSearch();
                }

                function saveworker() {
                    $('#fm').form({
                        url: url,
                        onSubmit: function () {
                            // do some check
                            // return false to prevent submit;
                            if (!$(this).form('validate')) {
                                alert("Invalid input. Please complete all fields.");
                                return false;
                            }
                            ;
                        },
                        success: function (data) {
                            var reply = JSON.parse(data);
                            if (reply.status) {
                                alert("Success adding new worker.");
                                $('#dlg').dialog('close');		// close the dialog
                                $('#dg').datagrid('reload');
//                                location.reload(true);
                                $('#dg').datagrid('scrollTo', 25);
                            } else {
                                alert(reply.msg);
                            }
                        }
                    });
                    // submit the form
                    $('#fm').submit();
                }

                function err(target, message) {
                    var t = $(target);
                    if (t.hasClass('textbox-text')) {
                        t = t.parent();
                    }
                    var m = t.next('.error-message');
                    if (!m.length) {
                        m = $('<div class="error-message"></div>').insertAfter(t);
                    }
                    m.html(message);
                }


        </script>

    </body>

</html>
