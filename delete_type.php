<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carshop";
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่า typeCarID ที่ต้องการลบ
$typeCarID = $_GET['typeCarID'];

// ลบข้อมูลที่มี typeCarID ที่ระบุ
$sql = "DELETE FROM typecar WHERE typeCarID = '$typeCarID'";
if ($conn->query($sql) === TRUE) {
    // เมื่อลบข้อมูลสำเร็จ ให้ redirect กลับไปที่หน้าเดิม
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
