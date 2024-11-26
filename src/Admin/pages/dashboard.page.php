<div class="container-fluid px-4">
    <h1 class="mt-4 mb-5">Dashboard</h1>
    <div class="row mx-3 justify-content-center">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4 rounded-0">
                <div class="card-body">
                    <h4>Customers</h4>
                    <h1 class="ps-3">1000000</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <!-- <a class="small text-white stretched-link" href="#"></a> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark mb-4 rounded-0">
                <div class="card-body bg-white rounded">
                    <h5 class="">Pending Orders</h5>
                    <h1 class="ps-3 text-dark">
                        <?php 
                        include '../../PHP/includes/fetchPendingTotal.inc.php'
                        ?>
                    </h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#"></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4 rounded-0">
                <div class="card-body">
                    <h5 class="">Cancelled Orders</h5>
                    <h1 class="ps-3 text-white">100</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#"></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4 rounded-0">
                <div class="card-body">
                    <h5>Delivered</h5>
                    <h1 class="ps-3">1000</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#"></a>
                </div>
            </div>
        </div>

    </div>
    <div class="row mx-3 mt-5 mb-4">
        <div class="col-6">
            <div class="card bg-light text-white mb-4 shadow-sm">
                <div class="card-body">
                    <strong class="text-dark">Total Sales</strong>
                    <h1 class="text-dark">1000000</h1>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card bg-light text-white mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <strong class="text-dark mb-3">Number of Sales</strong>
                        <div class="col-6">
                            <strong class="text-dark">Hex Crystal</strong>
                            <h1 class="text-dark">1000000</h1>
                        </div>
                        <div class="col-6">
                            <strong class="text-dark">Shimmer</strong>
                            <h1 class="text-dark">1000000</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 mx-3 shadow">
        <div class="card-header text-success">
            <i class="fas fa-table me-1"></i>
            <h4>Recent Orders</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="datatablesSimple">
                <thead class="table-dark">
                    <tr>
                        <th>Order id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1200</td>
                        <td>Razor Gaming Chair</td>
                        <td>1</td>
                        <td>Febuary 19, 2024</td>
                        <td>Pending</td>
                        <td><button class="">View</button></td>
                    </tr>
                    <tr>
                        <td>1212</td>
                        <td>Razor Gaming Chair</td>
                        <td>1</td>
                        <td>Febuary 19, 2024</td>
                        <td>Pending</td>
                        <td><button class="">View</button></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


    <!-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div> -->
    <!-- <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div> -->
</div>