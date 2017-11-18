<?php
require '../../class/connect.php';

$reply = new stdClass();

$sqlComplete="Select count(*) from booking where status='1';";
$sqlNew="Select count(*) from booking where status='0';";
$sqlCancel="Select count(*) from booking where status='2';";
$sqlHours="Select sum(duration) from booking where status='1';";

$resultComplete = mysqli_query($conn, $sqlComplete);
$resultNew = mysqli_query($conn, $sqlNew);
$resultCancel = mysqli_query($conn, $sqlCancel);
$resultHours = mysqli_query($conn, $sqlHours);

$objComplete = mysqli_fetch_array($resultComplete);
$objNew = mysqli_fetch_array($resultNew);
$objCancel = mysqli_fetch_array($resultCancel);
$objHour = mysqli_fetch_array($resultHours);

$reply->complete = $objComplete[0];
$reply->new = $objNew[0];
$reply->cancel = $objCancel[0];
$reply->hours = $objHour[0];

echo json_encode($reply);
?>
