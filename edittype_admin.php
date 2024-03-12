<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <?php
    include("./connnect.php");
    $sql = $conn->query("SELECT * FROM typecar WHERE typeCarID = '" . $_REQUEST['id'] . "'");
    $type = $sql->fetch_object();
    ?>
    <form action="edittype_admin.php" method="post">
        <div class='edit-modal'>
            <div class='info-row'>
                <label>ชื่อประเภทรถ: <input type='text' value="<?php echo $type->typeCarName; ?>"></label>
            </div>

            <button type="submit" class="save-button">บันทึก</button>
            <a href='type_admin.php'><button class='can-button'>ยกเลิก</button></a>
        </div>
    </form>


</body>

</html>