<?php
require '../../class/connect.php';

$reply = new stdClass();

$sqlComplete="Select customer_id, customer_name, count(booking_date) as total from booking where status='1' group by customer_id order by total desc limit 10;";

$resultComplete = mysqli_query($conn, $sqlComplete);

$arrID = array();
$arrName = array();
$arrData = array();

while($row = mysqli_fetch_assoc($resultComplete)){
    array_push($arrID, $row['customer_id']);
    array_push($arrName, $row['customer_name']);
    array_push($arrData, $row['total']);
}

$numRows = mysqli_num_rows($resultComplete);

$reply->arrName = $arrName;
$reply->arrID = $arrID;
$reply->arrData = $arrData;
$reply->totalRow = $numRows;


echo json_encode($reply);
mysqli_close($conn);
?>
