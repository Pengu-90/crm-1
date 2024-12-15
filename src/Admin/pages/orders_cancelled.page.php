<div class="container-fluid px-4">
    <h1 class="mt-4">Orders</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Cancelled</li>
    </ol>

    <div class="card mb-4 mx-3 shadow">
        <div class="card-header text-danger">
            <i class="fas fa-table me-1"></i>
            <h4>Cancelled Orders</h4>
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
                    include '../../PHP/includes/fetchCancelled.inc.php'
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>