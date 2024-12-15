<?php
class Cart extends DbConn
{
    public function addToCart($qty, $item, $user, $amount)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM `customer_details` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE users_tbl.Id = ?");

        if (!$stmt->execute(array($user))) {
            $stmt = null;
            exit();
        }

        $customerId = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $this->connect()->prepare("INSERT INTO `cart_tbl`(`customer_id`, `item_id`, `quantity`, `total_amount`) VALUES (?,?,?,?)");

        if (!$stmt->execute(array($customerId[0]['customer_id'], $item, $qty, $amount))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }

    public function deleteItem($item)
    {

        $stmt = $this->connect()->prepare("DELETE FROM `cart_tbl` WHERE `cart_id` = ?");

        if (!$stmt->execute(array($item))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }

    public function cancelOrder($item)
    {

        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`='Cancelled' WHERE `order_id` = ?");

        if (!$stmt->execute(array($item))) {
            $stmt = null;
            exit();
        }


        $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `task_tbl` ON `orders_tbl`.`order_id` = `task_tbl`.`order_id` INNER JOIN `employees_tbl` ON `employees_tbl`.`emp_id` = `task_tbl`.`admin_id` WHERE `orders_tbl`.`order_id` = ?");

        if (!$stmt->execute(array($item))) {
            $stmt = null;
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $empId = $res[0]['emp_id'];

        $availability = true;

        $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

        if (!$stmt->execute(array($availability, $empId))) {
            $stmt = null;
            exit();
        }

        $stmt = $this->connect()->prepare("DELETE FROM `task_tbl` WHERE `order_id` = ?");

        if (!$stmt->execute(array($item))) {
            $stmt = null;
            exit();
        }


        print_r(true);
    }

    public function checkoutCart($user)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM `cart_tbl` INNER JOIN `customer_details` ON `cart_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `users_tbl`.`Id` = ?");

        if (!$stmt->execute(array($user))) {
            $stmt = null;
            exit();
        }

        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cart = $items[0]['cart_id'];

        foreach ($items as $item) {
            $customerId = $item['customer_id'];
            $cartId = $item['cart_id'];
            $qty = $item['quantity'];
            $itemId = $item['item_id'];
            $amount = $item['total_amount'];
            $status = 'Pending';

            $date = date("l, F j, Y");

            $stmt = $this->connect()->prepare("INSERT INTO `orders_tbl`(`order_number`, `cart_id`, `quantity`, `item_id`, `customer_id`, `status`, `total_amount`, `date_ordered`) VALUES (?,?,?,?,?,?,?,?)");

            if (!$stmt->execute(array($cart, $cartId, $qty, $itemId, $customerId, $status, $amount, $date))) {
                $stmt = null;
                exit();
            }
        }

        $stmt = $this->connect()->prepare("DELETE FROM `cart_tbl` WHERE `customer_id` = ?");

        if (!$stmt->execute(array($items[0]['customer_id']))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }
}
