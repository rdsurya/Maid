<?php

session_start();
require '../../class/connect.php';
require '../../class/User.php';

$userID = isset($_SESSION[User::$keyUserName]) ? $_SESSION[User::$keyUserName] : "";
$oldPwd = isset($_POST['old']) ? mysqli_real_escape_string($conn, $_POST['old']) : "";
$newPwd = isset($_POST['p1']) ? mysqli_real_escape_string($conn, $_POST['p1']) : "";

$reply = new stdClass();
$reply->valid = false;
$reply->msg = "Invalid input";

$sql = "Select password from login where username='$userID';";


if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_assoc($result);
    $oriPwd = $row['password'];

    if (strcmp($oldPwd, $oriPwd) == 0) {
        $sql = "Update login set password='$newPwd' where username='$userID'";
        if (mysqli_query($conn, $sql)) {
            $reply->valid = true;
            $reply->msg = "Password has been changed. Please login again.";
        } else {
            $reply->valid = false;
            $reply->msg = mysqli_error($conn);
        }
    } else {
        $reply->valid = false;
        $reply->msg = "Your old password is wrong.";
    }
} else {
    $reply->valid = false;
    $reply->msg = mysqli_error($conn);
}




echo json_encode($reply);
mysqli_close($conn);
?>