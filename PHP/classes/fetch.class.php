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
}
