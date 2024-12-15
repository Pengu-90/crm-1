<?php
class Fetch extends DbConn
{
    public function fetchNotify($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `notifications_tbl` WHERE `user_id` = ?");

        if (!$stmt->execute(array($id))) {
            $stmt = null;
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $status = null;

        foreach ($res as $verify) {
            if ($verify['isRead'] == false) {
                $status = true;
            } 
        }

        print_r($status);
    }

    public function updateNotify()
    {
        $status = true;
        $stmt = $this->connect()->prepare("UPDATE `notifications_tbl` SET `isRead`= ?");

        if (!$stmt->execute(array($status))) {
            $stmt = null;
        }
    }
}
