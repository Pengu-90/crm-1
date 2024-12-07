<div class="container-fluid px-4">
    <h1 class="mt-4">Tickets</h1>

    <div class="card mx-3 my-4 shadow">
        <div class="card-header text-dark">
            <i class="fas fa-table me-1"></i>
            <h4>All Tickets</h4>
        </div>

        <!-- <button class="btn btn-primary btn-sm mt-3 mx-3" data-bs-toggle="modal" data-bs-target="#user_add" style="width: 10% !important;">Add User</button> -->

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
                    include '../../PHP/includes/fetch_users.inc.php';
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</div>