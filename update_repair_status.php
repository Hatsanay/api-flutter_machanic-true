<?php

require "connect.php";

$action = $_POST['action'];

if ($action == 'update_repair_status') {
    $repair_id = $_POST['repair_id'];
    $repair_status = $_POST['repair_status'];
    
    $update_query = "UPDATE repairreq SET repairreqstatus = '$repair_status' WHERE repairreqid = '$repair_id'";
    $update_result = mysqli_query($con, $update_query);
    
    if ($update_result) {
        $response = array(
            'status' => 'success',
        );
    } else {
        $response = array(
            'status' => 'error',
        );
    }
    
    echo json_encode($response);
}

?>
