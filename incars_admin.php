<?php
include("./connnect.php");

$brandSql = $conn->query("SELECT * FROM brand");
$brands = [];

while ($brand = $brandSql->fetch_object()) {
    $brands[] = $brand;
}

$typeCarSql = $conn->query("SELECT * FROM typecar");
$typeCars = [];

while ($typeCar = $typeCarSql->fetch_object()) {
    $typeCars[] = $typeCar;
}

?>
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
    <div class="container_car">
        <h4>แก้ไขข้อมูลรถ</h4>
        <form action="actions/ac_car.php?ac=add" method="POST" enctype="multipart/form-data" id="add" onsubmit="return add()">

            <div class="input-group">
                <label for="car-name">ชื่อรถ:</label>
                <input type="text" id="car-name" value="" name="carName">
            </div>

            <div class="input-group">
                <label for="brand">ชื่อแบรนด์:</label>
                <select id="brand" value="" name="brand">
                    <?php foreach ($brands as $key => $brand) { ?>
                        <option value="<?php echo  $brand->brandID ?>"><?php echo $brand->brandName ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="input-group">
                <label for="car-type">ประเภทรถ:</label>
                <select id="car-type" value="" name="carType">
                    <?php foreach ($typeCars as $key => $type) { ?>
                        <option value="<?php echo  $type->typeCarID ?>"><?php echo $type->typeCarName ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="input-group">
                <label for="manufacture-year">ปีผลิต:</label>
                <input type="number" id="manufacture-year" name="year" min="1900" max="2099" value="">
            </div>

            <div class="input-group">
                <label for="car-color">สีรถ:</label>
                <input type="text" id="car-color" value="" name="color">
            </div>

            <div class="input-group">
                <label for="mileage">ระยะทาง:</label>
                <input type="number" id="mileage" name="distance" value="">
            </div>

            <div class="input-group">
                <label for="price">ราคา:</label>
                <input type="number" id="price" value="" name="price">
            </div>
            <div class="input-group">
                <label for="price">Tank:</label>
                <input type="text" id="price" value="" name="tankID">
            </div>
            <div class="input-group">
                <label for="price">Engine:</label>
                <input type="text" id="price" value="" name="engine">
            </div>
            <div class="input-group">
                <label for="price">ป้ายทะเบียน:</label>
                <input type="text" id="price" value="" name="vehicleID">
            </div>

            <label for="additional-info">รายละเอียดเพิ่มเติม:</label><br>
            <textarea id="additional-info" name="info"></textarea><br>

            <div class="input-group">
                <label for="sale-status">สถานะขาย:</label>
                <input type="radio" id="sold" name="status" value="1" style="margin:3px">
                <label for="sold">ขายแล้ว</label>
                <input type="radio" id="sold" name="status" value="2" style="margin:3px">
                <label for="unsold">รอขาย</label>
            </div>

            <div class="input-group">
                <label for="car-image">รูปรถ:</label>
                <input type="file" id="car-image" name="carImage">
            </div>

            <div class="button-group2">
                <button type="submit">เพิ่มข้อมูล</button>
                <button type="reset"><a href="cars_admin.php">ยกเลิก</a></button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>