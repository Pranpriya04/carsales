<div class="header">
    <div class="logo">
        <a href="home_admin.php">
            <h1 id="logo">FDPG CARS</h1>
        </a>
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
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <li><a href="logout.php"><i class="fa-solid fa-house"></i>Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php"><i class="fa-solid fa-house"></i>Login</a></li>
            <?php } ?>
            <li><a href="#"><i class="fa-solid fa-envelope"></i>Contact</a></li>
        </ul>
    </div>
</div>