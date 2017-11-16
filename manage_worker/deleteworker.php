<?php

require "../class/connect.php";

$reply = new stdClass();
$reply->status = false;
$reply->msg = "Incomplete data";

if (isset($_POST['workersid'])) {

    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $Id = $_POST['workersid'];
    
//    check first whether any admin left. If no admin left, abort process
    if(strcasecmp($type, "admin") == 0){
        $sql="Select username from login where type='admin';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) < 3){
            $reply->status = false;
            $reply->msg = "You cannot delete this user because you will be left with no admin.";
            
            echo json_encode($reply);
            mysqli_close($conn);
            return false;
           
        }
    }
    $sql = "DELETE FROM workers WHERE workersid='$Id'";
    if ($conn->query($sql) === true) {
        $reply->status = true;
        if (strcasecmp($type, "admin") == 0) {
            $sql = "Delete from login where type='admin' and id='$Id';";
            if ($conn->query($sql)) {
                $reply->status = true;
            } else {
                $reply->status = false;
                $reply->msg = "Error: " . $conn->error;
            }
        }
    } else {
        $reply->status = false;
        $reply->msg = "Error: " . $conn->error;
    }
}

$conn->close();

echo json_encode($reply);
?>