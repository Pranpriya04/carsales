<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลแบรนด์รถ</title>
    <link rel="stylesheet" href="style_admin.css">
    <style>
        /* สไตล์เพิ่มเติมสำหรับแก้ไขหน้าเว็บ */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        button[type="button"] {
            background-color: #ccc;
            color: #333;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button[type="button"]:hover {
            background-color: #bbb;
        }
    </style>
</head>

<body>
    <?php
    include "./layouts/sidebar.php";
    include "./layouts/header_admin.php"; ?>
    <div class="container" style=" margin-top: 14rem;">
        <h2>แก้ไขข้อมูลแบรนด์รถ</h2>
        <?php
        include("./connnect.php");
        // PHP สำหรับการแสดงฟอร์มแก้ไข
        if (isset($_GET['brandID'])) {
            // เชื่อมต่อกับฐานข้อมูล


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // รับค่าจากฟอร์มแก้ไข
                $brandID = $_POST['brandID'];
                $brandName = $_POST['brandName'];

                // คิวรี่ SQL เพื่ออัปเดตข้อมูล
                $sql = "UPDATE brand SET brandName='$brandName' WHERE brandID='$brandID'";

                // ตรวจสอบว่าอัปเดตข้อมูลสำเร็จหรือไม่
                if ($conn->query($sql) === TRUE) {
                    // อัปเดตสำเร็จ ส่งกลับไปยังหน้า brand_admin.php
                    echo "<script>window.location.replace('index.php?p=brand_admin')</script>";
                    exit();
                } else {
                    echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . $conn->error;
                }
            }

            // นำเข้าค่า brandID จาก URL
            $brandID = $_GET['brandID'];

            // คิวรี่ฐานข้อมูลเพื่อดึงข้อมูลแบรนด์รถที่ต้องการแก้ไข
            $sql = "SELECT * FROM brand WHERE brandID='$brandID'";
            $result = $conn->query($sql);

            // ตรวจสอบว่ามีข้อมูลหรือไม่
            if ($result->num_rows > 0) {
                // ดึงข้อมูลแบรนด์รถ
                $brand = $result->fetch_assoc();
                $brandID = $brand['brandID'];
                $brandName = $brand['brandName'];

                // แสดงฟอร์มแก้ไขข้อมูล
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='brandID' value='$brandID'>";
                echo "<label for='type-name'>ชื่อแบรนด์รถ:</label>";
                echo "<input type='text' id='type-name' name='brandName' value='$brandName'>";
                echo "<button type='submit' name='update_brand'>บันทึก</button>";
                echo "<a href='brand_admin.php'><button type='button'>ยกเลิก</button></a>";
                echo "</form>";
            } else {
                echo "ไม่พบข้อมูลแบรนด์รถ";
            }

            // ปิดการเชื่อมต่อฐานข้อมูล
            $conn->close();
        } else {
            echo "ไม่มีรหัสแบรนด์รถที่กำหนด";
        }
        ?>
    </div>
</body>

</html>