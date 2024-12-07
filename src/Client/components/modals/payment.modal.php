<div class="modal fade text-dark" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <input type="number" name="amount" id="amount" disabled hidden>
                    Total amount:
                    <h5 class="d-inline-block" id="amount_show">1000</h5>
                    <p class="d-inline">PHP</p>
                </div>
                <select name="method" id="method" class="w-100 form-control mt-2">
                    <option value="1">PayMama</option>
                    <option value="2">GayCash</option>

                </select>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary mt-2 w-100">Select</button>
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>