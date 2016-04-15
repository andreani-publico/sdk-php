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
        if($consulta->getWebserviceIndex() == 'confirmacion_compra') return $this->convertConfirmacionCompra($consulta);
        if($consulta->getWebserviceIndex() == 'generar_envios_de_entrega_y_retiro_con_datos_de_impresion') return $this->convertGenerarEnviosDeEntregaYRetiroConDatosDeImpresion($consulta);
        if($consulta->getWebserviceIndex() == 'generar_envio_con_datos_de_impresion_y_remitente') return $this->convertGenerarEnvioConDatosDeImpresionYRemitente($consulta);
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
    
    protected function convertConfirmacionCompra($consulta){
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
                'Volumen' => $consulta->getVolumen()
            )
        );

        return $arguments;
    }
    
    protected function convertGenerarEnviosDeEntregaYRetiroConDatosDeImpresion($consulta){
        $arguments = array(
            'parametros' => array(
                'Provincia' =>$consulta->getProvincia(),
                'Localidad' =>$consulta->getLocalidad(),
                'CodigoPostal' =>$consulta->getCodigoPostal(),
                'Calle' =>$consulta->getCalle(),
                'Numero' =>$consulta->getNumero(),
                'Piso' =>$consulta->getPiso(),
                'Departamento' =>$consulta->getDepartamento(),
                'Nombre' =>$consulta->getNombre(),
                'Apellido' =>$consulta->getApellido(),
                'NombreAlternativo' =>$consulta->getNombreAlternativo(),
                'ApellidoAlternativo' =>$consulta->getApellidoAlternativo(),
                'TipoDeDocumento' =>$consulta->getTipoDeDocumento(),
                'NumeroDeDocumento' =>$consulta->getNumeroDeDocumento(),
                'Email' =>$consulta->getEmail(),
                'TelefonoFijo' =>$consulta->getTelefonoFijo(),
                'TelefonoCelular' =>$consulta->getTelefonoCelular(),
                'CategoriaPeso' => $consulta->getCategoriaPeso(),
                'Peso' =>$consulta->getPeso(),
                'DetalleDeProductosAEntregar' =>$consulta->getDetalleDeProductosAEntregar(),
                'DetalleDeProductosARetirar' =>$consulta->getDetalleDeProductosARetirar(),
                'Volumen' => $consulta->getVolumen(),
                'ValorDeclaradoConIva' => $consulta->getValorDeclaradoConIva(),
                'Contrato' => $consulta->getContrato(),
                'IdCliente' => $consulta->getIdCliente(),
                'SucursalDeRetiro' =>$consulta->getSucursalDeRetiro(),
                'SucursalDelCliente' =>$consulta->getSucursalDelCliente()
            )
        );

        return $arguments;
    }
    
    protected function convertGenerarEnvioConDatosDeImpresionYRemitente($consulta){
        $arguments = array(
            'parametros' => array(
                'contrato' =>$consulta->getContrato(),
                'idCliente' =>$consulta->getIdCliente(),
                'ValorDeclaradoConIva' =>$consulta->getValorDeclaradoConIVA(),
                'pesoNetoDelEnvioEnGr' =>$consulta->getPesoNetoDelEnvioEnGr(),
                'volumenDelEnvioEnCm3' =>$consulta->getVolumenDelEnvioEnCm3(),
                'categoriaPeso' =>$consulta->getCategoriaPeso(),
                'detalleProductosEntregar' =>$consulta->getDetalleProductosEntregar(),
                'detalleProductosRetirar' =>$consulta->getDetalleProductosRetirar(),
                'nombreRemitente' =>$consulta->getNombreRemitente(),
                'apellidoRemitente' =>$consulta->getApellidoRemitente(),
                'tipoDocumentoRemitente' =>$consulta->getTipoDocumentoRemitente(),
                'numeroDocumentoRemitente' =>$consulta->getNumeroDocumentoRemitente(),
                'mailRemitente' =>$consulta->getMailRemitente(),
                'telefonoFijoRemitente' =>$consulta->getTelefonoFijoRemitente(),
                'telefonoCelularRemitente' =>$consulta->getTelefonoCelularRemitente(),
                'provinciaRemitente' =>$consulta->getProvinciaRemitente(),
                'localidadRemitente' =>$consulta->getLocalidadRemitente(),
                'codigoPostalRemitente' =>$consulta->getCodigoPostalRemitente(),
                'calleRemitente' =>$consulta->getCalleRemitente(),
                'numeroDomicilioRemitente' =>$consulta->getNumeroDomicilioRemitente(),
                'pisoRemitente' =>$consulta->getPisoRemitente(),
                'departamentoRemitente' =>$consulta->getDepartamentoRemitente(),
                'sucursalImposicion' =>$consulta->getSucursalImposicion(),
                'nombreDestinatario' =>$consulta->getNombreDestinatario(),
                'apellidoDestinatario' =>$consulta->getApellidoDestinatario(),
                'nombreAlternativoDestinatario' =>$consulta->getNombreAlternativoDestinatario(),
                'apellidoAlternativoDestinatario' =>$consulta->getApellidoAlternativoDestinatario(),
                'tipoDocumentoDestinatario' =>$consulta->getTipoDocumentoDestinatario(),
                'numeroDocumentoDestinatario' =>$consulta->getNumeroDocumentoDestinatario(),
                'mailDestinatario' =>$consulta->getMailDestinatario(),
                'telefonoFijoDestinatario' =>$consulta->getTelefonoFijoDestinatario(),
                'telefonoCelularDestinatario' =>$consulta->getTelefonoCelularDestinatario(),
                'provinciaDestinatario' =>$consulta->getProvinciaDestinatario(),
                'localidadDestinatario' =>$consulta->getLocalidadDestinatario(),
                'codigoPostalDestinatario' =>$consulta->getCodigoPostalDestinatario(),
                'calleDestinatario' =>$consulta->getCalleDestinatario(),
                'numeroDomicilioDestinatario' =>$consulta->getNumeroDomicilioDestinatario(),
                'pisoDestinatario' =>$consulta->getPisoDestinatario(),
                'departamentoDestinatario' =>$consulta->getDepartamentoDestinatario(),
                'sucursalRetiro' =>$consulta->getSucursalDeRetiro(),
                'fechaDesde' =>$consulta->getFechaDesde(),
                'fechaHasta' =>$consulta->getFechaHasta(),
                'tarifa' =>$consulta->getTarifa()
            )
        );

        return $arguments;
    }
    
}