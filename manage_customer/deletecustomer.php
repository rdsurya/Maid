<?php

require "../class/connect.php";
$reply = new stdClass();
$reply->status = false;
$reply->msg = "Incomplete data";

if (isset($_GET['customerid'])) {

    $Id = $_GET['customerid'];
    $sql = "DELETE FROM customer WHERE customerid='$Id'";
    if ($conn->query($sql) === TRUE) {
        $reply->status = true;
        
    } else {
        $reply->status = false;
        $reply->msg = "Error: " . $conn->error;
    }
}
$conn->close();
echo json_encode($reply);
?>