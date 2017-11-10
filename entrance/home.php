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
    echo "<meta http-equiv=\"refresh\"content=\"2;URL=login.php\">";
    echo 'Username is not set';
}
else{
    $userName = $_SESSION[User::$keyUserName];
    $name = $_SESSION[User::$keyName];
    $myUser = $_SESSION[User::$keyUserObj];
?>
<html>
    <head>
        <title>Welcome</title>
        <?php 
            require './library/header.php';
        ?>
    </head>
    <body>
        <div class="content" style="border:1px solid #0099FF;">
            <div class="easyui-layout">
                <div data-options="region:'north',split:true" >
                    <ul class="nav-bar">
                        <li><a href="#">Welcome <strong><?= $name?></strong></a></li>
                        <li style="float: right; display: block; margin: 0;"><a title="Log Out" href="logOut.php"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                 <div style="padding: 15px;"></div>
                 <div region="center" >
                    <div class="row">
                        <div class="column">
                            <div class="menuRd">
                                <a style="display: block;" href="../manage_customer/">
                                    <i class="fa fa-address-card-o fa-4x" aria-hidden="true"></i>
                                    <p>Manage Customer</p>
                                </a>
                                
                            </div>
                        </div>
                        <div class="column">
                            <div class="menuRd">
                                <a style="display: block;" href="../manage_worker/">
                                    <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                                        <p>Manage Worker</p>
                                </a>
                            </div>
                        </div>
                        <div class="column ">
                            <div class="menuRd">
                                <a style="display: block;">
                                    <i class="fa fa-calendar fa-4x" aria-hidden="true"></i>
                                    <p>Manage Reservation</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
       
    </body>
    
</html>

<?php    
    
}//end else

?>




