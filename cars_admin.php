<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stlye_admin_car.css">
</head>

<body>

    <?php

    include("./layouts/header_admin.php");

    ?>
    <?php include './layouts/sidebar.php'; ?>
    <center>
        <button class="add" id="add-car"><a href="incars_admin.php">เพิ่มข้อมูลรถ</a></button></div>
    </center>
    <?php

    include("./connnect.php");
    // คิวรี่ข้อมูลจากตาราง cars และ status
    $sql = "SELECT car.*, status.statusName 
        FROM car 
        INNER JOIN status ON car.statusID = status.statusID";
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if ($result->num_rows > 0) {
        // วนลูปแสดงข้อมูลในตาราง
        while ($row = $result->fetch_assoc()) {
            echo "<div class='car-info'>";
            echo "<div class='car-image'>";
            echo "<img src='./pictures/" . $row["picture"] . "' alt='Car Image'>";
            echo "</div>";
            echo "<div class='car-details'>";
            echo "<p><strong>รหัสรถ:</strong> " . $row["carID"] . "</p>";
            echo "<p><strong>ชื่อรถ:</strong> " . $row["carName"] . "</p>";
            // คิวรี่ข้อมูลจากตาราง brand เพื่อหาชื่อแบรนด์
            $brandID = $row["brandID"];
            $brandSql = "SELECT brandName FROM brand WHERE brandID = '$brandID'";
            $brandResult = $conn->query($brandSql);
            if ($brandResult->num_rows > 0) {
                $brandRow = $brandResult->fetch_assoc();
                echo "<p><strong>ชื่อแบรนด์:</strong> " . $brandRow["brandName"] . "</p>";
            }
            // คิวรี่ข้อมูลจากตาราง typecar เพื่อหาชื่อประเภทรถ
            $typeCarID = $row["typeCarID"];
            $typeCarSql = "SELECT typeCarName FROM typecar WHERE typeCarID = '$typeCarID'";
            $typeCarResult = $conn->query($typeCarSql);
            if ($typeCarResult->num_rows > 0) {
                $typeCarRow = $typeCarResult->fetch_assoc();
                echo "<p><strong>ประเภทรถ:</strong> " . $typeCarRow["typeCarName"] . "</p>";
            }
            echo "<p><strong>ปีผลิต:</strong> " . $row["produceYear"] . "</p>";
            echo "<p><strong>สีรถ:</strong> " . $row["color"] . "</p>";
            echo "<p><strong>ระยะทาง:</strong> " . number_format($row["distance"]) . " กิโลเมตร</p>";
            echo "<p><strong>ราคา:</strong> " . number_format($row["price"]) . " บาท</p>";
            echo "<p><strong>รายละเอียดเพิ่มเติม:</strong> " . $row["moreInfo"] . "</p>";
            echo "<p><strong>สถานะขาย:</strong> " . $row["statusName"] . "</p>";
            echo "<div class='buttons'>";
            echo "<a class='edit-button' href='editcars_admin.php";
            echo "?ac=edit&id=";
            echo $row['carID'] . "'>แก้ไข</a>";
            echo "<a class='delete-button' href='actions/ac_car.php?ac=del&id=";
            echo $row['carID'] . "'>ลบ</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <script>
        // รับข้อมูลแบบ JSON จากฟอร์มแก้ไขข้อมูลรถ
        function editCar() {
            var form = document.getElementById("edit-car-form");
            var formData = new FormData(form);

            // ส่งคำขอแก้ไขข้อมูลรถไปยังไฟล์ PHP ด้วย AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // เมื่อได้รับการตอบสนองจากไฟล์ PHP
                    alert("การแก้ไขข้อมูลรถสำเร็จ");
                    // สามารถเพิ่มการปรับปรุงหน้าเว็บที่นี่ตามต้องการ
                }
            };
            xhr.open("POST", "update_car.php", true);
            xhr.send(formData);
        }

        // เรียกใช้ฟังก์ชัน editCar เมื่อกดปุ่ม "เเก้ไขข้อมูล"
        var editButton = document.getElementById("edit-car-button");
        editButton.addEventListener("click", function(event) {
            event.preventDefault(); // ป้องกันการโหลดหน้าเว็บใหม่
            editCar(); // เรียกใช้ฟังก์ชัน editCar
        });
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