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
                        <li class="active">
                            <a href="#"><i class="fa fa-fw fa-address-card"></i> Manage Customer</a>
                        </li>
                        <li>
                            <a href="../manage_worker/"><i class="fa fa-fw fa-users"></i> Manage Worker</a>
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
                                Manage Customer
                                <small>Make sure customer's information is up-to-date</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="../entrance/home.php">Home Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Manage Customer
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="thumbnail">
                                <!--datagrid start-->
                                <table id="dg" title="CUSTOMER INFORMATION" class="easyui-datagrid" style="width:95%;height:95%; min-height: 700px;"
                                       url="datagridcustomer.php" 
                                       toolbar="#toolbar" pagination="true"
                                       singleSelect="true" fitColumns="true" remoteSort="false">
                                    <thead>
                                        <tr>
                                            <th field="customerid" hidden="true" width="200" sortable="true">Customer ID</th>
                                            <th field="customername" align="center" width="200" sortable="true">Name</th>
                                            <th field="customerphonenumber" align="center" align="center" width="200" sortable="true">Phone Number</th>
                                            <th field="customerpostcode" align="center" width="200" sortable="true">Postcode</th>
                                            <th field="customerstate" align="center"width="200" sortable="true">State</th>
                                            <th field="customeraddress" width="200" align="center" sortable="true">Address</th>
                                            <th field="customeremail" width="200" align="center" sortable="true">Email</th>
                                            <th field="customerstatus" width="200" align="center" sortable="true">Status</th>                                               
                                        </tr>
                                    </thead>
                                </table>
                                <div id="toolbar">
                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newCustomer()">New Customer</a>
                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editcustomer()">Update</a>
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

        <!--dialog start-->
        <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
            <div class="ftitle">Customer Information</div>
            <form id="fm" method="post" novalidate>

                <div class="fitem">

                    <input name="customerid" cdlass="easyui-textbox" type="hidden" >
                </div>
                <div class="fitem">
                    <label>Name:</label>
                    <input name="customername" class="easyui-validatebox tb" data-options="required:true,validType:'length[3,20]',validateOnCreate:false,validateOnBlur:true">
                </div>
                <div class="fitem">
                    <label>Phone Number:</label>
                    <input name="customerphonenumber" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Postcode:</label>
                    <input name="customerpostcode" class="easyui-textbox"  required="true">
                </div>
                <div class="fitem">
                    <label>State:</label>
                    <input name="customerstate" class="easyui-textbox"  required="true">
                </div>
                <div class="fitem">
                    <label>Address:</label>
                    <input name="customeraddress" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Email:</label>
                    <input name="customeremail" class="easyui-validatebox tb" data-options="required:true,validType:'email'">
                </div>
                <div class="fitem">
                    <label>Status:</label>
                    <select name="customerstatus">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savecustomer()" style="width:90px">Save</a>
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
                function newCustomer() {
                    $('#dlg').dialog('open').dialog('setTitle', 'New Customer');
                    $('#fm').form('clear');
                    url = 'insertcustomer.php';
                }

                function editcustomer() {
                    var row = $('#dg').datagrid('getSelected');
                    if (row) {
                        $('#dlg').dialog('open').dialog('setTitle', 'Edit Customer');
                        $('#fm').form('load', row);
                        url = 'updatecustomer.php?customerid=' + row.customerid;
                    }
                }

                function savecustomer() {
                    var canProceed = false;
                    $('#fm').form('submit', {
                        url: url,
                        onSubmit: function () {
                            canProceed = $(this).form('validate');
                            if (!canProceed) {
                                alert("Please complete all inputs.");
                            }
                            return canProceed;
                        },
                        success:
                                function (result) {
                                    var objReply = getJson(result);
                                    if (objReply.valid) {
                                        if (!objReply.value.status) {
                                            canProceed = false;
                                            $.messager.show({
                                                title: 'Error',
                                                msg: objReply.value.msg
                                            });
                                        }
                                    } else {
                                        alert(result);
                                    }
                                    if (canProceed) {
                                        $('#dlg').dialog('close');		// close the dialog
                                        $('#dg').datagrid('reload');
//                                        location.reload(true);
                                        $('#dg').datagrid('scrollTo', 25);
                                    }
                                }

                    });



                }

                function destroyUser() {
                    var row = $('#dg').datagrid('getSelected');
                    if (row) {
                        $.messager.confirm('Confirm', 'Are you sure you want to delete this customer?', function (r) {
                            if (r) {
                                $.post('deletecustomer.php?customerid=' + row.customerid, function (result) {
                                    var objReply = getJson(result);
                                    if (objReply.valid) {
                                        if (objReply.value.status) {
                                            $('#dg').datagrid('reload');	// reload the user data
                                        } else {
                                            $.messager.show({// show error message
                                                title: 'Error',
                                                msg: objReply.value.msg
                                            });
                                        }

                                    } else {
                                        alert(result);
                                    }
                                }, 'json');
                                
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
        </script>

    </body>

</html>
