<?php
require "connect.php";

if(isset($_GET['customerid'])){
	
	$Id= $_GET['customerid'];
$sql = "DELETE FROM customer WHERE customerid='$Id'";	
if ($conn->query($sql) === TRUE) {
   
	$_SESSION['status'] = "Success";
} else {
    
	$_SESSION['status'] = "Error: " . $conn->error;
}
}




?>