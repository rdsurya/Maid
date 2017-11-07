<?php
require "connect.php";

if (isset($_POST['customerid']) && isset($_POST['customername']) && isset($_POST['customerphonenumber'])
	&& isset($_POST['customerpostcode']) && isset($_POST['customerstate']) && isset($_POST['customeraddress']) 
   && isset($_POST['customeremail']) && isset($_POST['customerstatus']))
	{

$Id= $_POST['customerid'];
$Name= $_POST['customername'];
$PhoneNumber= $_POST['customerphonenumber'];
$Postcode= $_POST['customerpostcode'];
$State= $_POST['customerstate'];
$Address= $_POST['customeraddress'];
$Email= $_POST['customeremail'];
$Status= $_POST['customerstatus'];

$sql = "UPDATE customer SET customername = '$Name' , customerphonenumber = '$PhoneNumber' ,
		 customerpostcode = '$Postcode' , customerstate = '$State' , customeraddress = '$Address' ,
		 customeremail = '$Email'  , customerstatus = '$Status' WHERE customerid =$Id ";
		

$query= $conn->query($sql);

	}


?>
