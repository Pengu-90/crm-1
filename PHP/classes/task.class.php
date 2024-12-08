<?php
class Task extends DbConn
{
    public function assignTask($admin, $task, $cartId, $orderId)
    {
        $availability = true;

        $stmt = $this->connect()->prepare("SELECT * FROM `employees_tbl` WHERE `availability`");

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        $emps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            exit();
        }

        if ($admin == 'auto') {
            foreach ($emps as $emp) {
                if ($emp['availability'] == true) {
                    $availability = false;

                    $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

                    if (!$stmt->execute(array($availability, $emp['emp_id']))) {
                        $stmt = null;
                        exit();
                    }

                    $status = 'Pending';
                    $stmt = $this->connect()->prepare("INSERT INTO `task_tbl`(`admin_id`, `order_id`, `task_name`, `status`) VALUES (?,?,?,?)");

                    if (!$stmt->execute(array($emp['emp_id'], $orderId, $task, $status))) {
                        $stmt = null;
                        exit();
                    }

                    $order_stats = 'Processing';

                    $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

                    if (!$stmt->execute(array($order_stats, $cartId))) {
                        $stmt = null;
                        print_r('a');
                        exit();
                    }

                    exit();
                }
            }

            print_r(true);
        } else {
            $availability = false;

            $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

            if (!$stmt->execute(array($availability, $admin))) {
                $stmt = null;
                exit();
            }

            $status = 'Pending';
            $stmt = $this->connect()->prepare("INSERT INTO `task_tbl`(`admin_id`, `order_id`, `task_name`, `status`) VALUES (?,?,?,?)");

            if (!$stmt->execute(array($admin, $orderId, $task, $status))) {
                $stmt = null;
                exit();
            }

            $order_stats = 'Processing';

            $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

            if (!$stmt->execute(array($order_stats, $cartId))) {
                $stmt = null;
                print_r('a');
                exit();
            }

            print_r(true);
        }
    }
}
