<?php

require "../class/connect.php";

$name = "workersname";
$phonenumber = "workersphonenumber";
$salary = "workersalary";
$status = "workerstatus";

$reply = new stdClass();
$reply->status = false;
$reply->msg = "Incomplete data";



if (isset($_POST['workersname']) && !empty($_POST['workersname']) && isset($_POST['workersphonenumber']) && !empty($_POST['workersphonenumber']) && isset($_POST['workerstatus']) && !empty($_POST['workerstatus']) ) {


    $name = $_POST['workersname'];
    $phonenumber = $_POST['workersphonenumber'];
    $salary = isset($_POST['workersalary'])?$_POST['workersalary']: 0;
    $status = $_POST['workerstatus'];
    $username = isset($_POST['username'])?$_POST['username']:"-";
    $type = isset($_POST['type'])?$_POST['type']:"Worker";

    // check whether username is available or not
    $result = mysqli_query($conn, "SELECT username FROM `login` WHERE `username` ='$username' ");
    if (!$result) {
        die(mysql_error());
    }
    if (mysqli_num_rows($result) > 0 && strcasecmp($type, "admin") == 0) {
        $reply->status = false;
        $reply->msg = "The username $username is already used. Please enter other username.";
    } else {
        // no data matched
        $sql = "INSERT INTO workers (workersname, workersphonenumber, workersalary , workerstatus)
                    VALUES ( '$name', '$phonenumber', '$salary' , '$status')";



        if (mysqli_query($conn, $sql)) {
            $reply->status = true;
            $reply->msg = "Success adding new worker.";
            if (strcasecmp($type, "admin") == 0) {
                $last_id = mysqli_insert_id($conn);
                $sql = "Insert into login(id, password, type, username) "
                        . "Values('$last_id', '$username', '$type', '$username')";

                if (mysqli_query($conn, $sql)) {
                    $reply->status = true;
                    $reply->msg = "Success adding new worker(Admin).";
                } else {
                    $reply->status = false;
                    $reply->msg = "Something is wrong with the query into table login. " . mysqli_error($conn);
                }
            }
        } else {
            $reply->status = false;
            $reply->msg = "Something is wrong with the query into table worker. " . mysqli_error($conn) . " \n" . $sql;
        }
    }
}
mysqli_close($conn);

echo json_encode($reply);
?>
