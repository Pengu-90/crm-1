<?php
class EditController extends Edit
{
    private $lname;
    private $fname;
    private $user;
    private $pwd;
    private $email;
    private $address;
    private $city;
    private $province;
    private $zip;
    private $country;
    private $contact;
    private $id;

    public function __construct($lastname, $firstname, $user, $pwd, $email, $address, $city, $province, $zip, $country, $contact, $id)
    {
        $this->lname = $lastname;
        $this->fname = $firstname;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->province = $province;
        $this->zip = $zip;
        $this->country = $country;
        $this->contact = $contact;
        $this->id = $id;
    }

    public function editUser()
    {
        $this->updateUser($this->fname, $this->lname, $this->user, $this->pwd, $this->email, $this->address, $this->city, $this->province, $this->zip, $this->country, $this->contact, $this->id);
    }

    public function editEmp()
    {
        $this->updateEmp($this->fname, $this->lname, $this->user, $this->pwd, $this->email, $this->id);
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
