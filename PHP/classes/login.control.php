<?php 
class LoginControl extends Login {
    
    private $user;
    private $pwd;

    public function __construct($user, $pwd)
    {
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public function login(){
        if($this->checkEmpty() != false) {
            print_r(false);
            exit();
        }
        else {
            $this->loginUser($this->user, $this->pwd);
        }
    }

    private function checkEmpty() {
        if(empty($this->user) || empty($this->pwd)) {
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
}