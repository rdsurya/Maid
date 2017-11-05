<?php
session_start();
require '../class/Conn.php';
require_once('../class/User.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $username = isset($_REQUEST['name'])? $_REQUEST['name'] : null;
 $password = isset($_REQUEST['password'])? $_REQUEST['password'] : null;
 
 if($username == null || $password == null){
     die("Incomplete data!");
 }
 
$Objconn = new Conn();
$conn = $Objconn->getConn();

$query="Select password, type, id from login where username='".$username."' limit 1";

$result = mysqli_query($conn, $query);

if($row = mysqli_fetch_assoc($result)){
    
    $strPassword = $row['password'];
    if(strcmp($strPassword, $password) == 0){
      
        if(strcmp($row['type'], "administrator") == 0 || strcmp($row['type'], "worker")){
           $query="Select workersname from workers where workersid='".$row['id']."' limit 1"; 
        }
        else{
            $query="Select customername from customer where cutomerid='".$row['id']."' limit 1";
        }
        
        $result2 = mysqli_query($conn, $query);
        
        $name = "Undefine";
        
        if($row2= mysqli_fetch_array($result2)){
            $name=$row2[0];
        }
                
        $_SESSION[User::$keyUserName] = $username;
        $_SESSION[User::$keyUserType] = $row['type'];
        $_SESSION[User::$keyName] = $row2[0];
        $_SESSION[User::$keyUserObj] = new User($username, $row['type'], $row2[0]);
       
        //echo "0 ".$username." ".$row['type']." ".$row2[0];
        echo '0';
    }
    else{
        echo '2';
    }
}
 else {
    echo '1';
}

mysqli_close($conn);
 
?>

