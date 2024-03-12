<?php
require("./connnect.php");

$car = $conn->query(" SELECT * FROM car
LEFT JOIN brand ON brand.brandID = car.brandID
LEFT JOIN typecar ON typecar.typeCarID = car.typeCarID
WHERE car.carID = '" . $_REQUEST['carID'] . "'
")->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .container {
            margin: 20px auto;
            margin-top: 10rem;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-content: center;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .car-info {
            margin-top: 20px;
            margin: 0 10px 0 10px;
        }

        .car-info p {
            margin: 10px 0;
        }

        .car-image {
            text-align: center;
            margin: 0 10px 0 10px;
        }

        .car-image img {
            max-width: 700px;
            height: auto;
        }

        .h-span {
            display: flex;
            justify-content: space-between;
        }



        .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn-3 {
            background: rgb(0, 172, 238);
            background: linear-gradient(0deg, rgba(0, 172, 238, 1) 0%, rgba(2, 126, 251, 1) 100%);
            width: 130px;
            height: 40px;
            line-height: 42px;
            padding: 0;
            border: none;

        }

        .btn-3 span {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
        }

        .btn-3:before,
        .btn-3:after {
            position: absolute;
            content: "";
            right: 0;
            top: 0;
            background: rgba(2, 126, 251, 1);
            transition: all 0.3s ease;
        }

        .btn-3:before {
            height: 0%;
            width: 2px;
        }

        .btn-3:after {
            width: 0%;
            height: 2px;
        }

        .btn-3:hover {
            background: transparent;
            box-shadow: none;
        }

        .btn-3:hover:before {
            height: 100%;
        }

        .btn-3:hover:after {
            width: 100%;
        }

        .btn-3 span:hover {
            color: rgba(2, 126, 251, 1);
        }

        .btn-3 span:before,
        .btn-3 span:after {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            background: rgba(2, 126, 251, 1);
            transition: all 0.3s ease;
        }

        .btn-3 span:before {
            width: 2px;
            height: 0%;
        }

        .btn-3 span:after {
            width: 0%;
            height: 2px;
        }

        .btn-3 span:hover:before {
            height: 100%;
        }

        .btn-3 span:hover:after {
            width: 100%;
        }

        .btn-5 {
            width: 130px;
            height: 40px;
            line-height: 42px;
            padding: 0;
            border: none;
            background: rgb(255, 27, 0);
            background: linear-gradient(0deg, rgba(255, 27, 0, 1) 0%, rgba(251, 75, 2, 1) 100%);
        }

        .btn-5:hover {
            color: #f0094a;
            background: transparent;
            box-shadow: none;
        }

        .btn-5:before,
        .btn-5:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            height: 2px;
            width: 0;
            background: #f0094a;
            box-shadow:
                -1px -1px 5px 0px #fff,
                7px 7px 20px 0px #0003,
                4px 4px 5px 0px #0002;
            transition: 400ms ease all;
        }

        .btn-5:after {
            right: inherit;
            top: inherit;
            left: 0;
            bottom: 0;
        }

        .btn-5:hover:before,
        .btn-5:hover:after {
            width: 100%;
            transition: 800ms ease all;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="h-span">
            <div class="car-image">
                <img src="./pictures/<?php echo $car->picture; ?>" alt="Car Image">
            </div>

            <div class="car-info">
                <h4><?php echo $car->carName; ?></h4>
                <p><strong>ประเภทรถ:</strong> <?php echo $car->typeCarName; ?></p>
                <p><strong>แบรนด์รถ:</strong> <?php echo $car->brandName; ?></p>
                <p><strong>สีรถ:</strong> <?php echo $car->color; ?></p>
                <p><strong>ระยะทาง:</strong> <?php echo $car->distance; ?></p>
                <p><strong>ราคา:</strong> <?php echo number_format($car->price, 2, '.', ','); ?></p>
                <p><strong>ป้ายทะเบียน:</strong> <?php echo $car->vehicleID; ?></p>
                <p><strong>ปีที่ผลิต:</strong> <?php echo $car->produceYear; ?></p>
                <p><strong>รายละเอียดรถ:</strong> <?php echo $car->moreInfo; ?></p>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function goLogin() {
            window.location.replace("login.php");
        }

        function goBack() {
            window.history.back();
        }

        function goBuy(carID) {
            window.location.replace("?p=carPayment&carID=" + carID);
        }

        function payment(carID) {
            Swal.fire({
                icon: "question",
                title: "คุณต้องการซื้อด้วยเงินผ่อนหรือไม่?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "ใช่",
                denyButtonText: "ยกเลิก",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `actions/ac_payment.php?ac=payCash&carID=${carID}&usersID=<?php echo $_SESSION['usersID'] ?>`,
                        type: "POST",
                        data: {
                            carID,
                        },
                        success: function(res) {
                            let {
                                status,
                                message
                            } = JSON.parse(res);


                            if (status) {
                                Swal.fire({
                                    title: message,
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1000,
                                }).then(() => {
                                    window.location.replace("index.php");
                                });
                            } else {
                                Swal.fire({
                                    title: message,
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1000,
                                });
                            }
                        },
                    });
                }
            });
        }
    </script>
</body>

</html>