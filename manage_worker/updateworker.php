<?php

require "../class/connect.php";

$reply = new stdClass();
$reply->status=false;
$reply->msg="Invalid data";

if (isset($_POST['workersid']) && isset($_POST['workersname']) && isset($_POST['workersphonenumber']) && isset($_POST['workersalary']) && isset($_POST['workerstatus'])) {

    $Id = $_POST['workersid'];
    $Name = $_POST['workersname'];
    $PhoneNumber = $_POST['workersphonenumber'];
    $Salary = $_POST['workersalary'];
    $Status = $_POST['workerstatus'];


    $sql = "UPDATE workers SET workersname = '$Name' , workersphonenumber = '$PhoneNumber' ,
		 workersalary = '$Salary' ,  workerstatus = '$Status'  WHERE workersid =$Id ";


    $query = $conn->query($sql);
    
    if($query){
        $reply->status=true;
        $reply->msg="Worker information is updated.";
        $sql="Update booking set worker_name='$Name' where worker_id=$Id;";
        $conn->query($sql);
    }
    else{
        $reply->status=false;
        $reply->msg="Error: ".$conn->error();
    }
    
}

echo json_encode($reply);
$conn->close();

?>
