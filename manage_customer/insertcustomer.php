<?php
require "../class/connect.php";

$name = "customername";
$phonenumber = "customerphonenumber";
$postcode = "customerpostcode";
$state = "customerstate";
$address = "customeraddress";
$email = "customeremail";
$status = "customerstatus";
 

if( isset($_POST['customername']) && !empty($_POST['customername'])  && isset($_POST['customerphonenumber']) 
		&& !empty($_POST['customerphonenumber']) && isset($_POST['customerpostcode']) && !empty($_POST['customerpostcode']) 
		&& isset($_POST['customerstate']) && !empty($_POST['customerstate']) 
		&& isset($_POST['customeraddress']) && !empty($_POST['customeraddress']) && isset($_POST['customeremail']) && !empty($_POST['customeremail'])
		&& isset($_POST['customerstatus']) && !empty($_POST['customerstatus'])) {
			

$name = $_POST['customername'];
$phonenumber = $_POST['customerphonenumber'];
$postcode = $_POST['customerpostcode'];
$state = $_POST['customerstate']; 
$address = $_POST['customeraddress']; 
$email = $_POST['customeremail']; 
$status = $_POST['customerstatus'];


$sql = "INSERT INTO customer (customername, customerphonenumber, customerpostcode, customerstate, customeraddress, customeremail, customerstatus)
		VALUES ( '$name', '$phonenumber', '$postcode', '$state', '$address', '$email', '$status')"; 
		
		
		
		
		
mysqli_query($conn, $sql)
or die ("Error inserting data". mysqli_error($conn));


}
?>
