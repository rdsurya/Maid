<?php
require '../../class/connect.php';
$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invalid input";

$query="Select val from cs_setting where param='charge_rate' and status='0';";
$result = mysqli_query($conn, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $reply->valid=true;
    $reply->val= $row['val'];
    $reply->msg="Success getting current rate";
}
else{
    $reply->valid=false;
    $reply->msg=  mysqli_error($conn);
}


mysqli_close($conn);

echo json_encode($reply);
?>

