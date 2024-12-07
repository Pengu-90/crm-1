<div class="modal fade" id="emp_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" id="emp_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="emp_lastname">Lastname</label>
                        <input class="form-control d-block mb-3" type="text" name="emp_lastname" id="emp_lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="emp_firstname">Firstname</label>
                        <input class="form-control d-block mb-3" type="text" name="emp_firstname" id="emp_firstname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="emp_email">Email</label>
                        <input class="form-control d-block mb-3" type="email" name="emp_email" id="emp_email" placeholder="Email"><br>

                    </div>
                    <div class="form-group">
                        <label for="emp_username">Username</label>
                        <input class="form-control d-block mb-3" type="text" name="emp_username" id="emp_username" placeholder="Username">

                    </div>
                    <div class="form-group">
                        <label for="emp_password">Password</label>

                        <input class="form-control d-block mb-3" type="password" name="emp_password" id="emp_password" placeholder="Password">

                    </div>
                    <div class="form-group">
                        <label for="emp_password2">Confirm Password</label>

                        <input class="form-control d-block" type="password" name="emp_password2" id="emp_password2" placeholder="Confirm Password">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100" type="submit" name="submit_emp" id="submit_emp">Add</button>
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>