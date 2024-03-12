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
    <title>Car Information Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .car-info {
            margin-top: 20px;
        }

        .car-info p {
            margin: 10px 0;
        }

        .car-image {
            text-align: center;
            margin-top: 4rem;
        }

        .car-image img {
            max-width: 100%;
            height: auto;
        }



        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .h-span {
            display: flex;
            justify-content: space-around;
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

        .btn-10 {
            background: rgb(34, 193, 195);
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(141, 224, 93, 1) 100%);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .btn-10:after {
            position: absolute;
            content: " ";
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            transition: all 0.3s ease;
            -webkit-transform: scale(.1);
            transform: scale(.1);
        }

        .btn-10:hover {
            color: #fff;
            border: none;
            background: transparent;
        }

        .btn-10:hover:after {
            background: rgb(72, 206, 107);
            background: linear-gradient(0deg, rgba(72, 206, 107, 1) 0%, rgba(34, 193, 195, 1)100%);
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        #result {
            border: 1px solid black;
            padding: 10px;
            border-radius: 15px;
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

    <div class="container" style="display:block !important">

        <div class="h-span">
            <div style="max-width: 500px;margin-right:20px">
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

            <div style="margin-left: 20px;display:flex;justify-content:end;">
                <div>
                    <form id="carLoanForm">
                        <h4>คำนวณค่างวดรถ</h4>
                        <label for="carPrice">ราคารถยนต์ (บาท):</label>
                        <input type="number" value="<?php echo $car->price;  ?>" id="carPrice" name="carPrice" disabled>

                        <label for="downPayment">เงินดาวน์ (บาท):</label>
                        <input type="number" id="downPayment" name="downPayment" required>

                        <label for="interestRate">อัตราดอกเบี้ย (% ต่อปี):</label>
                        <input type="number" id="interestRate" name="interestRate" step="0.01" max="20" required>

                        <label for="loanPeriod">จำนวนงวด (ปี):</label>
                        <input type="number" id="loanPeriod" name="loanPeriod" max="6" required>
                        <div style="display: flex; justify-content:space-between">
                            <button style="margin: 2px;" type="submit" class="custom-btn btn-10">คำนวณ</button>
                            <button style="margin: 2px;" class="custom-btn btn-3" onclick="payment('<?php echo $car->carID; ?>')"><span>ซื้อ</span></button>
                            <button style="margin: 2px;" onclick="goBack()" class="custom-btn btn-5"><span>กลับ</span></button>
                        </div>
                    </form>

                    <div id="result" style="display: none;">
                        <h2>ผลลัพธ์</h2>
                        <p>ผ่อนชำระรายเดือน: <span id="monthlyPayment"></span> บาท</p>
                        <p>จำนวนเดือน: <span id="numOfMonths"></span> เดือน</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        let status = false;
        let data = {
            "numOfPayments": 0,
            "monthlyPayment": 0,
        };

        function goBack() {
            window.location.replace("?p=carInfo&carID=<?php echo $_REQUEST['carID'] ?>");
        }

        document.getElementById("carLoanForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var carPrice = parseFloat(document.getElementById("carPrice").value);
            var downPayment = parseFloat(document.getElementById("downPayment").value);
            var interestRate = parseFloat(document.getElementById("interestRate").value);
            var loanPeriod = parseFloat(document.getElementById("loanPeriod").value);

            var loanAmount = carPrice - downPayment;
            var monthlyInterestRate = interestRate / 100 / 12;
            var numOfPayments = loanPeriod * 12;

            var monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numOfPayments));
            var totalPayment = monthlyPayment * numOfPayments;
            data.monthlyPayment = numOfPayments
            data.numOfPayments = monthlyPayment.toFixed(2)
            status = true;
            document.getElementById("monthlyPayment").textContent = monthlyPayment.toFixed(2);
            document.getElementById("numOfMonths").textContent = numOfPayments;

            document.getElementById("result").style.display = "block";
        });

        function payment(carID) {
            console.log(data)
            if (status && data.monthlyPayment > 0 && data.numOfPayments > 0) {
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
                            url: `actions/ac_payment.php?ac=payLoan&carID=${carID}&usersID=<?php echo $_SESSION['usersID'] ?>&month=${data.monthlyPayment}&period=${data.numOfPayments}`,
                            type: "POST",
                            data: {
                                carID
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
            } else {
                Swal.fire({
                    title: "โปรดคำนวณค่างวดรถก่อน!",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1000,
                });
            }

        }
    </script>

</body>

</html>