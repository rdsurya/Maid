<?php
require '../../class/connect.php';
$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invalid input";

$chg = number_format($_POST['rate'], 2);



$query="Update cs_setting set val='$chg' where param='charge_rate'";

if(mysqli_query($conn, $query)){
    
    $reply->valid=true;
    $reply->val=$chg;
    $reply->msg="Success updating charge rate.";
}
else{
    $reply->valid=false;
    $reply->msg=  mysqli_error($conn);
}


mysqli_close($conn);

echo json_encode($reply);
?>

