<div class="modal fade" id="user_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" id="user_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="add_lastname">Lastname</label>
                        <input class="form-control d-block mb-3" type="text" name="add_lastname" id="add_lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="add_firstname">Firstname</label>
                        <input class="form-control d-block mb-3" type="text" name="add_firstname" id="add_firstname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="add_address">Address</label>
                        <input class="form-control d-block mb-3" type="text" name="add_address" id="add_address" placeholder="Address"><br>
                    </div>
                    <div class="form-group">
                        <label for="add_email">Email</label>

                        <input class="form-control d-block mb-3" type="email" name="add_email" id="add_email" placeholder="Email"><br>

                    </div>
                    <div class="form-group">
                        <label for="add_username">Username</label>
                        <input class="form-control d-block mb-3" type="text" name="add_username" id="add_username" placeholder="Username">

                    </div>
                    <div class="form-group">
                        <label for="add_password">Password</label>

                        <input class="form-control d-block mb-3" type="password" name="add_password" id="add_password" placeholder="Password">

                    </div>
                    <div class="form-group">
                        <label for="add_password2">Confirm Password</label>

                        <input class="form-control d-block" type="password" name="add_password2" id="add_password2" placeholder="Confirm Password">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100" type="submit" name="submit_user" id="submit_user">Add</button>
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>