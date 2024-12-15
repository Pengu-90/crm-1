<?php
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $page = $_GET['page'];
}
?>

<script defer src="./js/script_order.js"></script>

<input type="text" name="user" id="user" value="<?php echo $user ?>" disabled hidden>
<input type="text" name="page" id="page" value="<?php echo $page ?>" disabled hidden>
<div class="pb-5 bg-dark">
    <a href="./main.php?user=<?php echo $user ?>&page=main" class="m-3 btn btn-transparent text-white border">Back to Home</a>
    <div class="row justify-content-center gap-3 w-100">
        <div class="col-xl-9 col-lg-10 col-md-10 col-sm-10 p-4 bg-dark text-white card">
            <h1 class="mb-4">My Orders</h1>

            <div class="bg-dark">
                <?php
                include '../../PHP/includes/fetch_orders.inc.php';

                ?>

            </div>

        </div>
    </div>
</div>