<div class="container-fluid px-4">
    <h1 class="mt-4">Orders</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Shipment</li>
    </ol>

    <?php
    if (isset($_GET['role'])) {
    ?>
        <div class="row gap-2 px-3">
            <a class="btn btn-sm card <?php
                                        if (!isset($_GET['view'])) {
                                            echo 'bg-info text-white';
                                        }
                                        ?>" href="./main.php?<?php echo $link_header ?>&page=orders_shipping" style="width: fit-content;border-radius:20px">My Task</a>

            <a class="btn btn-sm card <?php
                                        if (isset($_GET['view'])) {
                                            echo 'bg-info text-white';
                                        }
                                        ?>" href="./main.php?<?php echo $link_header ?>&page=orders_shipping&view=all" style="width: fit-content;border-radius:20px">Show All</a>

        </div>

    <?php
    }
    ?>

    <div class="card mb-4 mx-3 mt-3 shadow">
        <div class="card-header text-dark">
            <i class="fas fa-table me-1"></i>
            <h4>For Shipping Orders</h4>
            <h2 class="ps-3 text-dark">
                <?php
                include '../../PHP/includes/fetchShippingTotal.inc.php'
                ?>
            </h2>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order #</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Order date</th>
                        <!-- <th>Customer Name</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../PHP/includes/fetchShipping.inc.php'
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>