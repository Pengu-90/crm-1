<?php
class SignupController extends Signup
{
    private $lname;
    private $fname;
    private $user;
    private $pwd;
    private $email;
    private $address;

    public function __construct($lastname, $firstname, $user, $pwd, $email, $address)
    {
        $this->lname = $firstname;
        $this->fname = $lastname;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->address = $address;
    }

    public function signup()
    {
        if ($this->checkEmpty() != false) {
            print_r(false);
            exit();
        }
        $this->signupUser($this->fname, $this->lname, $this->user, $this->pwd, $this->email, $this->address);
    }

    public function checkEmpty()
    {
        if (empty($this->lname) || empty($this->fname) || empty($this->user) || empty($this->pwd)) {
            $res = true;
            return $res;
        } else {
            $res = false;
            return $res;
        }
    }
}
