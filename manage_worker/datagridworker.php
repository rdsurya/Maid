<?php

//0$result = array();
 
require '../class/connect.php';

$searchKey = isset($_POST['key'])? mysqli_real_escape_string($conn,$_POST['key']):"";
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$whereSql="";
//echo 'searchKey :'.$searchKey;
if(strcmp(trim($searchKey), "") != 0){
    $whereSql = " WHERE workersname like '%$searchKey%' OR workersphonenumber like '%$searchKey%' OR workersalary like '%$searchKey%' OR workerstatus like '%$searchKey%' ";
}

//echo 'Where : '.$whereSql;
//$sql = "SELECT workersid, workersname, workersphonenumber, workersalary , workerstatus FROM workers ".$whereSql;
//$rs = $conn->query($sql);

$offset = ($page-1)*$rows;
 
$result = array();

$rs = $conn->query("select count(*) from workers " . $whereSql);
$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];
 
$rs = $conn->query("SELECT workersid, ifnull(username, '-') AS username, workersname, workersphonenumber, workersalary , ifnull(type, 'worker') AS type, workerstatus FROM workers "
        . "LEFT JOIN login on workersid=id and type in('Admin', 'Worker') ".$whereSql . " limit $offset,$rows");
 
$items = array();
while($row = mysqli_fetch_object($rs)){
    array_push($items, $row);
}
$result["rows"] = $items;
 
echo json_encode($result);

//$items = array();
//while($row = $rs->fetch_assoc())
//{
//	array_push($items, $row);
//}
// 
//echo json_encode($items);


?>