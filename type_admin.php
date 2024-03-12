<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin_type.css">
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
<div class="sidebar">
  <a href="type_admin.php">ข้อมูลประเภท</a>
  <a href="brand_admin.php">ข้อมูลแบรนด์รถ</a>
  <a href="cars_admin.php">ข้อมูลรถ</a>
  <a href="sales_admin.php">ข้อมูลการขาย</a>
  <a href="member_admin.php">ข้อมูลสมาชิก</a><br><br>
  <a href="#" id="logout-btn">Logout</a>
</div>

<div class="table_component" role="region" tabindex="0">
<table><br><br>
    <caption>ข้อมูลประเภทรถ</caption>
    <div class="add-type">
    <h5>เพิ่มข้อมูลประเภทรถ</h5>
    <form action="addtype_admin.php" method="post">
        <label for="type-id">รหัสประเภทรถ:</label>
        <input type="text" id="type-id" name="type-id">
        <label for="type-name">ชื่อประเภทรถ:</label>
        <input type="text" id="type-name" name="type-name">
        <!-- ปุ่ม submit สำหรับส่งข้อมูล -->
        <button type="submit">เพิ่มรายการ</button>
    </form>
</div>
    <thead>
        <tr>
            <th>รหัสประเภทรถ</th>
            <th>ชื่อประเภทรถ</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
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

        // คิวรี่ฐานข้อมูลเพื่อดึงข้อมูลประเภทรถทั้งหมด
        $sql = "SELECT * FROM typecar";
        $result = $conn->query($sql);

        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($result->num_rows > 0) {
            // วนลูปแสดงข้อมูลในตาราง
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["typeCarID"] . "</td>";
                echo "<td>" . $row["typeCarName"] . "</td>";
                echo "<td class='butt'>";
                echo "<a href='./edittype_admin.php?id=" . $row["typeCarID"] . "' class='edit-button'>แก้ไข</a>";
                echo "<a href='delete_type.php?typeCarID=" . $row["typeCarID"] . "' class='delete-button'>ลบ</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<script>
function addType() {
    var typeId = document.getElementById("type-id").value;
    var typeName = document.getElementById("type-name").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "addtype_admin.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // สร้างตัวแปร response จากการเพิ่มข้อมูล
            var response = xhr.responseText;
            // แสดงข้อมูลใหม่ที่เพิ่มลงในตารางโดยไม่ต้องรีเฟรชหน้า
            document.getElementById("type-table").innerHTML += response;
        }
    };
    // ส่งข้อมูลไปยังไฟล์ PHP
    xhr.send("type-id=" + typeId + "&type-name=" + typeName);
}
</script>

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
        window.location.href = "index.php";
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
