<?php
    require "connect.php";

    // $repairreqmemid = $_POST['memid'];
        $mechanicid = $_POST['mechanicid'];

        // $repairreqdatetime = date('Y-m-d H:i:s');


// $sql = "SELECT repairreq.*,members.* ,garage.garageid,garage.garagename,garage.garagetel,garage.garagelattitude,garage.garagelonggitude,garage.garageprofile,garage.garagedeegree,garage.garageimgid,garage.garageonoff,garage.ownerid,garage.memid,CONCAT(garage.garagehousenum,'หมู่',garage.garagegroup, ' ถนน',garage.garageroad,' ซอย',garage.garagealley,' ตำบล',districts.name_th,' อำเภอ',amphures.name_th,' จังหวัด',provinces.name_th,garagepostcode) AS address FROM repairreq INNER JOIN garage ON repairreqgarageid = garage.garageid INNER JOIN members ON repairreqmemid = members.memid INNER JOIN districts ON garage.garagedistrict = districts.id INNER JOIN amphures ON garage.garagearea = amphures.id INNER JOIN provinces ON garage.garageprovince = provinces.id WHERE repairreq.repairreqmemid = 5 ORDER BY repairreq.repairreqid DESC";
// $sql = "SELECT repairreq.*,members.* ,garage.garageid,garage.garagename,garage.garagetel,garage.garagelattitude,garage.garagelonggitude,garage.garageprofile,garage.garagedeegree,garage.garageimgid,garage.garageonoff,garage.ownerid,garage.memid,CONCAT(garage.garagehousenum,'หมู่',garage.garagegroup, ' ถนน',garage.garageroad,' ซอย',garage.garagealley,' ตำบล',districts.name_th,' อำเภอ',amphures.name_th,' จังหวัด',provinces.name_th,garagepostcode) AS address FROM repairreq INNER JOIN garage ON repairreqgarageid = garage.garageid INNER JOIN members ON repairreqmemid = members.memid INNER JOIN districts ON garage.garagedistrict = districts.id INNER JOIN amphures ON garage.garagearea = amphures.id INNER JOIN provinces ON garage.garageprovince = provinces.id WHERE repairreq.repairreqmemid = $repairreqmemid ORDER BY repairreq.repairreqid DESC";
// $sql = "SELECT * FROM repairreq WHERE repairreqmemid = $repairreqmemid ORDER BY repairreqid DESC";
$sql = "SELECT * FROM repairreq WHERE repairreqmacid = $mechanicid AND repairreqstatus <= 4 GROUP BY repairreqdatetime DESC";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $garage = array();
    while($row = mysqli_fetch_assoc($result)) {
        $garage[] = array(
            "repairreqid" => $row["repairreqid"],
            "repairreqfullname" => $row["repairreqfullname"],
            "repairname" => $row["repairname"],
            "repairreqtel" => $row["repairreqtel"],
            "repairreqcardetial" => $row["repairreqcardetial"],
            "repairreqspecial" => $row["repairreqspecial"],
            "repairreqlattitude" => $row["repairreqlattitude"],
            "repairreqlonggitude" => $row["repairreqlonggitude"],
            "repairreqdatetime" => $row["repairreqdatetime"],
            "repairreqmacid" => $row["repairreqmacid"],
            "repairreqmemid" => $row["repairreqmemid"],
            "repairreqstatus" => $row["repairreqstatus"],
            "repairreqproblem" => $row["repairreqproblem"],
            // "garagename" => $row["garagename"],
            // "garagetel" => $row["garagetel"],
            // "address" => $row["address"],
            // "garagename" => $row["garagename"],


        );
    }
    echo json_encode($garage);
} else {
    echo "ยังไม่เคยแจ้งซ่อม";
}

mysqli_close($con);



    // if ($_POST['action'] == 'get_repairs') {
    //     $garageid = $_POST['garageid'];
    //     $sql = "SELECT * FROM repairreq WHERE repairreqgarageid = $garageid";
    //     $result = mysqli_query($con, $sql);

    //     $repairs = array();
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $repairs[] = $row;
    //     }

    //     echo json_encode($repairs);
    // }

    // mysqli_close($con);
    
?>