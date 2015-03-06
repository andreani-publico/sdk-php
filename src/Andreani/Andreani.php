<?php

namespace Andreani;

use Andreani\Resources\WsseAuthHeader;
use Andreani\Resources\Connection;
use Andreani\Resources\WebserviceRequest;


class Andreani{
    
    protected $connection;
    protected $configuration;
    protected $argumentConverter;
    
    public function __construct($username,$password,$environment = 'prod',$configurationFile = null) {
        $this->configuration = $this->getConfiguration($environment,$configurationFile);
        $this->connection = $this->getConnection($username, $password);
    }
    
    public function call(WebserviceRequest $consulta){
        $index = $consulta->getWebserviceIndex();
        $configuration = $this->configuration->$index;
        
        return $this->connection->call($configuration, $this->argumentConverter->getArgumentChain($consulta));
    }
    
    protected function getConfiguration($environment, $configurationFile = null){
        $path = $configurationFile?:__DIR__ . '/Resources/config.json';
        $configuration = json_decode(file_get_contents($path));
        $argumentConverterClassname = $configuration->resources->argument_converter;
        $this->argumentConverter = new $argumentConverterClassname();
        return $configuration->webservices->$environment;
    }
    
    protected function getConnection($username,$password){
        $authHeader = new WsseAuthHeader($username, $password);
        return new Connection($authHeader);
    }
    
}