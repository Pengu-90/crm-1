<div class="container-fluid px-4">
    <h1 class="mt-4">Employees</h1>

    <div class="card mx-3 my-4 shadow">
        <div class="card-header text-dark">
            <i class="fas fa-table me-1"></i>
            <h4>All Employees</h4>
        </div>

        <button class="btn btn-primary btn-sm mt-3 mx-3" data-bs-toggle="modal" data-bs-target="#emp_add" style="width: 12% !important;">Add Employee</button>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../../PHP/includes/fetch_employee.inc.php';
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</div>