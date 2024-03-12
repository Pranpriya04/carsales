<?php
session_start();
include("../connnect.php");

if (isset($_REQUEST['ac'])) {
    switch ($_REQUEST['ac']) {

        case "payCash":
            $carPrice = $conn->query("SELECT price FROM car WHERE carID = '" . $_REQUEST['carID'] . "'")->fetch_object()->price;
            $sql = $conn->query("INSERT INTO sales (usersID,carID,paymentID,salesDay,payDay,month,periodPrice) 
            VALUES ('" . $_REQUEST['usersID'] . "','" . $_REQUEST['carID'] . "',1,NOW(),NOW(),0,'" . $carPrice . "') ");
            if ($sql) {
                $data = array("status" => true, "message" => "เพิ่มการชำระเงินเข้าระบบ!");
            } else {
                $data = array("status" => false, "message" => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!");
            }

            echo json_encode($data);
            break;
        case "payLoan":
            $carPrice = $conn->query("SELECT price FROM car WHERE carID = '" . $_REQUEST['carID'] . "'")->fetch_object()->price;
            $sql = $conn->query("INSERT INTO sales (usersID,carID,paymentID,salesDay,payDay,month,periodPrice) 
            VALUES ('" . $_REQUEST['usersID'] . "','" . $_REQUEST['carID'] . "',2,NOW(),NOW(),'" . $_REQUEST['month'] . "','" . $_REQUEST['period'] . "') ");
            if ($sql) {
                $data = array("status" => true, "message" => "เพิ่มการชำระเงินเข้าระบบ!");
            } else {
                $data = array("status" => false, "message" => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!");
            }

            echo json_encode($data);
            break;
    }
}
