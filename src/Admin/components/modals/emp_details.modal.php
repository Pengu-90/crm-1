<div class="modal fade" id="emp_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" id="emp_edit_form">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control mb-3" type="text" name="emp_id_edit" id="emp_id_edit" placeholder="Last Name" disabled hidden>
                    </div>
                    <div class="form-group">
                        <label for="emp_lastname_edit">Lastname</label>
                        <input class="form-control d-block mb-3" type="text" name="emp_lastname_edit" id="emp_lastname_edit" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="emp_firstname_edit">Firstname</label>
                        <input class="form-control d-block mb-3" type="text" name="emp_firstname_edit" id="emp_firstname_edit" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="emp_email_edit">Email</label>
                        <input class="form-control d-block mb-3" type="email" name="emp_email_edit" id="emp_email_edit" placeholder="Email" required><br>

                    </div>
                    <div class="form-group">
                        <label for="emp_username_edit">Username</label>
                        <input class="form-control d-block mb-3" type="text" name="emp_username_edit" id="emp_username_edit" placeholder="Username" required>

                    </div>
                    <div class="form-group">
                        <label for="emp_password_edit">Password</label>
                        <input class="form-control d-block mb-3" type="password" name="emp_password_edit" id="emp_password_edit" placeholder="New Password">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100" type="submit" name="submit_emp" id="submit_emp">Save Chages</button>
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>