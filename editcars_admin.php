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
      
<div class="container_car">
    <h4>แก้ไขข้อมูลรถ</h4>
    <form action="submit_car_data.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <label for="car-id">รหัสรถ:</label>
            <input type="text" id="car-id" name="car-id">
        </div>

        <div class="input-group">
            <label for="car-name">ชื่อรถ:</label>
            <input type="text" id="car-name" name="car-name">
        </div>

        <div class="input-group">
            <label for="brand">ชื่อแบรนด์:</label>
            <select id="brand" name="brand">
                <option value="toyota">Toyota</option>
                <option value="honda">Honda</option>
                <option value="nissan">Nissan</option>
                <!-- เพิ่มแบรนด์อื่น ๆ ตามต้องการ -->
            </select>
        </div>

        <div class="input-group">
            <label for="car-type">ประเภทรถ:</label>
            <select id="car-type" name="car-type">
                <option value="sedan">Sedan</option>
                <option value="suv">SUV</option>
                <option value="pickup">Pickup</option>
                <!-- เพิ่มประเภทอื่น ๆ ตามต้องการ -->
            </select>
        </div>

        <div class="input-group">
            <label for="manufacture-year">ปีผลิต:</label>
            <input type="number" id="manufacture-year" name="manufacture-year" min="1900" max="2099" value="2022">
        </div>

        <div class="input-group">
            <label for="car-color">สีรถ:</label>
            <input type="text" id="car-color" name="car-color">
        </div>

        <div class="input-group">
            <label for="mileage">ระยะทาง:</label>
            <input type="number" id="mileage" name="mileage">
        </div>

        <div class="input-group">
            <label for="price">ราคา:</label>
            <input type="number" id="price" name="price">
        </div>

        <label for="additional-info">รายละเอียดเพิ่มเติม:</label><br>
        <textarea id="additional-info" name="additional-info"></textarea><br>

        <div class="input-group">
            <label for="sale-status">สถานะขาย:</label>
            <input type="radio" id="sold" name="sale-status" value="sold">
            <label for="sold">ขายแล้ว</label>
            <input type="radio" id="unsold" name="sale-status" value="unsold">
            <label for="unsold">รอขาย</label>
        </div>

        <div class="input-group">
            <label for="car-image">รูปรถ:</label>
            <input type="file" id="car-image" name="car-image">
        </div>

        <div class="button-group2">
        <button type="submit"><a href="">เเก้ไขข้อมูล</a></button>
        <button type="reset"><a href="cars_admin.php">ยกเลิก</a></button>
        </div>
    </form>
</div>

</body>
</html>