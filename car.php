<?php

include("./connnect.php");

$sql = $conn->query(" SELECT * FROM car
LEFT JOIN brand ON brand.brandID = car.brandID
LEFT JOIN typecar ON typecar.typeCarID = car.typeCarID
WHERE car.statusID = 2
");

$cars = [];

while ($car = $sql->fetch_object()) {
    $cars[] = $car;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carShop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <?php foreach ($cars as $key => $car) {
        ?>
            <div class="box" onclick="goCarInfo('<?php echo $car->carID; ?>')">
                <div class="im">
                    <img src="./pictures/<?php echo $car->picture; ?>">
                </div>
                <div class="text">
                    <div class="price">
                        <h3>&#3647;<?php echo number_format($car->price, 2, '.', ','); ?></h3>
                    </div>
                    <div class="t">
                        <h4><?php echo $car->carName; ?></h4>
                        <h6>ประเภทรถ : <?php echo $car->typeCarName; ?></h6>
                        <h6>แบรนด์รถ : <?php echo $car->brandName; ?></h6>
                        <h6>ระยะทาง : <?php echo $car->distance; ?></h6>
                        <h6>รายละเอียดรถ : <?php echo $car->moreInfo; ?></h6>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Add more boxes as needed -->

    <script>
        function goCarInfo(carID) {
            window.location.replace("?p=carInfo&carID=" + carID);
        }
    </script>

</body>

</html>