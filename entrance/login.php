<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link href="../assets/css/navigation.css" rel="stylesheet" type="text/css">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require '../class/User.php';
require '../class/CheckSession.php';

$checkSession = new CheckSession();
if($checkSession->isSessionValid()){
    //direct to home page
    echo "<meta http-equiv=\"refresh\"content=\"2;URL=home.php\">";
}

require './library/header.php';
?>
    </head>
    <body>
        <div style="width: 50%; margin: auto;">
            <div class="easyui-layout" style="width:700px;height:300px;">
                <div id="content" region="center" style="padding:5px; text-align: center;">
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">New Customer</a></li>
                     </ul>
                    
                    <div style="width: 50%; margin: auto; text-align: center;">
                        <div style="padding:3px 2px;border-bottom:1px solid #ccc">Login</div>
                        <br>
                        <form id="loginForm">
                            <div>
                                <label for="name">Username:</label>
                                <input class="easyui-validatebox easyui-textbox" type="text" name="name" id="name" required="true"></input>
                            </div>
                            <br>
                            <div>
                                <label for="email">Password:</label>
                                <input class="easyui-validatebox easyui-textbox" type="password" name="password" id="password" required="true"></input>
                            </div>
                            <br>
                        </form>
                        <div>
                            <button class="easyui-linkbutton" style="padding: 5px;" id="btnLogin">Login</button>
                            <button class="easyui-linkbutton" style="padding: 5px;">Clear</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php require './library/footer.php';?>
        <script type="text/javascript">
            $('#btnLogin').on('click', function(){
                var name = document.getElementById('name');
                var password = document.getElementById('password');
                if(!name.checkValidity()){
                    alert(name.validationMessage);
                }
                else if(!password.checkValidity()){
                    alert(password.validationMessage);
                }
                else{
                    console.log("Requesting");
                    var data={
                        name : name.value,
                        password : password.value
                    };
                    $.ajax({
                       type: 'POST',
                       data: data,
                       timeout: 5000,
                       url: "login_process.php",
                       success: function (data, textStatus, jqXHR) {
                           if(data.trim()==="0"){
                                window.location="home.php";
                            }
                            else if(data.trim()==="1"){
                                $.messager.alert('Oops!', 'Username is not exist!', 'warning');
                            }
                            else if(data.trim()==="2"){
                                $.messager.alert('Oops!', 'Incorrect password!', 'warning');
                            }
                            else{
                                alert(data);
                            }
                        },
                        error: function(err, status, errorThrown){
                            alert(errorThrown);
                            console.log("error");
                        }                        
                    });
                }
            });
            function login(){
                
            }
            
            function clear(){
                $('#loginForm')[0].reset();
            }
           
           
        </script>
    </body>
</html>


