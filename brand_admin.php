<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>


    <?php
    include './layouts/header_admin.php';
    include './layouts/sidebar.php'; ?>

    <div class="table_component" role="region" tabindex="0">
        <table>
            <div class="add-type">
                <h5>เพิ่มข้อมูลแบรนด์รถ</h5>
                <form action="" method="post">
                    <label for="type-name">ชื่อแบรนด์รถ:</label>
                    <input type="text" id="type-name" name="type-name">
                    <button type="submit" name="add_brand">เพิ่มรายการ</button>
                </form>
            </div>
            <caption>ข้อมูลแบรนด์รถ</caption>
            <thead>
                <tr>
                    <th>รหัสแบรนด์รถ</th>
                    <th>ชื่อแบรนด์รถ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("./connnect.php");

                // Check if form is submitted for adding brand
                if (isset($_POST['add_brand'])) {
                    $brandName = $_POST['type-name'];

                    // Insert into database
                    $sql = "INSERT INTO brand ( brandName) VALUES ('$brandName')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Brand added successfully";
                    } else {
                        echo "Error adding brand: " . $conn->error;
                    }
                }

                // Check if brandID is set for deletion
                if (isset($_POST['delete_brand'])) {
                    $brandID = $_POST['brandID'];

                    // Delete from database
                    $sql = "DELETE FROM brand WHERE brandID = '$brandID'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Brand deleted successfully";
                    } else {
                        echo "Error deleting brand: " . $conn->error;
                    }
                }

                // Fetch data from the brand table
                $sql = "SELECT * FROM brand";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["brandID"] . "</td>";
                        echo "<td>" . $row["brandName"] . "</td>";
                        echo "<td class='butt'>";
                        echo "<a href='editbrand_admin.php?brandID=" . $row["brandID"] . "' class='edit-button'>แก้ไข</a>";
                        echo "<form method='post'><input type='hidden' name='brandID' value='" . $row["brandID"] . "'>";
                        echo "<center><button type='submit' name='delete_brand' class='delete-button'>ลบ</button></center></form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>0 results</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>



    <!-- Logout confirmation modal -->
    <div class="modal" id="logout-modal">
        <div class="modal-content">
            <h2>คุณต้องการออกจากระบบหรือไม่?</h2><br>
            <div class="dd">
                <button id="confirm-logout">ยืนยัน</button>
                <button id="cancel-logout">ยกเลิก</button>
            </div>
        </div>
    </div>

    <script>
        var logoutButton = document.getElementById("logout-btn");
        var modal = document.getElementById("logout-modal");
        var confirmButton = document.getElementById("confirm-logout");
        var cancelButton = document.getElementById("cancel-logout");
        logoutButton.onclick = function() {
            modal.style.display = "block";
        }
        confirmButton.onclick = function() {
            window.location.href = "logout.php";
        }
        cancelButton.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>