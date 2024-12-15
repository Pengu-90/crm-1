<?php
session_start();

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $page = $_GET['page'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinx Corp.</title>
    <link rel="stylesheet" href="../../CSS/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sb-styles.css">

    <script defer src="../../JS/bootstrap/bootstrap.bundle.min.js"></script>
    <script defer src="./js/main.js"></script>
</head>

<body>
    <?php
    if ($page == 'main') {
    ?>
        <script defer src="./js/script_cart.js"></script>

        <input type="text" name="page" id="page" value="<?php echo $page ?>" disabled hidden>

        <?php
        include './components/top_nav.comp.php';
        include './components/modals/cart.modal.php';
        ?>
        <div id="carouselExampleSlidesOnly" class="carousel slide bg-dark overflow-hidden" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
            <div class="carousel-inner mt-2 mb-5 h-100">
                <div class="carousel-item active">
                    <div class="row  position-relative">
                        <div id="banner">
                        </div>
                        <div class="col-12 text-white banner_content" style="height: 80vh !important;">
                            <div class="row justify-content-center align-items-center h-100">

                                <div class="col-xl-5 col-lg-5 col-md-5 col-10 shadow p-4 text-center rounded border">
                                    <div class="d-flex justify-content-center w-100">
                                        <img class="d-block w-75" src="../img/arcane.jpg" alt="Second slide">

                                    </div>
                                    <div class="d-flex justify-content-center w-100 mt-2">
                                        <p class="w-100">Amid the stark discord of twin cities Piltover and Zaun, two sisters fight on rival sides of a war between magic technologies and clashing convictions.</p>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row  position-relative">
                        <div id="banner2">
                        </div>
                        <div class="col-12 text-white banner_content" style="height: 80vh !important;">
                            <div class="d-flex justify-content-center align-items-center h-100">

                                <div class="w-75 p-4 text-center">
                                    <img src="../img/jinx_graffiti.png" alt="" style="width: 5em;">

                                    <h1 class="mb-3 ">Upgrade with <span style="color: lightblue; text-shadow: 2px 0px 10px lightblue;">Hex Crystal</span> or <span style="color: purple; text-shadow: 2px 0px 10px purple;">Shimmer</span></h1>
                                    <p>Unleash the true potential of a weapon inside you.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="pt-5 bg-dark pb-5 shadow">
            <div class="row justify-content-center gap-3 w-100 mt-5">
                <h2 class="text-center text-white">Products</h2>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-4">
                    <div class="card p-3 bg-dark text-white shadow-sm">
                        <div class="overflow-hidden mb-2" id="prod1"></div>
                        <h3>Shimmer</h3>
                        <weak>PHP 180.00</weak>
                        <a class="btn btn-primary mt-2" href="./prod1.php?user=<?php if (isset($_GET['user'])) {
                                                                                    echo $user;
                                                                                } ?>&page=prod1">Buy Now</a>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-4">
                    <div class="card p-3 bg-dark text-white shadow-sm">
                        <div class="overflow-hidden mb-2" id="prod2"></div>
                        <h3>Hex Crystal</h3>
                        <weak>PHP 250.00</weak>
                        <a class="btn btn-primary mt-2" href="./prod2.php?user=<?php if (isset($_GET['user'])) {
                                                                                    echo $user;
                                                                                } ?>&page=prod2">Buy Now</a>

                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if ($page == 'orders') {
        include './pages/orders.page.php';
    }

    ?>

</body>

</html>