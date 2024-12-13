<?php
class Edit extends DbConn
{
    public function updateUser($fname, $lname, $user, $pwd, $email, $address, $city, $province, $zip, $country, $contact, $userId)
    {
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT * FROM `customer_details` WHERE `customer_id` = ?");
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            exit();
        }

        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $contactId = $customer[0]['contact_id'];
        $addressId = $customer[0]['address_id'];
        $id = $customer[0]['Id'];

        // UPDATE CUSTOMER DEETS
        $stmt = $conn->prepare("UPDATE `customer_details` SET `last_name`= ?,`first_name`= ? WHERE `customer_id` = ?");
        if (!$stmt->execute(array($lname, $fname, $userId))) {
            $stmt = null;
            exit();
        }

        // UPDATE CONTACT
        $stmt = $conn->prepare("UPDATE `contact_tbl` SET `email`= ?,`number`= ? WHERE `contact_id` = ?");
        if (!$stmt->execute(array($email, $contact, $contactId))) {
            $stmt = null;
            exit();
        }

        // UPDATE ADDRESS
        $stmt = $conn->prepare("UPDATE `address_tbl` SET `address_line`= ?,`city`= ?,`province`= ?,`zipcode`= ?,`country`= ? WHERE `address_id` = ?");
        if (!$stmt->execute(array($address, $city, $province, $zip, $country, $addressId))) {
            $stmt = null;
            exit();
        }

        // UPDATE USER CREDENTIALS
        $hashPwd = password_hash($pwd, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE `users_tbl` SET `Username`= ?,`Password`= ? WHERE `Id` = ?");
        if (!$stmt->execute(array($user, $hashPwd, $id))) {
            $stmt = null;
            exit();
        }

        print_r($user);
    }

    public function updateEmp($fname, $lname, $user, $pwd, $email, $userId)
    {
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT * FROM `employees_tbl` WHERE `emp_id` = ?");
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            exit();
        }

        $emp = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $contactId = $emp[0]['contact_id'];
        $id = $emp[0]['Id'];

        // UPDATE CUSTOMER DEETS
        $stmt = $conn->prepare("UPDATE `employees_tbl` SET `emp_lname`= ?,`emp_fname`= ? WHERE `emp_id` = ?");
        if (!$stmt->execute(array($lname, $fname, $userId))) {
            $stmt = null;
            exit();
        }

        // UPDATE CONTACT
        $stmt = $conn->prepare("UPDATE `contact_tbl` SET `email`= ? WHERE `contact_id` = ?");
        if (!$stmt->execute(array($email, $contactId))) {
            $stmt = null;
            exit();
        }

        // UPDATE USER CREDENTIALS
        $hashPwd = password_hash($pwd, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE `users_tbl` SET `Username`= ?,`Password`= ? WHERE `Id` = ?");
        if (!$stmt->execute(array($user, $hashPwd, $id))) {
            $stmt = null;
            exit();
        }

        print_r($id);
    }
}
