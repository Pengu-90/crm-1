<?php
class Fetch extends DbConn
{
    public function fetchPendingTotal()
    {
        $stmt = $this->connect()->prepare('SELECT `status` FROM `orders_tbl` WHERE `status` = "Pending" GROUP BY `order_number`');
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($stmt->rowCount());
    }

    public function fetchCustomerTotal()
    {
        $stmt = $this->connect()->prepare('SELECT `status` FROM `orders_tbl` GROUP BY `order_number`');
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($stmt->rowCount());
    }

    public function fetchSalesNumTotal()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM `item_tbl`');
        $stmt->execute();

        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            $status = 'Delivered';

            $stmt = $this->connect()->prepare('SELECT SUM(`total_amount`) AS `total` FROM `orders_tbl` INNER JOIN `item_tbl` ON `orders_tbl`.`item_id` = `item_tbl`.`item_id` WHERE`orders_tbl`.`item_id` = ? && `orders_tbl`.`status` = ?');

            $stmt->execute(array($item['item_id'], $status));

            $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($sales[0]['total'] == null) {
                $sales = 0;
?>
                <div class="col-6">
                    <strong class="text-dark"><?php echo $item['product_name'] ?></strong>
                    <div class="d-flex text-dark align-items-center gap-2">
                        <h1 class="text-dark"><?php echo $sales ?></h1>
                        <weak>PHP</weak>

                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-6">
                    <strong class="text-dark"><?php echo $item['product_name'] ?></strong>
                    <div class="d-flex text-dark align-items-center gap-2">
                        <h1 class="text-dark"><?php echo $sales[0]['total'] ?></h1>
                        <weak>PHP</weak>

                    </div>
                </div>
            <?php
            }
        }
    }

    public function fetchSales()
    {
        $status = 'Delivered';

        $stmt = $this->connect()->prepare('SELECT SUM(`total_amount`) AS `total` FROM `orders_tbl` INNER JOIN `item_tbl` ON `orders_tbl`.`item_id` = `item_tbl`.`item_id` WHERE `orders_tbl`.`status` = ?');

        $stmt->execute(array($status));

        $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($sales[0]['total'] == null) {
            $sales = 0;

            echo $sales;
        } else {
            echo $sales[0]['total'];
        }
    }

    public function fetchCancelledTotal()
    {
        $stmt = $this->connect()->prepare('SELECT `status` FROM `orders_tbl` WHERE `status` = "Cancelled"');
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($stmt->rowCount());
    }

    public function fetchProcessTotal()
    {
        $stmt = $this->connect()->prepare('SELECT `status` FROM `orders_tbl` WHERE `status` = "Processing"');
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($stmt->rowCount());
    }

    public function fetchDeliveredTotal()
    {
        $stmt = $this->connect()->prepare('SELECT `status` FROM `orders_tbl` WHERE `status` = "Delivered"');
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($stmt->rowCount());
    }

    public function fetchPendingList()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` WHERE `status` = "Pending"');
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $order) {
            $itemId = $order['item_id'];

            $stmt = $this->connect()->prepare("SELECT * FROM `item_tbl` WHERE `item_id` = ?");

            if (!$stmt->execute(array($itemId))) {
                $stmt = null;
                exit();
            }

            $item = $stmt->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <tr>
                <td>
                    <div class="p-1">
                        <?php echo $order['order_id'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $item[0]['product_name'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $order['quantity'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $order['quantity'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $order['last_name'] . ', ' . $order['first_name'] ?>
                    </div>
                </td>
                <td>
                    <button class="rounded-circle" style="width: 2em; height:2em" data-bs-toggle="modal" data-bs-target="#task_assign" onclick="task(<?php echo $order['cart_id'] ?>, <?php echo $order['order_id'] ?>)">T</button>
                    <button class="rounded-circle" style="width: 2em; height:2em">V</button>
                </td>
            </tr>
        <?php
        }
    }

    public function fetchProcessList()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` WHERE `status` = "Processing"');
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $order) {
            $itemId = $order['item_id'];
            $orderId = $order['order_id'];

            $stmt = $this->connect()->prepare("SELECT * FROM `item_tbl` WHERE `item_id` = ?");

            if (!$stmt->execute(array($itemId))) {
                $stmt = null;
                exit();
            }

            $item = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $this->connect()->prepare("SELECT * FROM `task_tbl` INNER JOIN `employees_tbl` ON `task_tbl`.`admin_id` = `employees_tbl`.`emp_id` WHERE `task_tbl`.`order_id` = ?");

            if (!$stmt->execute(array($orderId))) {
                $stmt = null;
                exit();
            }

            $emp = $stmt->fetchAll(PDO::FETCH_ASSOC);


        ?>
            <tr>
                <td>
                    <div class="p-1">
                        <?php echo $order['order_id'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $item[0]['product_name'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $order['quantity'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $order['last_name'] . ', ' . $order['first_name'] ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $emp[0]['emp_lname'] . ', ' . $emp[0]['emp_fname'] ?>
                    </div>
                </td>
                <td>
                    <button class="rounded-circle" style="width: 2em; height:2em" data-bs-toggle="modal" data-bs-target="#task_assign">S</button>
                    <button class="rounded-circle" style="width: 2em; height:2em">V</button>
                </td>
            </tr>
        <?php
        }
    }

    public function fetchUsers()
    {
        $role = 'user';
        $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` WHERE `Role` = ?");

        if (!$stmt->execute(array($role))) {
            $stmt = null;
            exit();
        }

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $userID = $user['Id'];

            $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` INNER JOIN `customer_details` ON `users_tbl`.`Id` = `customer_details`.`Id` INNER JOIN `contact_tbl` ON `customer_details`.`contact_id` = `contact_tbl`.`contact_id` INNER JOIN `address_tbl` ON `customer_details`.`address_id` = `address_tbl`.`address_id` WHERE `users_tbl`.`Id` = ?");

            if (!$stmt->execute(array($userID))) {
                $stmt = null;
                exit();
            }

            $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
            <tr>
                <td>
                    <div class="p-1">
                        <?php echo $user['Id']; ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $details[0]['last_name']; ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $details[0]['first_name']; ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $details[0]['email']; ?>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#user_detail" onclick="user_details('<?php echo $details[0]['first_name']; ?>','<?php echo $details[0]['last_name']; ?>','<?php echo $details[0]['address_line']; ?>','<?php echo $details[0]['city']; ?>','<?php echo $details[0]['province']; ?>','<?php echo $details[0]['zipcode']; ?>','<?php echo $details[0]['country']; ?>','<?php echo $details[0]['email']; ?>','<?php echo $details[0]['number']; ?>','<?php echo $details[0]['Username']; ?>')">
                        View
                    </button>
                </td>
            </tr>
        <?php
        }
    }

    public function fetchEmp()
    {
        $role = 'employee';
        $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` WHERE `Role` = ?");

        if (!$stmt->execute(array($role))) {
            $stmt = null;
            exit();
        }

        $emps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($emps as $emp) {
            $empId = $emp['Id'];

            $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` INNER JOIN `employees_tbl` ON `users_tbl`.`Id` = `employees_tbl`.`Id` INNER JOIN `contact_tbl` ON `employees_tbl`.`contact_id` = `contact_tbl`.`contact_id` WHERE `users_tbl`.`Id` = ?");

            if (!$stmt->execute(array($empId))) {
                $stmt = null;
                exit();
            }

            $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
            <tr>
                <td>
                    <div class="p-1">
                        <?php echo $emp['Id']; ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $details[0]['emp_lname']; ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $details[0]['emp_fname']; ?>
                    </div>
                </td>
                <td>
                    <div class="p-1">
                        <?php echo $details[0]['email']; ?>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#user_detail" onclick="">
                        View
                    </button>
                </td>
            </tr>
        <?php
        }
    }

    public function fetchAvailableEmp()
    {
        $availability = true;
        $stmt = $this->connect()->prepare("SELECT * FROM `employees_tbl` WHERE `availability` = ?");

        if (!$stmt->execute(array($availability))) {
            $stmt = null;
            exit();
        }

        $emps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($emps as $emp) {
        ?>
            <option value=<?php echo $emp['emp_id'] ?>><?php echo $emp['emp_fname'] . ' ' . $emp['emp_lname'] ?></option>
            <?php
        }
    }

    public function fetchCart($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `cart_tbl` INNER JOIN `customer_details` ON `cart_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `users_tbl`.`Id` = ?");

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            exit();
        }

        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            foreach ($cartItems as $cart) {
                $item = $cart['item_id'];

                $stmt = $this->connect()->prepare("SELECT * FROM `item_tbl` WHERE `item_id` = ?");

                if (!$stmt->execute(array($item))) {
                    $stmt = null;
                    exit();
                }

                $item = $stmt->fetchAll(PDO::FETCH_ASSOC);

            ?>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><?php echo $item[0]['product_name'] ?></td>
                    <td><?php echo $cart['quantity'] ?></td>
                    <td><?php echo $cart['total_amount'] ?></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="delete_cart_item(<?php echo $cart['cart_id'] ?>)">Remove</button>

                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5" class="text-center"><?php echo "Cart is currently empty."; ?></td>
            </tr>

            <?php
        }
    }

    public function fetchAmount($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `cart_tbl` INNER JOIN `customer_details` ON `cart_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `users_tbl`.`Id` = ?");

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            exit();
        }

        $customerId = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($customerId)) {
            $stmt = $this->connect()->prepare("SELECT SUM(total_amount) FROM `cart_tbl` AS `total` WHERE `customer_id` = ?");

            if (!$stmt->execute(array($customerId[0]['customer_id']))) {
                $stmt = null;
                exit();
            }

            $totalAmount = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo $totalAmount[0]['SUM(total_amount)'];
        } else {
            echo 0;
        }
    }

    public function fetchAssignedTask()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `task_tbl`");

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            foreach ($tasks as $task) {
                $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` WHERE `Id` = ?");

                if (!$stmt->execute(array($tasks[0]['admin_id']))) {
                    $stmt = null;
                    exit();
                }

                $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

            ?>
                <tr>
                    <td>
                        <div class="p-1">
                            <?php echo $tasks['task_id']; ?>
                        </div>
                    </td>
                    <td>
                        <div class="p-1">
                            <?php echo $details[0]['last_name']; ?>
                        </div>
                    </td>
                    <td>
                        <div class="p-1">
                            <?php echo $details[0]['first_name']; ?>
                        </div>
                    </td>
                    <td>
                        <div class="p-1">
                            <?php echo $details[0]['email']; ?>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#user_detail" onclick="user_details('<?php echo $details[0]['first_name']; ?>','<?php echo $details[0]['last_name']; ?>','<?php echo $details[0]['address_line']; ?>','<?php echo $details[0]['city']; ?>','<?php echo $details[0]['province']; ?>','<?php echo $details[0]['zipcode']; ?>','<?php echo $details[0]['country']; ?>','<?php echo $details[0]['email']; ?>','<?php echo $details[0]['number']; ?>','<?php echo $details[0]['Username']; ?>')">
                            View
                        </button>
                    </td>
                </tr>
<?php

            }
        } else {
            echo 0;
        }
    }
}
