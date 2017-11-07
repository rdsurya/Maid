<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once('../class/User.php');
require_once('../class/CheckSession.php');

// we've writen this code where we need
function __autoload($classname) {
    $filename = "../class/". $classname .".php";
    include_once($filename);
}


if(!isset($_SESSION['USER_NAME'])){
    //direct to home page
    echo "<meta http-equiv=\"refresh\"content=\"2;URL=../entrance/login.php\">";
    echo 'Username is not set';
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
                                          
                <div data-options="region:'center'">
                    <div class="row">
                        <div class="kolom tepi" style="width: 15%; ">
                            <div class="thumbnail">
                                <p>Name: <b><?=$name?></b></p>                         
                                <p>Username: <b><?=$userName?></b></p>                         
                                <p>Type: <b><?=$userType?></b></p>                         
                             </div>
                        </div>
                        
                        <!----------------------kolom tengah---------------->
                        <div class="kolom tengah">
                            
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
                            
                            <!--datagrid start-->
                            <div class="demo-info" style="margin-bottom:10px">
                                    <div class="demo-tip icon-tip">&nbsp;</div>

                            </div>
                            <table id="dg" title="CUSTOMER INFORMATION" class="easyui-datagrid" style="width:1325px;height:550px"
                                            url="datagridcustomer.php" 
                                            toolbar="#toolbar" pagination="true"
                                            singleSelect="true" fitColumns="true">
                                    <thead>
                                            <tr>
                                                    <th field="customerid" hidden="true" width="200">Customer ID</th>
                                                    <th field="customername" align="center" width="200">Name</th>
                                                    <th field="customerphonenumber" align="center" align="center" width="200">Phone Number</th>
                                                    <th field="customerpostcode" align="center" width="200">Postcode</th>
                                                    <th field="customerstate" align="center"width="200">State</th>
                                                    <th field="customeraddress" width="200" align="center">Address</th>
                                                    <th field="customeremail" width="200" align="center">Email</th>
                                                    <th field="customerstatus" width="200" align="center">Status</th>

                                                    <div id="toolbar">
                                                        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newCustomer()">New Customer</a>
                                                        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editcustomer()">Update</a>
                                                        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Delete</a>


                                                    </div>
                           
                                    </thead>
                            </table>
                            <!--datagrid end-->
                            
                        </div>
                        
                        <!----------------------kolom tengah end---------------->
                        
                    </div>                   
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
		function newCustomer(){
			$('#dlg').dialog('open').dialog('setTitle','New Customer');
			$('#fm').form('clear');
			url = 'insertcustomer.php';
		}
		function editcustomer(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Customer');
				$('#fm').form('load',row);
				url = 'updatecustomer.php?customerid='+row.customerid;
			}
		}
		function savecustomer(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				
				success: 
				
				function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
													});
					} else {
						
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
				
				});
				$('#dlg').dialog('close');		// close the dialog
				//$('#dg').datagrid('reload');
				location.reload(true);
				$('#dg').datagrid('scrollTo', 25);
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to delete this customer?',function(r){
					if (r){
						$.post('deletecustomer.php?customerid='+row.customerid,function(result){
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
        </script>
        <!--footer end-->
      
       
    </body>
</html>

<?php    
    
}//end else

?>

