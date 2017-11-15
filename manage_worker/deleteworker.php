<?php

require "../class/connect.php";

$reply = new stdClass();
$reply->status = false;
$reply->msg = "Incomplete data";

if (isset($_POST['workersid'])) {

    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $Id = $_POST['workersid'];
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