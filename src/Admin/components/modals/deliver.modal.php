<div class="modal fade" id="deliver_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-25" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deliver Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" id="deliver_form">
                <div class="modal-body">
                    <input type="text" name="shipping_orderId" id="deliver_orderId" disabled hidden>
                    <p>Is this item already delivered?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100" type="submit" name="submit_user" id="submit_user">Send to Delivered</button>
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>