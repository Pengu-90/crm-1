<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/bootstrap/bootstrap.min.css">
    <script defer src="./JS/index.js"></script>
</head>

<body>
    <div class="wrapper d-flex w-100 h-100 align-items-center" style="height: 100vh !important;">
        <div class="col"></div>
        <div class="col-sm-5 col-md-5 col-lg-4 col-xl-3" style="padding: 2rem;">
            <div class="user_login">
                <div class="contain">
                    <div class="row gap-3">
                        <div class="col-12">
                            <div class="header-contain">
                                <img src="./src/img/jinx_graffiti.png" alt="" style="width: 2em;">

                            </div>

                        </div>
                        <div class="col">
                            <h3 class="text-white">Login</h3>

                        </div>
                        <div class="col-12">

                            <div class="d-flex justify-content-center w-100">
                                <div class="w-100">
                                    <div class="message-error rounded justify-content-between align-items-center" id="message-error">
                                        Incorrect username or password.
                                        <span class="message-close" id="message-close">X</span>
                                    </div>
                                    <div class="box w-100 shadow card" style="border-color: gray !important;">

                                        <form id="login_form" action="" method="post">
                                            <div class="input">
                                                <input class="text-white" type="text" id="username" name="username" required>
                                                <span class="label"><label id="usn_label" for="username">Username</label></span>
                                                <!-- <span class="user-line"></span> -->
                                            </div>
                                            <div class="input">
                                                <input class="text-white" type="password" id="password" name="password" required>
                                                <span class="label"><label id="pwd_label" for="password">Password</label></span>
                                                <!-- <span class="pass-line"></span> -->
                                            </div>
                                            <div class="forgot-pass-contain">
                                                <a class="forgot-pass" href="">Forgot password?</a>

                                            </div>

                                            <input type="submit" name="submit" id="submit" value="Login">

                                            <span class="create-acc-contain d-flex justify-content-center text-white" style="font-size: 11pt !important;">
                                                Don't have an account?
                                                <a class="create-acc-link" href="./src/Client/pages/sign_up.page.php">Sign up</a>
                                            </span>

                                            <!-- <a href="">Use a code</a> -->

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="message-guide" style="outline: 1px white solid; padding: 10px; border-radius: 5px; margin-bottom: 10px; max-width: 270px;">
                        <h4>How to login:</h4>
                        <p style="margin-top: 5px;">Your USN is your Username, and your Lastname is your Password.</p>
                            </div> -->


                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>



</body>

</html>