<?php

namespace Andreani\Resources;

use Andreani\Resources\WebserviceRequest;
use Andreani\Resources\ArgumentConverter;

class SoapArgumentConverter implements ArgumentConverter{
    
    public function getArgumentChain(WebserviceRequest $consulta){
        if($consulta->getWebserviceIndex() == 'cotizacion') return $this->convertCotizacion($consulta);
        if($consulta->getWebserviceIndex() == 'trazabilidad') return $this->convertTrazabilidad($consulta);
        if($consulta->getWebserviceIndex() == 'impresion_constancia') return $this->convertImpresionConstancia($consulta);
        if($consulta->getWebserviceIndex() == 'estado_distribucion') return $this->convertEstadoDistribucion($consulta);
        if($consulta->getWebserviceIndex() == 'sucursales') return $this->convertSucursales($consulta);
        if($consulta->getWebserviceIndex() == 'confirmacion_compra_con_recibo') return $this->convertConfirmacionCompraConRecibo($consulta);
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
                    'NroPieza' => $consulta->getReferenciaExterna(), 
                    'NroAndreani' => $consulta->getNumeroDeEnvio(), 
                    'CodigoCliente' => $consulta->getCodigoDeCliente(),
                )
            )
        );

        return $arguments;
    }
    
    protected function convertImpresionConstancia($consulta){
        $arguments = array(
            'entities'=> array(
                'ParamImprimirConstancia'=>array('NumeroAndreani'=>$consulta->getNumeroDeEnvio())
            )
        );   
        
        return $arguments;
    }
    
    protected function convertEstadoDistribucion($consulta){
        $arguments = array(
            'Consulta' => array(
                'CodigoCliente' => $consulta->getCodigoDeCliente(),
                'Piezas' => array(
                    'Pieza' => array(
                        'NroPieza' => $consulta->getReferenciaExterna(),
                        'NroAndreani' => $consulta->getNumeroDeEnvio()
                    )
                )
            )
        );

        return $arguments;
    }
    
    protected function convertSucursales($consulta){
        $arguments = array(
            'consulta'=>array(
                'Localidad'=>$consulta->getLocalidad(),
                'CodigoPostal'=>$consulta->getCodigoPostal(),
                'Provincia'=>$consulta->getProvincia()
            )
        );
        
        return $arguments;
    }
    
    protected function convertConfirmacionCompraConRecibo($consulta){
        $arguments = array(
            'compra' => array(
                'Calle' => $consulta->getCalle(),
                'CategoriaDistancia' => $consulta->getCategoriaDistancia(),
                'CategoriaFacturacion' => $consulta->getCategoriaFacturacion(),
                'CategoriaPeso' => $consulta->getCategoriaPeso(),
                'CodigoPostalDestino' =>$consulta->getCodigoPostal(),
                'Contrato' => $consulta->getNumeroDeContrato(),
                'Departamento' =>$consulta->getDepartamento(),
                'DetalleProductosEntrega' => $consulta->getDetalleProductosEntrega(),
                'DetalleProductosRetiro' => $consulta->getDetalleProductosRetiro(),
                'Email' => $consulta->getEmail(),
                'Localidad' =>$consulta->getLocalidad(),
                'NombreApellido' =>$consulta->getNombreYApellido(),
                'NombreApellidoAlternativo' => $consulta->getNombreYApellidoAlternativo(),
                'Numero' => $consulta->getNumero(),
                'NumeroCelular' => $consulta->getNumeroDeCelular(),
                'NumeroDocumento' => $consulta->getNumeroDeDocumento(),
                'NumeroTelefono' => $consulta->getNumeroDeTelefono(),
                'NumeroTransaccion' => $consulta->getNumeroDeTransaccion(),
                'Peso' => $consulta->getPeso(),
                'Piso' => $consulta->getPiso(),
                'Provincia' => $consulta->getProvincia(),
                'SucursalCliente' => $consulta->getSucursalCliente(),
                'SucursalRetiro' => $consulta->getCodigoDeSucursal(),
                'Tarifa' => $consulta->getTarifa(),
                'TipoDocumento' => $consulta->getTipoDeDocumento(),
                'ValorACobrar' => $consulta->getValorACobrar(),
                'ValorDeclarado' => $consulta->getValorDeclarado(),
                'Volumen' => $consulta->getVolumen(),
                'NumeroRecibo' => $consulta->getNumeroDeRecibo()
            )
        );
        
        return $arguments;
    }
    
}