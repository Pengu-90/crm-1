<?php 
class DbConn {
    protected function connect() {
        try {
            $username = 'root';
        $password = '';

        $conn = new PDO('mysql:host=localhost;dbname=crmama;', $username, $password);
        
        return $conn;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        
    }
}