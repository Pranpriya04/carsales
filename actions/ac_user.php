<?php
session_start();
include("../connnect.php");

if (isset($_REQUEST['ac'])) {
    switch ($_REQUEST['ac']) {

        case "edit":
            $sql = $conn->query("UPDATE users SET usersName=' " . $_REQUEST['usersName'] . " ',email=' " . $_REQUEST['email'] . " ',tel = ' " . $_REQUEST['tel'] . " ' WHERE usersID='" . $_REQUEST['usersID'] . "'");
            if ($sql) {
                $data = array("status" => true, "message" => "แก้ไขข้อมูลสำเร็จ!");

                $sql = $conn->query("SELECT * FROM users WHERE usersID='" . $_REQUEST['usersID'] . "' ");
                $user = $sql->fetch_object();
                $_SESSION['usersName'] = $user->usersName;
                $_SESSION['email'] = $user->email;
                $_SESSION['tel'] = $user->tel;
                $_SESSION['adress'] = $user->adress;
                $_SESSION['status'] = $user->status;
                $_SESSION['usersID'] = $user->usersID;
                // 1=>เป็น admin

                // 2=>เป็นuser
            } else {
                $data = array("status" => false, "message" => "เกิดข้อผิดพลาด!");
            }

            echo json_encode($data);
            break;
    }
}
