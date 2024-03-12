<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>  
    
<div class="header">
    <div class="logo">
    <a href="home_admin.php"><h1 id="logo">FDPG CARS</h1></a>
    </div>
    <div class="dp">
    <div class="dropdown">
        <h6 class="dropbtn">ประเภทรถ</h6>
            <div class="dropdown-content">
                <a href="#">Option 1</a>
                <a href="#">Option 2</a>
                <a href="#">Option 3</a>
            </div>
    </div>
    <div class="dropdown">
        <h6 class="dropbtn">แบรนด์รถ</h6>
            <div class="dropdown-content">
                <a href="#">Option 1</a>
                <a href="#">Option 2</a>
                <a href="#">Option 3</a>
            </div>
    </div>      
    </div>
    <div class="menu">
        <ul>
            <li><a href="#"><i class="fa-solid fa-house"></i>profile</a></li>
            <li><a href="#"><i class="fa-solid fa-envelope"></i>Contact</a></li>
        </ul>
    </div>
</div>
<div class="slider">
    <img src="./pictures/4.jpg" alt="Image 1" >
    <img src="./pictures/2.jpg" alt="Image 2" >
    <img src="./pictures/3.jpg" alt="Image 3" >
    <div class="con">If "GOOD CAR" is your choice so It's actully "US"</div>
</div>
<?php
    include './car.php';
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