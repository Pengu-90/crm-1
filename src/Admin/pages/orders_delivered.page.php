<div class="container-fluid px-4">
    <h1 class="mt-4">Orders</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Delivered</li>
    </ol>

    <div class="card mb-4 mx-3 shadow">
        <div class="card-header text-success">
            <i class="fas fa-table me-1"></i>
            <h4>Delivered Orders</h4>
            <h2 class="ps-3 text-dark">
                <?php
                include '../../PHP/includes/fetchDelivered.inc.php'
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
                        <th>Delivered date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../PHP/includes/fetchDeliveredList.inc.php'
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</div>