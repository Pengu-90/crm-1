<?php
class SignupController extends Signup
{
    private $lname;
    private $fname;
    private $user;
    private $pwd;

    public function __construct($lastname, $firstname, $user, $pwd)
    {
        $this->lname = $firstname;
        $this->fname = $lastname;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public function signup()
    {
        if ($this->checkEmpty() != false) {
            print_r(false);
            exit();
        }
        $this->signupUser($this->fname, $this->lname, $this->user, $this->pwd);
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
