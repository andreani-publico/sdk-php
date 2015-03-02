<?php

namespace Andreani;

use Andreani\Consultas\Cotizacion;
use Andreani\Consultas\Trazabilidad;
use Andreani\Resources\WsseAuthHeader;
use Andreani\Resources\ArgumentConverter;
use Andreani\Resources\Connection;

class Andreani{
    
    protected $connection;
    protected $converter;
    
    public function __construct($username,$password) {
        $authHeader = new WsseAuthHeader($username, $password);
        $connection = new Connection($authHeader);
        $this->connection = $connection;
        $this->converter = new ArgumentConverter();
    }
    
    /**
     * 
     * @param \Andreani\Consultas\Cotizacion $consulta
     * @return \Andreani\Resources\Response
     */
    public function cotizar(Cotizacion $consulta){
        $arguments = $this->converter->convert($consulta);
        return $this->connection->call('cotizacion', $arguments);
    }
 
    /**
     * 
     * @param \Andreani\Consultas\Trazabilidad $consulta
     * @return \Andreani\Resources\Response
     */
    public function obtenerTrazabilidad(Trazabilidad $consulta){
        $arguments = $this->converter->convert($consulta);
        return $this->connection->call('trazabilidad', $arguments);
    }
    
}