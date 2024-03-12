<?php

include("./connnect.php");
$sql = $conn->query("SELECT * FROM sales 
LEFT JOIN car ON car.carID = sales.carID
LEFT JOIN payment ON payment.paymentID = sales.paymentID
WHERE sales.usersID = '" . $_SESSION['usersID'] . "'
");

$historys = [];

while ($history = $sql->fetch_object()) {
    $historys[] = $history;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>carShop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <style>
        .Container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="Container">
        <table id="myTable" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อรถ</th>
                    <th>สถานะชำระเงิน</th>
                    <th>วันที่ชำระเงิน</th>
                    <th>จำนวนงวด</th>
                    <th>งวดละ</th>
                    <th>รายละเอียดรถ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historys as $key => $history) { ?>
                    <tr>
                        <td><?php $key + 1; ?></td>
                        <td><?php echo $history->carName; ?></td>
                        <td><?php echo $history->paymentName; ?></td>
                        <td><?php echo $history->salesDay; ?></td>
                        <td><?php echo $history->month; ?></td>
                        <td><?php echo $history->periodPrice; ?></td>
                        <td><a href="?p=infoCar&carID=<?php echo $history->carID ?>">รายละเอียดรถ</a></td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>
</body>

</html>