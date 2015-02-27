<?php

namespace Andreani\Resources;

class Response{
    
    protected $valid;
    protected $message;
    
    public function __construct($message,$isValid = true) {
        $this->setMessage($message);
        $this->setIsValid($isValid);
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
    
    public function setIsValid($isValid){
        $this->valid = $this->isValid();
    }
    
}