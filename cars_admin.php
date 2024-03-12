<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stlye_admin_car.css">
</head>
<body>  
    
<div class="header">
    <div class="logo">
        <a href="home_admin.php"><h1 id="logo">FDPG CARS</h1></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#"><i class="fa-solid fa-house"></i>admin</a></li>        </ul>
    </div>
</div>
<div class="sidebar">
  <a href="type_admin.php">ข้อมูลประเภท</a>
  <a href="brand_admin.php">ข้อมูลแบรนด์รถ</a>
  <a href="cars_admin.php">ข้อมูลรถ</a>
  <a href="sales_admin.php">ข้อมูลการขาย</a>
  <a href="member_admin.php">ข้อมูลสมาชิก</a><br><br>
  <a href="#">Logout</a>
  </div>
  <center>
  <button class="add" id="add-car"><a href="incars_admin.php">เพิ่มข้อมูลรถ</a></button></div>
  </center>
  <div class="car-info">
    <div class="car-image">
        <img src="./pictures/4.jpg" alt="Car Image">
    </div>
    <div class="car-details">
        <p><strong>รหัสรถ:</strong> 123456</p>
        <p><strong>ชื่อรถ:</strong> Toyota Camry</p>
        <p><strong>ชื่อแบรนด์:</strong> Toyota</p>
        <p><strong>ประเภทรถ:</strong> Sedan</p>
        <p><strong>ปีผลิต:</strong> 2022</p>
        <p><strong>สีรถ:</strong> Black</p>
        <p><strong>ระยะทาง:</strong> 50,000 กิโลเมตร</p>
        <p><strong>ราคา:</strong> 800,000 บาท</p>
        <p><strong>รายละเอียดเพิ่มเติม:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p><strong>สถานะขาย:</strong> ยังไม่ขาย</p>
        <div class="buttons">
            <button class="edit-button"><a href="editcars_admin.php">แก้ไข</a></button>
            <button class="delete-button">ลบ</button>
        </div>
    </div>
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