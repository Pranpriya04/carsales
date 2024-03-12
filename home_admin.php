<?php include './layouts/sidebar.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin2.css">
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
<center>
<div class="personal-info">
    <div class="user-icon">
        <img src="./pictures/admin.jpg" alt="">
    </div>
    <div class="info">
    <?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "carshop");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คิวรี่ข้อมูลผู้ใช้ที่มี usersID เท่ากับ 1
$sql = "SELECT * FROM users WHERE usersID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงข้อมูลผู้ใช้
    while($row = $result->fetch_assoc()) {
        echo "<div class='info'>";
        echo "<p>ชื่อผู้ใช้: " . $row["usersName"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>เบอร์โทร: " . $row["tel"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

    </div>
    <a href="#" class="edit-button" onclick="editInfo()">แก้ไข</a>
</div>
<div class="edit-info" style="display: none;">
    <div class="info2">
        <form action="actions/ac_user.php?ac=edit" method="POST" class="edit-form" id="edit_info" onsubmit="return edit_info()">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้:</label>
                <input type="text" id="username" name="usersName" value="<?php echo $_SESSION['usersName']; ?>"><input type="text" id="username" name="usersID" value="<?php echo $_SESSION['usersID']; ?>" hidden>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="form-group">
                <label for="tel">เบอร์โทร:</label>
                <input type="tel" id="tel" name="tel" value="<?php echo $_SESSION['tel']; ?>">
            </div>
            <button type="submit" class="btn-submit">บันทึก</button>
        </form>
    </div>
</div>

<script>
    function editInfo() {
        var personalInfo = document.querySelector('.personal-info');
        var editInfo = document.querySelector('.edit-info');

        personalInfo.style.display = 'none';
        editInfo.style.display = 'block';
    }
</script>
<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "carshop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คิวรี่ข้อมูลผู้ใช้ที่มี usersID เท่ากับ 1
$sql = "SELECT * FROM users WHERE usersID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงข้อมูลผู้ใช้
    $row = $result->fetch_assoc();
    $username = $row["usersName"];
    $email = $row["email"];
    $tel = $row["tel"];
} else {
    echo "0 results";
}
$conn->close();
?>


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

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

</script>

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
    function edit_info() {
            let url = $("#edit_info").attr("action")
            let data = $('#edit_info').serialize();
            $.ajax({
                url: url, //the page containing php script
                type: "post", //request type,
                // dataType: 'json',
                data: data,
                success: function(res) {
                    let {
                        status,
                        message
                    } = JSON.parse(res)

                    if (status) {
                        Swal.fire({
                            title: message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1000,
                        }).then(() => {
                            window.location.replace("index.php")
                        })
                    } else {
                        Swal.fire({
                            title: message,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1000,
                        })

                    }

                }
            });
            return false
        }
</script>


</body>
</html>