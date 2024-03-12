<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>
<?php
// เชื่อมต่อฐานข้อมูล และดึงข้อมูล
// เช่น $data = mysqli_fetch_assoc($result);
$data = [
    "รหัสแบรนด์รถ" => "001",
    "ชื่อแบรนด์รถ" => "รถเก๋ง",
    // เพิ่มข้อมูลอื่นๆ ตามความต้องการ
];

// นำข้อมูลมาแสดงใน div
echo "<div class='edit-modal'>";
foreach ($data as $key => $value) {
    echo "<div class='info-row'>";
    echo "<label>$key: <input type='text' value='$value'></label>";
    echo "</div>";
}
echo "<button class='save-button'>บันทึก</button>";
echo "<a href='brand_admin.php'><button class='can-button'>ยกเลิก</button></a>";
echo "</div>";
?>
</body>
</html>