<?php
class AddCart extends DbConn
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
}
