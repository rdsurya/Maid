<?php

require '../../class/connect.php';

$sql="Select workersid as value, workersname as name from workers;";

$result = $conn->query($sql);

if($result->num_rows >0){
    $item = array();
    while($row = $result->fetch_object()){
        array_push($item, $row);
    }
      
    echo json_encode($item);
}
$conn->close();

?>
