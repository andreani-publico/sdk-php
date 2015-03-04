<?php

namespace Andreani;

use Andreani\Resources\WsseAuthHeader;
use Andreani\Resources\Connection;
use Andreani\Resources\WebserviceRequest;
use Andreani\Resources\SoapArgumentConverter;

class Andreani{
    
    protected $connection;
    protected $configuration;
    
    public function __construct($username,$password,$environment = 'prod',$configurationFile = null) {
        $this->configuration = $this->getConfiguration($environment,$configurationFile);
        $this->connection = $this->getConnection($username, $password);
    }
    
    public function call(WebserviceRequest $consulta){
        $index = $consulta->getWebserviceIndex();
        $configuration = $this->configuration->$index;
        $converter = new SoapArgumentConverter();
        
        return $this->connection->call($configuration, $converter->getArgumentChain($consulta));
    }
    
    protected function getConfiguration($environment, $configurationFile = null){
        $path = $configurationFile?:__DIR__ . '/Resources/webservices.json';
        $configuration = json_decode(file_get_contents($path));
        return $configuration->$environment;
    }
    
    protected function getConnection($username,$password){
        $authHeader = new WsseAuthHeader($username, $password);
        return new Connection($authHeader);
    }
    
}