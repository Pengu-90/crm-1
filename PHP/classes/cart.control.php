<?php 
class CartControl extends AddCart {
    
    private $qty;
    private $item;
    private $user;
    private $amount;

    public function __construct($qty, $item, $user, $amount)
    {
        $this->qty = $qty;
        $this->item = $item;
        $this->user = $user;
        $this->amount = $amount;
    }

    public function add(){
        if($this->checkEmpty() != false) {
            print_r(false);
            exit();
        }
        else {
            $this->addToCart($this->qty, $this->item, $this->user, $this->amount);
        }
    }

    private function checkEmpty() {
        if(empty($this->qty) || empty($this->item) || empty($this->user) || empty($this->amount)) {
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
}