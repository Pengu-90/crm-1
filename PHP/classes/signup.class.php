<?php
class Signup extends DbConn
{
    public function signupUser($fname, $lname, $user, $pwd, $email, $address)
    {
        if ($this->checkDuplicate($user) > 0) {
            print_r('duplicate');
            exit();
        } else {
            $conn = $this->connect();

            $stmt = $conn->prepare("INSERT INTO users_tbl (`username`, `password`, `role`) VALUES (?,?,?)");

            $role = 'user';
            $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);

            if (!$stmt->execute(array($user, $pwd_hash, $role))) {
                $stmt = null;
                exit();
            }

            $userId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO `contact_tbl`(`email`) VALUES (?)");

            if (!$stmt->execute(array($email))) {
                $stmt = null;
                exit();
            }

            $contactId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO `address_tbl`(`address_line`) VALUES (?)");

            if (!$stmt->execute(array($address))) {
                $stmt = null;
                exit();
            }

            $addressId = $conn->lastInsertId();


            $stmt = $conn->prepare("INSERT INTO customer_details (`first_name`, `last_name`, `Id`, `contact_id`, `address_id`) VALUES (?,?,?,?,?)");

            if (!$stmt->execute(array($fname, $lname, $userId, $contactId, $addressId))) {
                $stmt = null;
                exit();
            }

            print_r(true);
        }
    }

    private function checkDuplicate($usn)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` WHERE `Username` = ?");
        if (!$stmt->execute(array($usn))) {
            $stmt = null;
            exit();
        }

        $userCheck = $stmt->rowCount();
        return $userCheck;
    }
}
