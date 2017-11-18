<?php
require '../../class/connect.php';
$sql="Select count(*) as total from workers;";
$result = mysqli_query($conn, $sql);

if($result){
    $obj = mysqli_fetch_object($result);
    
    echo json_encode($obj);
}
mysqli_close($conn);
?>

