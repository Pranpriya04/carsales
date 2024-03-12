<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stlye_admin_sales.css">
</head>
<body>  
    
<div class="header">
    <div class="logo">
        <a href="home_admin.php"><h1 id="logo">FDPG CARS</h1></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#"><i class="fa-solid fa-house"></i>admin</a></li>
        </ul>
    </div>
</div>
<?php include './layouts/sidebar.php';?>

<div class="table_component" role="region" tabindex="0">
<table><br><br>
    <caption>ข้อมูลการขาย</caption>
    <thead>
        <tr>
            <th>รหัสการสั่งซื้อ</th>
            <th>รหัสรถ</th>
            <th>ประเภทชำระเงิน</th>
            <th>สมาชิก</th>
            <th>วันที่ซื้อขาย</th>
            <th>จำนวนเดือน</th>
            <th>ราคา</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
include './connnect.php';

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM sales 
LEFT JOIN users ON users.usersID = sales.usersID 
LEFT JOIN payment ON payment.paymentID = sales.paymentID
LEFT JOIN car ON car.carID = sales.carID";

$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    // วนลูปแสดงข้อมูลในตาราง
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["salesID"] . "</td>";
        echo "<td>" . $row["carName"] . "</td>";
        echo "<td>" . $row["paymentName"] . "</td>";
        echo "<td>" . $row["usersName"] . "</td>"; 
        echo "<td>" . $row["salesDay"] . "</td>";
        echo "<td>" . $row["month"] . "</td>";
        echo "<td>" . $row["periodPrice"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>ไม่พบข้อมูล</td></tr>";
};
?>
</tbody>
</table>
</div>
<!-- Logout confirmation modal -->
<div class="modal" id="logout-modal">
    <div class="modal-content">
        <h2>คุณต้องการออกจากระบบหรือไม่?</h2><br>
        <div class="dd">
        <button id="confirm-logout">ยืนยัน</button>
        <button id="cancel-logout">ยกเลิก</button>
        </div>
    </div>
</div>

<script>

    var logoutButton = document.getElementById("logout-btn");
    var modal = document.getElementById("logout-modal");
    var confirmButton = document.getElementById("confirm-logout");
    var cancelButton = document.getElementById("cancel-logout");
    logoutButton.onclick = function() {
        modal.style.display = "block";
    }
    confirmButton.onclick = function() {
        window.location.href = "logout.php";
    }
    cancelButton.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>