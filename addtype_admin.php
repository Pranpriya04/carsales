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

// รับข้อมูลที่ส่งมาจาก form
$typeId = $_POST['type-id'];
$typeName = $_POST['type-name'];

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO typecar (typeCarID, typeCarName) VALUES ('$typeId', '$typeName')";
if ($conn->query($sql) === TRUE) {
    // เพิ่มข้อมูลสำเร็จ ให้ redirect กลับไปที่หน้าเดิม
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
