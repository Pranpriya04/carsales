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



    <center>
        <div class="personal-info">
            <div class="user-icon">
                <img src="./pictures/admin.jpg" alt="">
            </div>
            <div class="info">
                <p>ชื่อผู้ใช้: John Doe</p>
                <p>Email: johndoe@example.com</p>
                <p>เบอร์โทร: 012-345-6789</p>
            </div>
            <a href="#" class="edit-button" onclick="editInfo()">แก้ไข</a>
        </div>
        <div class="edit-info" style="display: none;">
            <div class="info2">
                <form action="edit_info.php" method="POST" class="edit-form">
                    <div class="form-group">
                        <label for="username">ชื่อผู้ใช้:</label>
                        <input type="text" id="username" name="username" value="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="johndoe@example.com">
                    </div>
                    <div class="form-group">
                        <label for="tel">เบอร์โทร:</label>
                        <input type="tel" id="tel" name="tel" value="012-345-6789">
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
        </div>
    </center>
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