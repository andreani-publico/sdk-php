<?php

namespace Andreani;

use Andreani\Resources\WsseAuthHeader;
use Andreani\Resources\Connection;
use Andreani\Resources\WebserviceRequest;
use Andreani\Resources\SoapArgumentConverter;

class Andreani{
    
    protected $connection;
    protected $configuration;
    
    public function __construct($username,$password,$environment = 'prod') {
        $this->configuration = $this->getConfiguration($environment);
        $this->connection = $this->getConnection($username, $password);
    }
    
    public function call(WebserviceRequest $consulta){
        $index = $consulta->getWebserviceIndex();
        $configuration = $this->configuration->$index;
        $converter = new SoapArgumentConverter();
        
        return $this->connection->call($configuration, $converter->getArgumentChain($consulta));
    }
    
    protected function getConfiguration($environment){
        $configuration = json_decode(file_get_contents(__DIR__ . '/Resources/webservices.json'));
        return $configuration->$environment;
    }
    
    protected function getConnection($username,$password){
        $authHeader = new WsseAuthHeader($username, $password);
        return new Connection($authHeader);
    }
    
}