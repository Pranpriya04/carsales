<?php
session_start();
include("../connnect.php");

if (isset($_REQUEST['ac'])) {
    switch ($_REQUEST['ac']) {

        case "add":

            $sql = $conn->query("INSERT INTO car (carName, brandID, typeCarID, produceYear, color, distance, price, tankID, engineID, moreInfo, picture, vehicleID, statusID) VALUES ('" . $_REQUEST['carName'] . "', '" . $_REQUEST['brand'] . "', '" . $_REQUEST['carType'] . "', '" . $_REQUEST['year'] . "', '" . $_REQUEST['color'] . "', '" . $_REQUEST['distance'] . "', '" . $_REQUEST['price'] . "', '" . $_REQUEST['tankID'] . "', '" . $_REQUEST['engine'] . "', '" . $_REQUEST['info'] . "', '" . $_FILES['carImage']['name'] . "','" . $_REQUEST['vehicleID'] . "', '" . $_REQUEST['status'] . "')");

            // Check for errors
            if ($sql) {
                echo "<script>window.location.replace('../index.php?p=cars_admin')</script>";
            } else {
                echo "<script>window.location.replace('../index.php?p=cars_admin')</script>";
            }
            break;
        case "edit":
            $sql = $conn->query("UPDATE car SET carName='" . $_REQUEST['carName'] . "', brandID='" . $_REQUEST['brand'] . "', typeCarID='" . $_REQUEST['carType'] . "', produceYear='" . $_REQUEST['year'] . "', color='" . $_REQUEST['color'] . "',distance='" . $_REQUEST['distance'] . "',price='" . $_REQUEST['price'] . "',moreInfo='" . $_REQUEST['info'] . "',picture='" . $_FILES['carImage']['name'] . "',statusID='" . $_REQUEST['status'] . "' WHERE carID = '" . $_REQUEST['carID'] . "' ");


            if ($sql) {
                echo "<script>window.location.replace('../index.php?p=cars_admin')</script>";
            } else {
                echo "<script>window.location.replace('../index.php?p=cars_admin')</script>";
            }
            break;
        case "del":
            $sql = $conn->query("DELETE FROM car WHERE carID='" . $_REQUEST['id'] . "'");


            if ($sql) {
                echo "<script>window.location.replace('../index.php?p=cars_admin')</script>";
            } else {
                echo "<script>window.location.replace('../index.php?p=cars_admin')</script>";
            }
            break;
    }
}
