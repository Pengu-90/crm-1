<?php 
class TicketControl extends Ticket {
    
    private $type;
    private $description;

    public function __construct($type, $description)
    {
        $this->type = $type;
        $this->description = $description;
    }

    public function submit_ticket(){
        if($this->checkEmpty() != false) {
            print_r(false);
            exit();
        }
        else {
            $this->submitTicket($this->type, $this->description);
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