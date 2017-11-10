<?php
require "../class/connect.php";

$name = "workersname";
$phonenumber = "workersphonenumber";
$salary = "workersalary";
$status = "workerstatus";

 

if( isset($_POST['workersname']) && !empty($_POST['workersname'])  && isset($_POST['workersphonenumber']) 
		&& !empty($_POST['workersphonenumber']) && isset($_POST['workersalary']) && !empty($_POST['workersalary'])
        && isset($_POST['workerstatus']) && !empty($_POST['workerstatus'])) {
			

$name = $_POST['workersname'];
$phonenumber = $_POST['workersphonenumber'];
$salary = $_POST['workersalary'];
$status = $_POST['workerstatus'];



$sql = "INSERT INTO workers (workersname, workersphonenumber, workersalary , workerstatus)
		VALUES ( '$name', '$phonenumber', '$salary' , '$status')"; 
		
		
		
mysqli_query($conn, $sql)
or die ("Error inserting data". mysqli_error($conn));


}
?>
