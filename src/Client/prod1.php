<?php
include '../../PHP/includes/session_handler.inc.php';

$user = $_GET['user'];

?>
<!DOCTYPE html>
<html lang="en">
<?php
include './components/top_nav.comp.php';
include './components/modals/orders.modal.php';
include './components/modals/cart.modal.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <script defer src="../../JS/bootstrap/bootstrap.bundle.min.js"></script>
    <script defer src="./js/login.js"></script>
    <script defer src="./js/script_prod.js"></script>

</head>

<body class="bg-dark">
    <div class="d-flex bg-dark pb-5">
        <div class="row justify-content-center gap-3 w-100 mt-5">
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 p-4">
                <div class="row">
                    <div class="col-6">
                        <div class="card p-3 bg-dark text-white shadow-sm">
                            <div class="overflow-hidden mb-2" id="prod1_show"></div>

                        </div>

                    </div>
                    <div class="col-6 text-white d-flex align-items-center">
                        <div class="w-100">
                            <h2 class="">Shimmer</h2>
                            <weak>PHP 180.00</weak>

                            <form action="" class="my-3" id="cart_form">
                                <?php
                                include './components/modals/payment.modal.php';

                                ?>
                                <input type="text" name="user" id="user" value="<?php echo $user ?>" disabled hidden>
                                <input type="text" name="item" id="item" value="1" disabled hidden>
                                <input class="form-control w-25" type="number" name="qty" id="qty" value="1">
                            </form>
                            <button class="btn btn-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#payment" onclick="selectItem(180)">Add to cart</button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>