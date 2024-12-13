<div class="modal fade" id="ship_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-25" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ship Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="" method="post" id="shipping_form">
                <div class="modal-body">
                    <input type="text" name="shipping_orderId" id="shipping_orderId" disabled hidden>
                    <p>Are you ready to ship this order?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary w-100" type="submit" name="submit_user" id="submit_user">Send to Shipment</button>
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>