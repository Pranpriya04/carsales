<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <?php
    if (isset($_REQUEST['p'])) {
        include "./layouts/header.php";
        include($_REQUEST['p'] . ".php"); ?>

        <div class="slider">
            <img src="./pictures/4.jpg" alt="Image 1">
            <img src="./pictures/2.jpg" alt="Image 2">
            <img src="./pictures/3.jpg" alt="Image 3">
            <div class="con">If "GOOD CAR" is your choice so It's actully "US"</div>
        </div>
        <?php } else {
        if (isset($_SESSION['status']) and $_SESSION['status'] == 1) {
            include "./layouts/header_admin.php";
            include("home_admin.php");
        } else {
            include "./layouts/header.php";
            include("car.php");
        ?>
            <div class="slider">
                <img src="./pictures/4.jpg" alt="Image 1">
                <img src="./pictures/2.jpg" alt="Image 2">
                <img src="./pictures/3.jpg" alt="Image 3">
                <div class="con">If "GOOD CAR" is your choice so It's actully "US"</div>
            </div>

    <?php       }
    } ?>





</body>

</html>