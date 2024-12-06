<div class="modal fade" id="task_assign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-25" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" id="task_assign_form">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Task: <strong>Process Order</strong></p>
                        <input type="text" name="task_name" id="task_name" value="Process Order" disabled hidden>
                        <input type="text" name="cart_id" id="cart_id" disabled hidden>
                        <input type="text" name="orderId" id="orderId" disabled hidden>
                        <label for="add_lastname">Assign to</label>
                        <select name="admin_list" id="admin_list" class="form-select w-75">
                            <option value="auto">-- Auto assign --</option>
                            <?php
                            include '../../PHP/includes/fetch_available_emp.inc.php'

                            ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100" type="submit" name="submit_user" id="submit_user">Assign task</button>
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>