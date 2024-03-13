<?php
session_start();
include("../connnect.php");

if (isset($_REQUEST['ac'])) {
    switch ($_REQUEST['ac']) {

        case "edit":


            // if ($_FILES['carImage']['name']) {
            //     copy($_FILES['carImage']['tmp_name'], "../pictures/" . $_FILES['carImage']['name']);
            // }

            $uploadDirectory = "/pictures/";
            $uploadedFile = $_FILES['carImage'];

            // Check if the file was uploaded without errors
            if ($uploadedFile['error'] === UPLOAD_ERR_OK) {

                // Construct the destination path
                $destinationPath = $uploadDirectory . basename($uploadedFile['name']);

                // Move the uploaded file to the destination directory
                if (move_uploaded_file($uploadedFile['tmp_name'], $destinationPath)) {
                    echo "File successfully uploaded to: " . $destinationPath;
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo "Error uploading file. Error code: " . $uploadedFile['error'];
            }

            $sql = $conn->query("UPDATE car SET carName='" . $_REQUEST['carName'] . "', brandID='" . $_REQUEST['brand'] . "', typeCarID='" . $_REQUEST['carType'] . "', produceYear='" . $_REQUEST['year'] . "', color='" . $_REQUEST['color'] . "',distance='" . $_REQUEST['distance'] . "',price='" . $_REQUEST['price'] . "',moreInfo='" . $_REQUEST['info'] . "',picture='" . $_FILES['carImage']['name'] . "',statusID='" . $_REQUEST['status'] . "' ");

            if ($sql) {
                $data = array("status" => true, "message" => "แก้ไขข้อมูลรถสำเร็จ!");
            } else {
                $data = array("status" => false, "message" => "เกิดข้อผิดพลาด!");
            }

            echo json_encode($data);
            break;
    }
}
