<?php
session_start();
include("../connnect.php");

if (isset($_REQUEST['ac'])) {
    switch ($_REQUEST['ac']) {

        case "login":
            $sql = $conn->query("SELECT * FROM users WHERE email = '" . $_REQUEST['email'] . "' AND password = '" . $_REQUEST['password'] . "'  ");
            $num = $sql->num_rows;
            if ($num > 0) {
                $data = array("status" => true, "message" => "ยินดีเข้าสู่ระบบ!");
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
                $data = array("status" => false, "message" => "ไม่พบผู้ใช้งาน!");
            }

            echo json_encode($data);
            break;

        case "reg":
            $sql = $conn->query("SELECT * FROM users WHERE email = '" . $_REQUEST['email'] . "'");
            $num = $sql->num_rows;
            if ($num > 0) {
                $data = array("status" => false, "message" => "มี Email นี้ในระบบแล้ว!");
            } else {
                if ($_REQUEST['password'] != $_REQUEST['replyPassword']) {
                    $data = array("status" => false, "message" => "รหัสผ่านไม่ตรงกัน!");
                } else {
                    $sql = $conn->query("INSERT INTO users (usersName,email,tel,credit,adress,password,status) 
                    VALUES ('" . $_REQUEST['usersName'] . "','" . $_REQUEST['email'] . "','" . $_REQUEST['tel'] . "','" . $_REQUEST['credit'] . "','" . $_REQUEST['address'] . "','" . $_REQUEST['password'] . "',2)");

                    if ($sql) {
                        $data = array("status" => true, "message" => "สมัครสมาชิกเข้าสู่ระบบสำเร็จ!");
                    } else {
                        $data = array("status" => false, "message" => "เกิดข้อผิดพลาดโปรลองอีกครั้ง!");
                    }
                }
            }

            echo json_encode($data);
            break;
        case "forget":
            $sql = $conn->query("SELECT * FROM users WHERE email = '" . $_REQUEST['email'] . "'");
            $num = $sql->num_rows;
            if ($num > 0) {
                $data = array("status" => true, "message" => "1");
            } else {
                $data = array("status" => false, "message" => "ไม่พบ Email ในระบบ!");
            }

            echo json_encode($data);
            break;

        case "newPass":
            if ($_REQUEST['password'] != $_REQUEST['newPassword']) {
                $data = array("status" => false, "message" => "รหัสผ่านไม่ตรงกัน!");
            } else {
                $sql = $conn->query("UPDATE users SET password = '" . $_REQUEST['newPassword'] . "' WHERE usersID = '" . $_REQUEST['usersID'] . "'");

                if ($sql) {
                    $data = array("status" => true, "message" => "แก้ไขรหัสผ่านสำเร็จ!");
                } else {
                    $data = array("status" => false, "message" => "เกิดข้อผิดพลาดโปรลองอีกครั้ง!");
                }
            }

            echo json_encode($data);
            break;
    }
}
