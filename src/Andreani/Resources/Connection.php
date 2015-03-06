<?php

 namespace Andreani\Resources;
 
 use Andreani\Resources\WsseAuthHeader;
 use Andreani\Resources\Response;
 
 class Connection{
     
     protected $configuration;
     protected $authHeader;
     
     public function __construct(WsseAuthHeader $authHeader) {
         $this->authHeader = $authHeader;
     }
     
     public function call($configuration,$arguments){
        try{
            $client = $this->getClient($configuration->url,$configuration->headers);
            $method = $configuration->method;
            if($configuration->message_type == 'external'){
                $message = $client->$method($arguments);
            } else {
                $message = $client->__soapCall($method,$arguments);
            }
            return new Response($message);
        } catch (\SoapFault $e){
            return new Response($e->getMessage(), false);
        }         
     }
     
     protected function getClient($url,$headers = array()){
        $options = array(
            'soap_version' => SOAP_1_2,
            'exceptions' => true,
            'trace' => 1,
            'wdsl_local_copy' => true
        );

        $client         = new \SoapClient($url, $options);		
        if(in_array('auth', $headers)){
            $client->__setSoapHeaders(array($this->authHeader));
        }
        
        return $client;
     }
     
 }