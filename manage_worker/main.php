<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once('../class/User.php');

// we've writen this code where we need
function __autoload($classname) {
    $filename = "../class/". $classname .".php";
    include_once($filename);
}


if(!isset($_SESSION[User::$keyUserName])){
    //direct to home page
    echo "<meta http-equiv=\"refresh\"content=\"2;URL=../entrance/login.php\">";
    echo 'Invalid session.';
}
else{
    $userName = $_SESSION[User::$keyUserName];
    $name = $_SESSION[User::$keyName];
    $myUser = $_SESSION[User::$keyUserObj];
    $userType = $_SESSION[User::$keyUserType];
?>
<html>
    <head>
        <title>Manage Customer</title>
        <?php 
            require './library/header.php';
        ?>
    </head>
    <body>
        <div class="content" style="border:1px solid #0099FF; max-width: 1800px;">
            <div class="easyui-layout" style="height: 100%;">
                 <div data-options="region:'north'" style="height:50px">
                   <?php include './library/topNav.php';?>
                 </div>  
                
                <div data-options="region:'west', split:'true'" style="width: 200px;">
                    <div class="thumbnail">
                        <p>Name: <b><?=$name?></b></p>                         
                        <p>Username: <b><?=$userName?></b></p>                         
                        <p>Type: <b><?=$userType?></b></p>                         
                     </div>
                </div>
                                          
                <div data-options="region:'center'">
                    
                    <!--dialog div-->
                    <div id="dlg" class="easyui-dialog" style="width:400px;height:300px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
                        <div class="ftitle">Worker Information</div>
                        <form id="fm" method="post" novalidate>

                                <div class="fitem">

                                        <input name="workersid" cdlass="easyui-textbox" type="hidden" >
                                </div>
                                <div class="fitem" style="padding: 5px;">
                                        <label>Username:</label>
                                        <input name="username" id="username" class="easyui-textbox tb" data-options="required:true,validType:'length[3,20]',validateOnCreate:false,validateOnBlur:true,err:err">
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
                    
                    <!--the table div-->
                    <div style="text-align: center; margin: 10px;">
                        <h2><i class="fa fa-users fa-lg" aria-hidden="true"></i> Worker Management</h2>
                    </div>
                    <div style="padding: 10px; margin: auto; width:90%;">
                        <table id="dg" title="WORKER INFORMATION" class="easyui-datagrid" style="width:1325px;height:550px"
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
                    </div>
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
                    <!--table end-->
                                   
                </div>
                 
            </div>
        </div>
        
        <!--footer-->
        <?php require './library/footer.php';?>
        <script type="text/javascript" src="../assets/js/datagrid-detailview.js"></script>
        <script type="text/javascript" src="../assets/js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../assets/js/datagrid-scrollview.js"></script>
        
        <script type="text/javascript">

            var url;
            function newworker(){
                $('#dlg').dialog('open').dialog('setTitle','New worker');
                $('#fm').form('clear');
                $("#_easyui_textbox_input1").prop('disabled', false);
                url = 'insertworker.php';
            }
            function editworker(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                        $('#dlg').dialog('open').dialog('setTitle','Edit worker');
                        $('#fm').form('load',row);
                        $("#_easyui_textbox_input1").prop('disabled', true);
                        url = 'updateworker.php?workersid='+row.workersid;
                }
            }
//            function saveworker(){
//                $('#fm').form(
//                'submit',{
//                    url: url,
//                    onSubmit: function(){
//                            return $(this).form('validate');
//                    },
//
//                    success: 
//
//                    function(result){
//                        var reply = JSON.parse(result);
//                        console.log(reply);
//                        if (result.status === false){
//                                $.messager.show({
//                                        title: 'Error',
//                                        msg: result.msg
//                                                                                        });
//                        } else {
//                                alert(result);
//                                $('#dlg').dialog('close');		// close the dialog
//                                $('#dg').datagrid('reload');	// reload the user data
//                        }
//                    }
//
//                });
//                $('#dlg').dialog('close');		// close the dialog
//                //$('#dg').datagrid('reload');
//                location.reload(true);
//                $('#dg').datagrid('scrollTo', 25);
//            }
                     
            
            function destroyUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirm','Are you sure you want to delete this worker?',function(r){
                        if (r){
                            $.post('deleteworker.php?workersid='+row.workersid,function(result){
                                if (result.success){								
                                    $('#dg').datagrid('reload');	// reload the user data
                                } else {
                                    $.messager.show({	// show error message
                                            title: 'Error',
                                            msg: result.errorMsg
                                    });
                                }
                            },'json');
                            location.reload(true);
                        }
                    });	
                }			
            }
            
            function doSearch(){
                $('#dg').datagrid('load',{
                    key: $('#searchKey').val()
                });
            }
            
            function doReloadData(){
                
                $('#searchKey').val("");
                doSearch();
            }
            
            function saveworker(){
              $('#fm').form({
                    url:url,
                    onSubmit: function(){
                        // do some check
                        // return false to prevent submit;
                        if(!$(this).form('validate')){
                            alert("Invalid input. Please complete all fields.");
                            return false;
                        };
                    },
                    success:function(data){
                        var reply = JSON.parse(data);
                        if(reply.status){
                            alert("Success adding new worker.");
                            $('#dlg').dialog('close');		// close the dialog
                            //$('#dg').datagrid('reload');
                            location.reload(true);
                            $('#dg').datagrid('scrollTo', 25);
                        }
                        else{
                            alert(reply.msg);
                        }
                    }
                });
                // submit the form
                $('#fm').submit();  
            }
            
            function err(target, message){
                var t = $(target);
                if (t.hasClass('textbox-text')){
                    t = t.parent();
                }
                var m = t.next('.error-message');
                if (!m.length){
                    m = $('<div class="error-message"></div>').insertAfter(t);
                }
                m.html(message);
            }

		
	</script>
        <!--footer end-->
      
       
    </body>
</html>

<?php    
    
}//end else

?>

