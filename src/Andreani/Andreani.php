<?php

namespace Andreani;

use Andreani\Consultas\Cotizacion;
use Andreani\Consultas\Trazabilidad;
use Andreani\Resources\AuthHeader;
use Andreani\Resources\Connection;

class Andreani{
    
    protected $connection;
    
    public function __construct($username,$password) {
        $authHeader = new AuthHeader($username, $password);
        $connection = new Connection($authHeader);
        $this->connection = $connection;
    }
    
    /**
     * 
     * @param \Andreani\Consultas\Cotizacion $consulta
     * @return \Andreani\Resources\Response
     */
    public function cotizar(Cotizacion $consulta){
        $arguments = array(
            'CPDestino'=> $consulta->getCodigoPostal(),
            'Cliente'=>$consulta->getCodigoDeCliente(),
            'Contrato'=>$consulta->getNumeroDeContrato(),
            'Peso'=>$consulta->getPeso(),
            'SucursalRetiro'=>$consulta->getCodigoDeSucursal(),
            'Volumen'=>$consulta->getVolumen(),
            'ValorDeclarado' => $consulta->getValorDeclarado()
        );
        
        return $this->connection->makeCall('cotizacion', $arguments);
    }
 
    /**
     * 
     * @param \Andreani\Consultas\Trazabilidad $consulta
     * @return \Andreani\Resources\Response
     */
    public function obtenerTrazabilidad(Trazabilidad $consulta){
        $arguments = array(
            'ObtenerTrazabilidad' => array(
                'Pieza' => array(
                    'NroPieza' => $consulta->getNumeroDePieza(), 
                    'NroAndreani' => $consulta->getNumeroDeEnvio(), 
                    'CodigoCliente' => $consulta->getCodigoDeCliente(),
                )
            )
        );
        
        return $this->connection->makeCall('trazabilidad', $arguments);
    }
    
}