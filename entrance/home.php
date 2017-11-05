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
        <h3>Welcome <?= $name?></h3>
        <h3>My Object <?= $myUser->getName()?></h3>
    </body>
</html>



