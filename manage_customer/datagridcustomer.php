<?php

//0$result = array();
 
require '../class/connect.php';
//  $sql = "SELECT customerid, customername, customerphonenumber, customerpostcode, customerstate, customeraddress , customeremail , customerstatus FROM customer";
//$rs = $conn->query($sql);
//
//$items = array();
//while($row = $rs->fetch_assoc())
//{
//	array_push($items, $row);
//}
// 
//echo json_encode($items);

    $searchKey = isset($_POST['key'])? mysqli_real_escape_string($conn,$_POST['key']):"";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

    $whereSql="";
    //echo 'searchKey :'.$searchKey;
    if(strcmp(trim($searchKey), "") != 0){
        $whereSql = " WHERE customername like '%$searchKey%' OR customerphonenumber like '%$searchKey%' OR customerpostcode like '%$searchKey%' "
                . "OR customerstate like '%$searchKey%' OR customeraddress like '%$searchKey%' OR customeremail like '%$searchKey%' OR customerstatus like '%$searchKey%' ";
    }

    $offset = ($page-1)*$rows;

    $result = array();

    $rs = $conn->query("select count(*) from customer " . $whereSql);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];

    $rs = $conn->query("SELECT customerid, customername, customerphonenumber, customerpostcode, customerstate, customeraddress , customeremail , customerstatus FROM customer ".$whereSql . " limit $offset,$rows");

    $items = array();
    while($row = mysqli_fetch_object($rs)){
        array_push($items, $row);
    }
    $result["rows"] = $items;

    echo json_encode($result);



?>