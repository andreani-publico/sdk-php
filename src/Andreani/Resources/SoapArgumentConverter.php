<?php

namespace Andreani\Resources;

use Andreani\Resources\WebserviceRequest;
use Andreani\Resources\ArgumentConverter;

class SoapArgumentConverter implements ArgumentConverter{
    
    public function getArgumentChain(WebserviceRequest $consulta){
        if($consulta->getWebserviceIndex() == 'cotizacion') return $this->convertCotizacion($consulta);
        if($consulta->getWebserviceIndex() == 'trazabilidad') return $this->convertTrazabilidad($consulta);
        if($consulta->getWebserviceIndex() == 'trazabilidad_codificado') return $this->convertTrazabilidadCodificado($consulta);
        if($consulta->getWebserviceIndex() == 'impresion_constancia') return $this->convertImpresionConstancia($consulta);
        if($consulta->getWebserviceIndex() == 'estado_distribucion') return $this->convertEstadoDistribucion($consulta);
        if($consulta->getWebserviceIndex() == 'estado_distribucion_codificado') return $this->convertEstadoDistribucionCodificado($consulta);
        if($consulta->getWebserviceIndex() == 'sucursales') return $this->convertSucursales($consulta);
        if($consulta->getWebserviceIndex() == 'confirmacion_compra') return $this->convertConfirmacionCompra($consulta);
        if($consulta->getWebserviceIndex() == 'generar_envios_de_entrega_y_retiro_con_datos_de_impresion') return $this->convertGenerarEnviosDeEntregaYRetiroConDatosDeImpresion($consulta);
        if($consulta->getWebserviceIndex() == 'anular_envio') return $this->convertAnularEnvio($consulta);
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

    protected function convertTrazabilidadCodificado($consulta){
        $arguments = array(
            'ObtenerTrazabilidadCodificado' => array(
                'NroPieza' => array(
                    'NroPieza' => $consulta->getReferenciaExterna(), 
                    'NroAndreani' => $consulta->getNumeroDeEnvio(), 
                    'CodigoCliente' => $consulta->getCodigoDeCliente(),
                )
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
    
    protected function convertEstadoDistribucionCodificado($consulta) {
        $arguments = array(
            'EnviosConsultas' => array(
                'CodigoCliente' => $consulta->getCodigoDeCliente(),
                'Envios' => array(
                    'Envio' => array(
                        'IdentificadorCliente' => $consulta->getReferenciaExterna(),
                        'NumeroAndreani' => $consulta->getNumeroDeEnvio()
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
    
    public function convertAnularEnvio($consulta){
        $arguments = array(
            'envios'=> array(
                'ParamAnularEnvios'=>array('NumeroAndreani'=>$consulta->getNumeroDeEnvio())
            )
        );   
        
        return $arguments;
    }
    
    protected function convertGenerarEnvioConDatosDeImpresionYRemitente($consulta) {
        
        //  Datos del destinatario
        
        $destinatario = array(
            'apellido' => $consulta->getApellidoDestinatario(),
            'apellidoAlternativo' => $consulta->getApellidoAlternativoDestinatario(),
            'nombre' => $consulta->getNombreDestinatario(),
            'nombreAlternativo' => $consulta->getNombreAlternativoDestinatario()
        );
        if ($consulta->getNumeroDocumentoDestinatario() != null) {
            $destinatario["numeroDeDocumento"] = intval($consulta->getNumeroDocumentoDestinatario());
            if ($consulta->getTipoDocumentoDestinatario() != null) {
                $destinatario["tipoDeDocumento"] = $consulta->getTipoDocumentoDestinatario();
            } else {
                $destinatario["tipoDeDocumento"] = 'DNI';
            }
        }
        if ($consulta->getMailDestinatario() != null) {
            $destinatario["email"] = $consulta->getMailDestinatario();
        }
        if ($consulta->getTelefonoFijoDestinatario() != null || $consulta->getTelefonoCelularDestinatario() != null) {
            $destinatario["telefonos"]["Telefono"] = array();
            if ($consulta->getTelefonoFijoDestinatario() != null) {
                $destinatario["telefonos"]["Telefono"][] = array(
                    'numero' => intval($consulta->getTelefonoFijoDestinatario()),
                    'tipo' => "casa"
                );
            }
            if ($consulta->getTelefonoCelularDestinatario() != null) {
                $destinatario["telefonos"]["Telefono"][] = array(
                    'numero' => intval($consulta->getTelefonoCelularDestinatario()),
                    'tipo' => "movil"
                );
            }
        }
        //  Datos del destino
        
        $destino = array(
            'calle' => $consulta->getCalleDestino(),
            'departamento' => $consulta->getDepartamentoDestino(),
            'localidad' => $consulta->getLocalidadDestino(),
            'pais' => $consulta->getPaisDestino(),
            'piso' => $consulta->getPisoDestino(),
            'provincia' => $consulta->getProvinciaDestino()
        );
        if ($consulta->getNumeroDomicilioDestino() != null) {
            $destino["alturaDeDomicilio"] = $consulta->getNumeroDomicilioDestino();
        }
        if ($consulta->getCodigoPostalDestino() != null) {
            $destino["codigoPostal"] = $consulta->getCodigoPostalDestino();
        }
        
        //  Datos del Remitente 
        
        $remitente = array(
            'apellido' => $consulta->getApellidoRemitente(),
            'apellidoAlternativo' => $consulta->getApellidoAlternativoRemitente(),
            'nombre' => $consulta->getNombreRemitente(),
            'nombreAlternativo' => $consulta->getNombreAlternativoRemitente(),
            'telefonos' => array(
                'Telefono' => array(
                    'numero' => intval($consulta->getTelefonoFijoRemitente()? : 0),
                    'tipo' => "casa"
                ),
                'Telefono' => array(
                    'numero' => intval($consulta->getTelefonoCelularRemitente()? : 0),
                    'tipo' => "movil"
                )
            ),
        );
        if ($consulta->getNumeroDocumentoRemitente() != null) {
            $remitente["numeroDeDocumento"] = intval($consulta->getNumeroDocumentoRemitente());
            if ($consulta->getTipoDocumentoRemitente() != null) {
                $remitente["tipoDeDocumento"] = $consulta->getTipoDocumentoRemitente();
            } else {
                $remitente["tipoDeDocumento"] = 'DNI';
            }
        }
        if ($consulta->getMailRemitente() != null) {
            $remitente["email"] = $consulta->getMailRemitente();
        }
        
        //  Datos del origen
        
        $origen = array(
            'calle' => $consulta->getCalleOrigen(),
            'departamento' => $consulta->getDepartamentoOrigen(),
            'localidad' => $consulta->getLocalidadOrigen(),
            'pais' => $consulta->getPaisOrigen(),
            'piso' => $consulta->getPisoOrigen(),
            'provincia' => $consulta->getProvinciaOrigen()
        );
        if ($consulta->getNumeroDomicilioOrigen() != null) {
            $origen["alturaDeDomicilio"] = $consulta->getNumeroDomicilioOrigen();
        }
        if ($consulta->getCodigoPostalOrigen() != null) {
            $origen["codigoPostal"] = $consulta->getCodigoPostalOrigen();
        }
        //  Argumentos a enviar al web service
        
        $arguments = array(
            'parametros' => array(
                'contrato' => $consulta->getContrato(),
                'destinatario' => $destinatario,
                'destino' => $destino,
                'detalleDeProductoAEntregar' => $consulta->getDetalleProductosEntregar(),
                'detalleDeProductosARetirar' => $consulta->getDetalleProductosRetirar(),
                'fechasPactadas' => $consulta->getFechasPactadas(),
                'idCliente' => $consulta->getIdCliente(),
                'origen' => $origen,
                'pesoNetoDelEnvioEnGr' => $consulta->getPesoNetoDelEnvioEnGr(),
                'remitente' => $remitente,
                'tarifa' => intval($consulta->getTarifa()),
                'valorDeclaradoConIva' => doubleval($consulta->getValorDeclaradoConIVA()),
                'volumenDelEnvioEnCm3' => intval($consulta->getVolumenDelEnvioEnCm3()),
                'sucursalDeImposicion' => intval($consulta->getSucursalImposicion())
            )
        );
        if ($consulta->getCategoriaPeso() != null) {
            $arguments["parametros"]["categoriaDePeso"] = $consulta->getCategoriaPeso();
        }
        if ($consulta->getSucursalDeRetiro() != null) {
            $arguments["parametros"]["sucursalDeRetiro"] = intval($consulta->getSucursalDeRetiro());
        }
        
        return $arguments;
    }
    
}