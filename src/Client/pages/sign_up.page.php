<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../CSS/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../../../JS/bootstrap/bootstrap.bundle.min.js"></script>
    <script defer src="../js/script.js"></script>
</head>

<body>
    <div class="wrapper w-100 h-100 d-flex justify-content-center p-5 bg-dark">
        <div class="box card w-25 d-flex bg-dark p-4 text-white">
            <form action="" method="post" id="signup_form">
                <h1 class="text-center mb-5">SIGN UP</h1>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input class="form-control d-block mb-3" type="text" name="lastname" id="lastname" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input class="form-control d-block mb-3" type="text" name="firstname" id="firstname" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control d-block mb-3" type="text" name="address" id="address" placeholder="Address"><br>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
        
                    <input class="form-control d-block mb-3" type="text" name="email" id="email" placeholder="Email"><br>
        
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control d-block mb-3" type="text" name="username" id="username" placeholder="Username">
        
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
        
                    <input class="form-control d-block mb-3" type="password" name="password" id="password" placeholder="Password">
        
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
        
                    <input class="form-control d-block" type="password" name="password2" id="password2" placeholder="Confirm Password"><br><br>
        
                </div>
                <div class="form-group">
                    <button class="btn btn-primary w-100" type="submit" name="signup" id="signup">Sign up</button>
        
                </div>
            </form>
    
        </div>

    </div>
</body>

</html>