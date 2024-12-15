<input type="text" name="page" id="page" value="<?php echo $page ?>" disabled hidden>

<div class="d-flex pb-5">
    <div class="row justify-content-center gap-3 w-100 mt-5">
        <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 p-4 bg-dark text-white card">
            <h1 class="mb-4">My Orders</h1>

            <div class="bg-dark">
                <div class="border rounded row p-3 mb-2">
                    <form action="" id="cancel_order_form">
                        <div class="row">
                            <div class="col-6">
                                <h5>Shimmer</h5>
                                <p>Order Id: </p>
                                <input type="text" name="id" id="id" hidden>
                            </div>
                            <div class="col-6">
                                <weak>Quantity: </weak>
                                <br>
                                <p>Date Ordered: December 12, 2024</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <weak>Status</weak>
                                <br>
                                <strong>Pending</strong>
                            </div>
                            <div class="col-6">
                                <weak>Date Ordered</weak>
                                <br>
                                <p>December 12, 2024</p>
                            </div>
                        </div>
                        <div class="col-12 d-flex gap-3">
                            <button class="btn btn-danger btn-sm w-25" type="submit">Cancel Order</button>
                            <a class="btn btn-primary btn-sm w-25">View</a>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>