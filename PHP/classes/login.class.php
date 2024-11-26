<?php
class Login extends DbConn
{
    public function loginUser($user, $pwd)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `users_tbl` WHERE `username` = ?");

        if (!$stmt->execute(array($user))) {
            $stmt = null;
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0) {
            $verify_pwd = password_verify($pwd, $user[0]['Password']);
        } else {
            $stmt = null;
            exit();
        }

        if($verify_pwd == false) {
            $stmt = null;
            exit();
        } else {
            session_start();
            $_SESSION['user'] = $user[0]['Id'];
            print_r($user[0]['Role']);
        }
    }
}
