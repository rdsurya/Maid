<?php

require '../../class/connect.php';

$reply = new stdClass();
$reply->valid = false;
$reply->msg = "Invalid input!";

$b_date = isset($_POST['b_date']) ? $_POST['b_date'] : "";
$b_start = isset($_POST['b_start']) ? $_POST['b_start'] : "";
$b_end = isset($_POST['b_end']) ? $_POST['b_end'] : "";
$b_duration = isset($_POST['b_duration']) ? $_POST['b_duration'] : 0;
$b_customerId = isset($_POST['b_customerId']) ? $_POST['b_customerId'] : null;
$b_customerName = isset($_POST['b_customerName']) ? mysqli_real_escape_string($conn, $_POST['b_customerName']) : "";
$b_workerId = isset($_POST['b_workerId']) ? $_POST['b_workerId'] : null;
$b_workerName = isset($_POST['b_workerName']) ? mysqli_real_escape_string($conn, $_POST['b_workerName']) : "";
$b_status = isset($_POST['b_status']) ? $_POST['b_status'] : "0";
$b_comment = isset($_POST['b_comment']) ? mysqli_real_escape_string($conn, $_POST['b_comment']) : "";
$b_price = isset($_POST['b_price']) && !empty($_POST['b_price'])? $_POST['b_price'] : 0.00; 
$b_id = isset($_POST['b_id']) ? $_POST['b_id'] : 0; 

//check whether the worker is free on the selected date and time

$startTime = $b_date . " " . $b_start . ":00";
$endTime = $b_date . " " . $b_end . ":00";

$sql = "select w.workersid "
        . "from workers w "
        . "join booking b on b.worker_id=w.workersid "
        . "where w.workersid='$b_workerId' AND b.status='0' AND `Id`!=$b_id AND ( (b.start_time between '$startTime' AND '$endTime') OR (b.end_time between '$startTime' AND '$endTime') "
        . "OR ('$startTime' between b.start_time and b.end_time) OR ('$endTime' between b.start_time and b.end_time) );";

$freeWorker = mysqli_query($conn, $sql);
if (mysqli_num_rows($freeWorker) > 0) {
    $reply->valid = false;
    $reply->msg = "Our worker $b_workerName is not available on $b_date from $b_start to $b_end. Please choose other worker or select different time.";
} else {
    $sql = "UPDATE booking set booking_date='$b_date', start_time='$startTime', end_time='$endTime', duration=$b_duration, customer_id=$b_customerId, customer_name='$b_customerName', "
            . "worker_id=$b_workerId, worker_name='$b_workerName', status='$b_status', comment='$b_comment', price=$b_price where `Id`=1;";
    if (mysqli_query($conn, $sql)) {
        $reply->valid=true;
        $reply->msg="Reservation is updated. \nOur worker $b_workerName is successfully booked for our customer $b_customerName";
    }
    else{
        $reply->valid = false;
        $reply->msg="Error: ".mysqli_error($conn);
    }
}




echo json_encode($reply);
mysqli_close($conn);
?>

