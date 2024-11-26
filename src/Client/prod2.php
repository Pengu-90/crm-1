<?php
include '../../PHP/includes/session_handler.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <script defer src="../../JS/bootstrap/bootstrap.bundle.min.js"></script>
    <script defer src="./js/login.js"></script>
</head>
<body class="bg-dark">
<div class="d-flex bg-dark pb-5">
        <div class="row justify-content-center gap-3 w-100 mt-5">
            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 p-4">
                <div class="row">
                    <div class="col-6">
                        <div class="card p-3 bg-dark text-white shadow-sm">
                            <div class="overflow-hidden mb-2" id="prod2_show"></div>

                        </div>

                    </div>
                    <div class="col-6 text-white d-flex align-items-center">
                        <div class="w-100">
                            <h2 class="">Hex Crystal</h2>
                            <weak>PHP 250.00</weak>

                            <form action="" class="my-3">
                                <input class="form-control w-25" type="number" name="qty" id="qty" value="1">
                            </form>
                            <a class="btn btn-primary mt-2 w-100" href="./prod1.php">Buy Now</a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>