<?php

namespace Andreani\Resources;

use Andreani\Resources\WebserviceRequest;

class SoapArgumentConverter{
    
    public function getArgumentChain(WebserviceRequest $consulta){
        if($consulta->getWebserviceIndex() == 'cotizacion') return $this->convertCotizacion($consulta);
        if($consulta->getWebserviceIndex() == 'trazabilidad') return $this->convertTrazabilidad ($consulta);
    }
    
    protected function convertCotizacion($consulta){
        $arguments = 
            array(
                'cotizacionEnvio'=>array(
                    'CPDestino'=> $consulta->getCodigoPostal(),
                    'Cliente'=>$consulta->getCodigoDeCliente(),
                    'Contrato'=>$consulta->getNumeroDeContrato(),
                    'Peso'=>$consulta->getPeso(),
                    'SucursalRetiro'=> $consulta->getCodigoDeSucursal(),
                    'Volumen'=>$consulta->getVolumen(),
                    'ValorDeclarado' => $consulta->getValorDeclarado()
                )
            );
        
        return $arguments;
    }
    
    protected function convertTrazabilidad($consulta){
        $arguments = array(
            'ObtenerTrazabilidad' => array(
                'Pieza' => array(
                    'NroPieza' => $consulta->getNumeroDePieza(), 
                    'NroAndreani' => $consulta->getNumeroDeEnvio(), 
                    'CodigoCliente' => $consulta->getCodigoDeCliente(),
                )
            )
        );

        return $arguments;
    }
    
}