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
            print_r(false);
        }

        $emps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $empCount = $stmt->rowCount();

        if ($empCount == 0) {
            $stmt = null;
            exit();
        }

        if ($admin == 'auto') {
            for ($i = 0; $i < $empCount; $i++) {
                $stmt = $this->connect()->prepare("SELECT COUNT(admin_id) AS total FROM task_tbl WHERE admin_id = ?");
                if (!$stmt->execute(array($emps[$i]['emp_id']))) {
                    $stmt = null;
                    exit();
                }

                $taskTotal1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $i++;

                if ($i != $empCount) {
                    $stmt = $this->connect()->prepare("SELECT COUNT(admin_id) AS total FROM task_tbl WHERE admin_id = ?");
                    if (!$stmt->execute(array($emps[$i]['emp_id']))) {
                        $stmt = null;
                        exit();
                    }

                    $taskTotal2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($taskTotal2[0]['total'] < $taskTotal1[0]['total']) {
                        //add task
                        $status = 'Pending';
                        $stmt = $this->connect()->prepare("INSERT INTO `task_tbl`(`admin_id`, `order_id`, `task_name`, `status`) VALUES (?,?,?,?)");

                        if (!$stmt->execute(array($emps[$i]['emp_id'], $orderId, $task, $status))) {
                            $stmt = null;
                            exit();
                        }

                        //update the order status
                        $order_stats = 'Processing';

                        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

                        if (!$stmt->execute(array($order_stats, $cartId))) {
                            $stmt = null;
                            exit();
                        }



                        $stmt = $this->connect()->prepare("SELECT COUNT(admin_id) AS total FROM task_tbl WHERE admin_id = ?");
                        if (!$stmt->execute(array($emps[$i]['emp_id']))) {
                            $stmt = null;
                            exit();
                        }

                        $taskTotal2 = $stmt->fetchAll(PDO::FETCH_ASSOC);


                        if ($taskTotal2[0]['total'] == 5) {
                            $availability = false;

                            $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

                            if (!$stmt->execute(array($availability, $emps[$i]['emp_id']))) {
                                $stmt = null;
                                exit();
                            }
                        }

                        break;
                    } else if ($taskTotal2[0]['total'] >= $taskTotal1[0]['total']) {
                        $i--;

                        //add task
                        $status = 'Pending';
                        $stmt = $this->connect()->prepare("INSERT INTO `task_tbl`(`admin_id`, `order_id`, `task_name`, `status`) VALUES (?,?,?,?)");

                        if (!$stmt->execute(array($emps[$i]['emp_id'], $orderId, $task, $status))) {
                            $stmt = null;
                            exit();
                        }

                        //update the order status
                        $order_stats = 'Processing';

                        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

                        if (!$stmt->execute(array($order_stats, $cartId))) {
                            $stmt = null;
                            exit();
                        }



                        $stmt = $this->connect()->prepare("SELECT COUNT(admin_id) AS total FROM task_tbl WHERE admin_id = ?");
                        if (!$stmt->execute(array($emps[$i]['emp_id']))) {
                            $stmt = null;
                            exit();
                        }

                        $taskTotal1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($taskTotal1[0]['total'] == 5) {
                            $availability = false;

                            $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

                            if (!$stmt->execute(array($availability, $emps[$i]['emp_id']))) {
                                $stmt = null;
                                exit();
                            }
                        }

                        break;
                    } else {
                        $i--;
                    }
                } else {
                    $i--;
                    
                    //add task
                    $status = 'Pending';
                    $stmt = $this->connect()->prepare("INSERT INTO `task_tbl`(`admin_id`, `order_id`, `task_name`, `status`) VALUES (?,?,?,?)");

                    if (!$stmt->execute(array($emps[$i]['emp_id'], $orderId, $task, $status))) {
                        $stmt = null;
                        exit();
                    }

                    //update the order status
                    $order_stats = 'Processing';

                    $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

                    if (!$stmt->execute(array($order_stats, $cartId))) {
                        $stmt = null;
                        exit();
                    }



                    $stmt = $this->connect()->prepare("SELECT COUNT(admin_id) AS total FROM task_tbl WHERE admin_id = ?");
                    if (!$stmt->execute(array($emps[$i]['emp_id']))) {
                        $stmt = null;
                        exit();
                    }

                    $taskTotal2 = $stmt->fetchAll(PDO::FETCH_ASSOC);


                    if ($taskTotal2[0]['total'] == 5) {
                        $availability = false;

                        $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

                        if (!$stmt->execute(array($availability, $emps[$i]['emp_id']))) {
                            $stmt = null;
                            exit();
                        }
                    }

                    break;
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

    public function shipOrder($orderId)
    {
        $order_stats = 'Shipping';

        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `order_id` = ?");

        if (!$stmt->execute(array($order_stats, $orderId))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }

    public function deliverOrder($orderId)
    {
        $order_stats = 'Delivered';

        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `order_id` = ?");

        if (!$stmt->execute(array($order_stats, $orderId))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }
}
