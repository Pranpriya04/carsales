<?php
// เชื่อมต่อกับฐานข้อมูล
include './connnect.php';

// รับข้อมูลที่ส่งมาจาก form
$typeName = $_POST['type-name'];

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO typecar ( typeCarName) VALUES ('$typeName')";
if ($conn->query($sql) === TRUE) {
    // เพิ่มข้อมูลสำเร็จ ให้ redirect กลับไปที่หน้าเดิม
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
