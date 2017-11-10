<?php

//0$result = array();
 
require '../class/connect.php';
  $sql = "SELECT customerid, customername, customerphonenumber, customerpostcode, customerstate, customeraddress , customeremail , customerstatus FROM customer";
$rs = $conn->query($sql);

$items = array();
while($row = $rs->fetch_assoc())
{
	array_push($items, $row);
}
 
echo json_encode($items);




?>