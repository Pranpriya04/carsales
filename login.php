<!DOCTYPE html>

<html>

<head>

    <title>carShop</title>

    <link rel="stylesheet" href="./style_login.css">

</head>

<body>

    <input type="radio" id="loginForm" name="formToggle" checked>

    <input type="radio" id="registerForm" name="formToggle">

    <input type="radio" id="forgotForm" name="formToggle">



    <div class="wrapper" id="loginFormContent">

        <form id="login" action="actions/ac_login.php?ac=login" onsubmit="return login()">

            <h1>Login</h1>

            <div class="input-box">

                <input type="text" placeholder="Username" name="email" required>

            </div>

            <div class="input-box">

                <input type="password" placeholder="Password" name="password" required>



            </div>

            <div class="checkbox1">

                <label><input type="checkbox">Remember Me</label>

                <label for="forgotForm">Forgot Password</label>

            </div>

            <button type="submit" class="btn">Login</button>

            <div class="link">

                <p>Don't have an account? <label for="registerForm">Register</label></p>

            </div>

        </form>

    </div>

    <div class="wrapper" id="registerFormContent">

        <form id="register" action="actions/ac_login.php?ac=reg" onsubmit="return register()">

            <h1>Register</h1>

            <div class="input-box">

                <input type="text" placeholder="FirstName and LastName" name="usersName" required>



            </div>

            <div class="input-box">

                <input type="email" placeholder="Email" name="email" required>


            </div>
            <div class="input-box">

                <input type="tel" placeholder="Mobile Phone" name="tel" required>


            </div>

            <div class="input-box">

                <input type="credit" placeholder="Credit" name="credit" required>


            </div>

            <div>

                <textarea placeholder="Address" name="address" class="area-box" id="" cols="45" rows="10" required></textarea>


            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Reply Password" name="replyPassword" required>
            </div>

            <div class="checkbox1">

                <label><input type="checkbox" required>I agree to terms & conditions</label>

            </div>

            <button type="submit" class="btn">Register</button>

            <div class="link">

                <p>Already have an account? <label for="loginForm">Login</label></p>

            </div>

        </form>

    </div>

    <div class="wrapper" id="forgotFormContent">

        <form id="forget" action="actions/ac_login.php?ac=forget" onsubmit="return forget()">

            <h1>Reset your password</h1>

            <div class="input-box">

                <input type="email" name="email" placeholder="Email" required>

            </div>

            <div class="input-box">

                <button type="submit" class="btn">Send Request</button>

                <div class="link">

                    <p>Don't have an account? <label for="registerForm">Register</label></p>

                </div>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function forget() {
            let url = $("#forget").attr("action")
            let data = $('#forget').serialize();
            $.ajax({
                url: url, //the page containing php script
                type: "post", //request type,
                data: data,
                success: function(res) {
                    let {
                        status,
                        message
                    } = JSON.parse(res)


                    if (status) {
                        window.location.replace("newPassword.php?usersID=" + message)
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


        function login() {
            let url = $("#login").attr("action")
            let data = $('#login').serialize();
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

        function register() {
            let url = $("#register").attr("action")
            let data = $('#register').serialize();
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