<?php
class Signup extends DbConn
{
    public function signupUser($fname, $lname, $user, $pwd)
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


            $stmt = $conn->prepare("INSERT INTO customer_tbl (`first_name`, `last_name`, `Id`) VALUES (?,?,?)");

            if (!$stmt->execute(array($fname, $lname, $userId))) {
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
