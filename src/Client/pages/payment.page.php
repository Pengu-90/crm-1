<?php
session_start();

if (isset($_GET['user'])) {
    $user = $_GET['user'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinx Corp.</title>
    <link rel="stylesheet" href="../../../CSS/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script defer src="../../../JS/bootstrap/bootstrap.bundle.min.js"></script>
    <script defer src="../js/login.js"></script>
    <script defer src="../js/script_cart.js"></script>
</head>

<body class="bg-dark">

    <div class="d-flex justify-content-center pb-5 text-white">
        <div class="my-5 pt-5 w-25">
            <div class="border rounded p-3">
                <h3 class="text-center">Payment Method</h3>

                <form action="" id="checkout_form">
                    <div class="my-3">
                        <input type="text" name="user" id="user" value="<?php echo $user ?>" disabled hidden>
                        <label for="tix_type">Select Method:</label>
                        <select class="form-select" name="pay_method" id="pay_method">
                            <option value="1">PayMama</option>
                            <option value="2">GayCash</option>
                            <option value="3">Cash on Robbery</option>
                        </select>
                    </div>
                    <button class="text-white btn btn-primary w-100" type="submit">Checkout</button>
                </form>

            </div>

        </div>
    </div>
</body>

</html>