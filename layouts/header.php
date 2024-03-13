<div class="header">
    <div class="logo">
        <a href="index.php">
            <h1 id="logo">FDPG CARS</h1>
        </a>
    </div>

    <div class="menu">
        <ul>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <li><a href="logout.php"><i class="fa-solid fa-house"></i>Logout</a></li>
                <li><a href="?p=history"><i class="fa-solid fa-history"></i>history</a></li>
            <?php } else { ?>
                <li><a href="login.php"><i class="fa-solid fa-house"></i>Login</a></li>
            <?php } ?>
        </ul>
    </div>
</div>