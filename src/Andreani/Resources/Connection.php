<?php

 namespace Andreani\Resources;
 use Andreani\Resources\AuthHeader;
 use Andreani\Resources\Response;
 
 class Connection{
     
     protected $configuration;
     protected $authHeader;
     
     public function __construct(AuthHeader $authHeader) {
         $this->authHeader = $authHeader;
         $jsonConfiguration = file_get_contents('webservices.json');
         $this->configuration = json_decode($jsonConfiguration);
     }
     
     public function makeCall($webservice,$arguments){
        try{
            $client = $this->getClient($this->configuration[$webservice]['url']);
            $message = $client->__soapCall($this->configuration[$webservice]['method'], $arguments);
            return new Response($message);
        } catch (\SoapFault $e){
            return new Response($e->getMessage(), false);
        }         
     }
     
     protected function getClient($url){
        $options = array(
            'soap_version' => SOAP_1_2,
            'exceptions' => true,
            'trace' => 1,
            'wdsl_local_copy' => true
        );

        $client         = new \SoapClient($url, $options);		
        $client->__setSoapHeaders(array($this->authHeader));
        
        return $client;
     }
     
 }