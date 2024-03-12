<!DOCTYPE html>

<html>

<head>

    <title>Login and Registration Form</title>

    <link rel="stylesheet" href="./style_login.css">

</head>

<body>

    <input type="radio" id="loginForm" name="formToggle" checked>


    <div class="wrapper" id="loginFormContent">

        <form id="newPass" action="actions/ac_login.php?ac=newPass" onsubmit="return newPass()">

            <h1>new password</h1>

            <div class="input-box">

                <input type="password" placeholder="new password" name="password" required>
                <input type="text" placeholder="new password" name="usersID" hidden value="<?php echo $_REQUEST['usersID']; ?>">

            </div>

            <div class="input-box">

                <input type="password" placeholder="reply password" name="newPassword" required>

            </div>


            <button type="submit" class="btn">Done</button>


        </form>

    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function newPass() {
            let url = $("#newPass").attr("action")
            let data = $('#newPass').serialize();
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
</body>

</html>