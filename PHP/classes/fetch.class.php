<?php
class Fetch extends DbConn
{
    public function fetchPendingTotal()
    {
        $stmt = $this->connect()->prepare('SELECT `status` FROM `orders_tbl` WHERE `status` = "Pending"');
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($stmt->rowCount());
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
?>
            <tr>
                <td><?php echo $order['order_id'] ?></td>
                <td><?php echo $order['Id'] ?></td>
                <td>1</td>
                <td>Febuary 19, 2024</td>
                <td><?php echo $order['last_name'] . ', ' . $order['first_name'] ?></td>
                <td><button class="">View</button></td>
            </tr>
        <?php
        }

        print_r($stmt->rowCount());
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
                <td><button class="btn btn-primary btn-sm">View</button></td>
            </tr>
<?php
        }
    }
}
