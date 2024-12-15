<!-- <input type="text" name="user" id="user" value="<?php echo $user ?>" disabled hidden> -->

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" id="checkout_form">
                <div class="modal-body">
                    <input type="text" name="user" id="user" value="<?php echo $user ?>" hidden>

                    <table class="table table-dark">
                        <thead>
                            <tr class="border">
                                <th class="t-head">Product</th>
                                <th class="t-head">Quantity</th>
                                <th class="t-head">Total</th>
                                <th class="t-head"></th>
                            </tr>

                        </thead>
                        <?php
                        include '../../PHP/includes/fetch_cart.inc.php';
                        ?>
                    </table>
                </div>
                <div class="modal-footer d-flex justify-content-end p-3">
                    <div>
                        <weak class="me-2">Total amount:</weak>
                        <h5 class="d-inline">
                            <?php
                            include '../../PHP/includes/fetch_amount.inc.php';
                            ?>
                        </h5>
                        <p class="d-inline">PHP</p>

                    </div>
                </div>
                <div class="d-flex justify-content-end px-3 pb-3 gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="add_submit" class="btn btn-primary" type="submit">Place Order</button>

                </div>
            </form>

        </div>
    </div>
</div>