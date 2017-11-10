<?php
require "../class/connect.php";

if (isset($_POST['workersid']) && isset($_POST['workersname']) && isset($_POST['workersphonenumber'])
	&& isset($_POST['workersalary']) && isset($_POST['workerstatus']))
	{

$Id= $_POST['workersid'];
$Name= $_POST['workersname'];
$PhoneNumber= $_POST['workersphonenumber'];
$Salary= $_POST['workersalary'];
$Status= $_POST['workerstatus'];


$sql = "UPDATE workers SET workersname = '$Name' , workersphonenumber = '$PhoneNumber' ,
		 workersalary = '$Salary' ,  workerstatus = '$Status'  WHERE workersid =$Id ";
		

$query= $conn->query($sql);

	}


?>
