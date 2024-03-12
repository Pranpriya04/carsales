<?php
session_start();
include("../connnect.php");

if (isset($_REQUEST['ac'])) {
    switch ($_REQUEST['ac']) {

        case "edit":
            $sql = $conn->query("UPDATE users SET usersName=' ".$_REQUEST['usersName']." ',email=' ".$_REQUEST['email']." ',tel = ' ".$_REQUEST['tel']." ' WHERE usersID='".$_REQUEST['usersID']."'");
            if ($sql) {
                $data = array("status" => true, "message" => "ยินดีเข้าสู่ระบบ!");
               
                // 1=>เป็น admin
                // 2=>เป็นuser
            } else {
                $data = array("status" => false, "message" => "ไม่พบผู้ใช้งาน!");
            }

            echo json_encode($data);
            break;

    }
}
