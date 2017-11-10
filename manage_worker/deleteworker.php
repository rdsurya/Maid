<?php
require "../class/connect.php";

if(isset($_GET['workersid'])){
	
	$Id= $_GET['workersid'];
$sql = "DELETE FROM workers WHERE workersid='$Id'";	
if ($conn->query($sql) === TRUE) {
   
	$_SESSION['status'] = "Success";
} else {
    
	$_SESSION['status'] = "Error: " . $conn->error;
}
}




?>