<?php
class CartControl extends Cart
{

    private $qty;
    private $item;
    private $user;
    private $amount;
    private $itemId;

    public function __construct($qty, $item, $user, $amount, $itemId)
    {
        $this->qty = $qty;
        $this->item = $item;
        $this->user = $user;
        $this->amount = $amount;
        $this->itemId = $itemId;
    }

    public function add()
    {
        if ($this->checkEmpty() != false) {
            print_r(false);
            exit();
        } else {
            $this->addToCart($this->qty, $this->item, $this->user, $this->amount);
        }
    }

    public function delete()
    {
        $this->deleteItem($this->itemId);
    }

    public function checkout()
    {
        $this->checkoutCart($this->user);
    }

    private function checkEmpty()
    {
        if (empty($this->qty) || empty($this->item) || empty($this->user) || empty($this->amount)) {
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
}
