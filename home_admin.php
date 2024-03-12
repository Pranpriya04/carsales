<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin2.css">
</head>

<body>



    <?php include './layouts/sidebar.php'; ?>


    <center>
        <div class="personal-info">
            <div class="user-icon">
                <img src="./pictures/admin.jpg" alt="">
            </div>
            <div class="info">
                <div class="info">
                    <p>ชื่อผู้ใช้: <?php echo $_SESSION['usersName'] ?></p>
                    <p>Email: <?php echo $_SESSION['email']; ?></p>
                    <p>เบอร์โทร: <?php echo $_SESSION['tel']; ?></p>
                </div>

            </div>
            <a href="#" class="edit-button" onclick="editInfo()">แก้ไข</a>
        </div>
        <div class="edit-info" style="display: none;">
            <div class="info2">
                <form action="actions/ac_user.php?ac=edit" method="POST" class="edit-form" id="edit_info" onsubmit="return edit_info()">
                    <div class="form-group">
                        <label for="username">ชื่อผู้ใช้:</label>
                        <input type="text" id="username" name="usersName" value="<?php echo $_SESSION['usersName']; ?>">
                        <input type="text" id="username" name="usersID" value="<?php echo $_SESSION['usersID']; ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tel">เบอร์โทร:</label>
                        <input type="tel" id="tel" name="tel" value="<?php echo $_SESSION['tel']; ?>">
                    </div>
                    <button type="submit" class="btn-submit">บันทึก</button>
                </form>
            </div>
        </div>

        <script>
            function editInfo() {
                var personalInfo = document.querySelector('.personal-info');
                var editInfo = document.querySelector('.edit-info');

                personalInfo.style.display = 'none';
                editInfo.style.display = 'block';
            }
        </script>



        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"> </script>

        <script>
            function edit_info() {
                let url = $("#edit_info").attr("action")
                let data = $('#edit_info').serialize();
                $.ajax({
                    url: url, //the page containing php script
                    type: "post", //request type,
                    // dataType: 'json',
                    data: data,
                    success: function(res) {
                        let {
                            status,
                            message
                        } = JSON.parse(res)


                        if (status) {
                            Swal.fire({
                                title: message,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1000,
                            }).then(() => {
                                window.location.replace("index.php")
                            })
                        } else {
                            Swal.fire({
                                title: message,
                                icon: "error",
                                showConfirmButton: false,
                                timer: 1000,
                            })

                        }

                    }
                });
                return false
            }
        </script>


</body>

</html>