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
            print_r('a');

            exit();
        } else {
            $this->assignTask($this->admin, $this->task, $this->cartId, $this->orderId);
        }
    }

    private function checkEmpty()
    {
        if (empty($this->admin) || empty($this->task)) {
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
}
