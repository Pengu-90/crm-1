<div class="container-fluid px-4">
    <h1 class="mt-4">Orders</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Processing</li>
    </ol>

    <div class="card mb-4 mx-3 shadow">
        <div class="card-header text-dark">
            <i class="fas fa-table me-1"></i>
            <h4>For Process Orders</h4>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Order id</th>
                        <th>Product Name</th>
                        <th>Order date</th>
                        <th>Customer Name</th>
                        <th>Handled by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../PHP/includes/fetchProcess.inc.php'
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>