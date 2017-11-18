<?php

require '../../class/connect.php';

$reply = new stdClass();
$reply->valid = false;
$reply->msg = "Invalid input!";

$b_id = isset($_POST['b_id']) ? $_POST['b_id'] : 0;


$sql = "Delete from booking where `ID`=$b_id ;";
if (mysqli_query($conn, $sql)) {
    $reply->valid = true;
    $reply->msg = "Booking no $b_id is deleted.";
} else {
    $reply->valid = false;
    $reply->msg = "Error: " . mysqli_error($conn);
}





echo json_encode($reply);
mysqli_close($conn);
?>

