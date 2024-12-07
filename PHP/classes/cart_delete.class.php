<?php
class DeleteCart extends DbConn
{
    public function deleteItem($item, $id)
    {
        
        $stmt = $this->connect()->prepare("DELETE FROM `cart_tbl` WHERE `cart_id` = ?");

        if (!$stmt->execute(array($item))) {
            $stmt = null;
            exit();
        }
        
        print_r(true);
    }
}
