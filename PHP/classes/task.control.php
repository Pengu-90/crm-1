<?php
class TaskControl extends Task
{

    private $admin;
    private $task;
    private $cartId;
    private $orderId;

    public function __construct($admin, $task, $cartId, $orderId)
    {
        $this->admin = $admin;
        $this->task = $task;
        $this->cartId = $cartId;
        $this->orderId = $orderId;
    }

    public function assign()
    {
        if ($this->checkEmpty() != false) {
            print_r(false);

            exit();
        } else {
            $this->assignTask($this->admin, $this->task, $this->cartId, $this->orderId);
        }
    }

    public function ship()
    {
        if ($this->checkEmptyShipment() != false) {
            print_r(false);
            exit();
        } else {
            $this->shipOrder($this->orderId);
        }
    }

    public function deliver()
    {
        if ($this->checkEmptyShipment() != false) {
            print_r(false);
            exit();
        } else {
            $this->deliverOrder($this->orderId, $this->admin);
        }
    }

    private function checkEmpty()
    {
        if (empty($this->admin) || empty($this->task) || empty($this->cartId) || empty($this->orderId)) {
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }

    private function checkEmptyShipment()
    {
        if (empty($this->orderId)) {
            return true;
        } else {
            return false;
        }
    }
}
