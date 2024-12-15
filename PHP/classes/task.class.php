<?php
class Task extends DbConn
{
    public function assignTask($admin, $task, $cartId, $orderId)
    {
        $availability = true;

        $stmt = $this->connect()->prepare("SELECT * FROM `employees_tbl` WHERE `availability` = ?");

        if (!$stmt->execute(array($availability))) {
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
                        $date = date("l, F j, Y");


                        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ?, `date_processed` = ? WHERE `cart_id` = ?");

                        if (!$stmt->execute(array($order_stats, $date, $cartId))) {
                            $stmt = null;
                            exit();
                        }


                        // For Notifications
                        $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `orders_tbl`.`order_id` = ?");

                        if (!$stmt->execute(array($orderId))) {
                            $stmt = null;
                            exit();
                        }

                        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $customerId = $res[0]['Id'];
                        $notifOrder = $res[0]['order_id'];
                        $userType = 'user';
                        $description = 'order_processing';

                        $stmt = $this->connect()->prepare("INSERT INTO `notifications_tbl`(`user_id`, `date`, `type`, `description`, `order_id`) VALUES (?,?,?,?,?)");

                        if (!$stmt->execute(array($customerId, $date, $userType, $description, $notifOrder))) {
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
                    } else if ($taskTotal2[0]['total'] > $taskTotal1[0]['total']) {
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
                        $date = date("l, F j, Y");

                        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

                        if (!$stmt->execute(array($order_stats, $cartId))) {
                            $stmt = null;
                            exit();
                        }




                        // For Notifications
                        $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `orders_tbl`.`order_id` = ?");

                        if (!$stmt->execute(array($orderId))) {
                            $stmt = null;
                            exit();
                        }

                        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $customerId = $res[0]['Id'];
                        $notifOrder = $res[0]['order_id'];
                        $userType = 'user';
                        $description = 'order_processing';

                        $stmt = $this->connect()->prepare("INSERT INTO `notifications_tbl`(`user_id`, `date`, `type`, `description`, `order_id`) VALUES (?,?,?,?,?)");

                        if (!$stmt->execute(array($customerId, $date, $userType, $description, $notifOrder))) {
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
                    $date = date("l, F j, Y");

                    $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

                    if (!$stmt->execute(array($order_stats, $cartId))) {
                        $stmt = null;
                        exit();
                    }




                    // For Notifications
                    $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `orders_tbl`.`order_id` = ?");

                    if (!$stmt->execute(array($orderId))) {
                        $stmt = null;
                        exit();
                    }

                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $customerId = $res[0]['Id'];
                    $notifOrder = $res[0]['order_id'];
                    $userType = 'user';
                    $description = 'order_processing';

                    $stmt = $this->connect()->prepare("INSERT INTO `notifications_tbl`(`user_id`, `date`, `type`, `description`, `order_id`) VALUES (?,?,?,?,?)");

                    if (!$stmt->execute(array($customerId, $date, $userType, $description, $notifOrder))) {
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
            $stmt = $this->connect()->prepare("SELECT COUNT(admin_id) AS total FROM task_tbl WHERE admin_id = ?");
            if (!$stmt->execute(array($admin))) {
                $stmt = null;
                exit();
            }

            $taskTotal = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if ($taskTotal[0]['total'] == 5) {
                $availability = false;

                $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`= ? WHERE `emp_id` = ?");

                if (!$stmt->execute(array($availability, $admin))) {
                    $stmt = null;
                    exit();
                }
            }

            $status = 'Pending';
            $stmt = $this->connect()->prepare("INSERT INTO `task_tbl`(`admin_id`, `order_id`, `task_name`, `status`) VALUES (?,?,?,?)");

            if (!$stmt->execute(array($admin, $orderId, $task, $status))) {
                $stmt = null;
                exit();
            }

            $order_stats = 'Processing';
            $date = date("l, F j, Y");

            $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `cart_id` = ?");

            if (!$stmt->execute(array($order_stats, $cartId))) {
                $stmt = null;
                print_r('a');
                exit();
            }




            // For Notifications
            $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `orders_tbl`.`order_id` = ?");

            if (!$stmt->execute(array($orderId))) {
                $stmt = null;
                exit();
            }

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $customerId = $res[0]['Id'];
            $notifOrder = $res[0]['order_id'];
            $userType = 'user';
            $description = 'order_processing';

            $stmt = $this->connect()->prepare("INSERT INTO `notifications_tbl`(`user_id`, `date`, `type`, `description`, `order_id`) VALUES (?,?,?,?,?)");

            if (!$stmt->execute(array($customerId, $date, $userType, $description, $notifOrder))) {
                $stmt = null;
                exit();
            }



            print_r(true);
        }
    }

    public function shipOrder($orderId)
    {
        $order_stats = 'Shipping';
        $date = date("l, F j, Y");


        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `order_id` = ?");

        if (!$stmt->execute(array($order_stats, $orderId))) {
            $stmt = null;
            exit();
        }


        // For Notifications
        $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `orders_tbl`.`order_id` = ?");

        if (!$stmt->execute(array($orderId))) {
            $stmt = null;
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $customerId = $res[0]['Id'];
        $notifOrder = $res[0]['order_id'];
        $userType = 'user';
        $description = 'order_shipping';

        $stmt = $this->connect()->prepare("INSERT INTO `notifications_tbl`(`user_id`, `date`, `type`, `description`, `order_id`) VALUES (?,?,?,?,?)");

        if (!$stmt->execute(array($customerId, $date, $userType, $description, $notifOrder))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }

    public function deliverOrder($orderId, $empId)
    {
        $order_stats = 'Delivered';
        $date = date("l, F j, Y");


        $stmt = $this->connect()->prepare("UPDATE `orders_tbl` SET `status`= ? WHERE `order_id` = ?");

        if (!$stmt->execute(array($order_stats, $orderId))) {
            $stmt = null;
            exit();
        }



        // For Notifications
        $stmt = $this->connect()->prepare("SELECT * FROM `orders_tbl` INNER JOIN `customer_details` ON `orders_tbl`.`customer_id` = `customer_details`.`customer_id` INNER JOIN `users_tbl` ON `customer_details`.`Id` = `users_tbl`.`Id` WHERE `orders_tbl`.`order_id` = ?");

        if (!$stmt->execute(array($orderId))) {
            $stmt = null;
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $customerId = $res[0]['Id'];
        $notifOrder = $res[0]['order_id'];
        $userType = 'user';
        $description = 'order_delivered';

        $stmt = $this->connect()->prepare("INSERT INTO `notifications_tbl`(`user_id`, `date`, `type`, `description`, `order_id`) VALUES (?,?,?,?,?)");

        if (!$stmt->execute(array($customerId, $date, $userType, $description, $notifOrder))) {
            $stmt = null;
            exit();
        }



        $empStats = true;

        $stmt = $this->connect()->prepare("UPDATE `employees_tbl` SET `availability`=? WHERE `emp_id` = ?");

        if (!$stmt->execute(array($empStats, $empId))) {
            $stmt = null;
            exit();
        }

        $stmt = $this->connect()->prepare("DELETE FROM `task_tbl` WHERE `order_id` = ?");

        if (!$stmt->execute(array($orderId))) {
            $stmt = null;
            exit();
        }

        print_r(true);
    }
}
