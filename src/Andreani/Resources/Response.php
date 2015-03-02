<?php

namespace Andreani\Resources;

class Response{
    
    protected $valid;
    protected $message;
    
    public function __construct($message,$valid = true) {
        $this->setMessage($message);
        $this->setValid($valid);
    }
    
    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function isValid(){
        return $this->valid;
    }
    
    public function setValid($valid){
        $this->valid = $valid;
    }
    
}