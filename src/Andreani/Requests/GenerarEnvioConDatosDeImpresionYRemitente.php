<?php

namespace Andreani\Requests;

use Andreani\Resources\WebserviceRequest;

class GenerarEnvioConDatosDeImpresionYRemitente implements WebserviceRequest{
    
    // Sobre la transacción
    protected $contrato;
    protected $idCliente;
    
    // Sobre el envio
    protected $valorDeclaradoConIVA;
    protected $pesoNetoDelEnvioEnGr;
    protected $volumenDelEnvioEnCm3;
    protected $categoriaPeso;
    protected $detalleProductosEntregar;
    protected $detalleProductosRetirar;
    protected $sucursalImposicion;
    protected $sucursalDeRetiro;
    
    protected $fechasPactadas; //array('LapsoDeTiempo' =>array('desde' =>$consulta->getFechaDesde(),'hasta' =>$consulta->getFechaHasta(),)),
    protected $tarifa;
    
    // Sobre el remitente
    protected $nombreRemitente;
    protected $apellidoRemitente;
    protected $nombreAlternativoRemitente;
    protected $apellidoAlternativoRemitente;
    protected $tipoDocumentoRemitente;
    protected $numeroDocumentoRemitente;
    protected $mailRemitente;
    protected $telefonoFijoRemitente;
    protected $telefonoCelularRemitente;
    
    // Sobre el origen
    protected $provinciaOrigen;
    protected $localidadOrigen;
    protected $codigoPostalOrigen;
    protected $calleOrigen;
    protected $numeroDomicilioOrigen;
    protected $pisoOrigen;
    protected $departamentoOrigen;
    protected $paisOrigen;
    
    // Sobre el destinatario
    protected $nombreDestinatario;
    protected $apellidoDestinatario;
    protected $nombreAlternativoDestinatario;
    protected $apellidoAlternativoDestinatario;
    protected $tipoDocumentoDestinatario;
    protected $numeroDocumentoDestinatario;
    protected $mailDestinatario;
    protected $telefonoFijoDestinatario;
    protected $telefonoCelularDestinatario;
    
    // Sobre el destino
    protected $provinciaDestino;
    protected $localidadDestino;
    protected $codigoPostalDestino;
    protected $calleDestino;
    protected $numeroDomicilioDestino;
    protected $pisoDestino;
    protected $departamentoDestino;
    protected $paisDestino;

    
    
    public function setDatosRemitente($nombreRemitente = null, $apellidoRemitente = null, $nombreAlternativo = null, $apellidoAlternativo = null, $tipoDocumentoRemitente = null, 
            $numeroDocumentoRemitente = null, $mailRemitente = null, $telefonoFijoRemitente = null, $telefonoCelularRemitente = null){
        
        $this->setNombreRemitente($nombreRemitente);
        $this->setApellidoRemitente($apellidoRemitente);
        $this->setNombreAlternativoRemitente($nombreAlternativo);
        $this->setApellidoAlternativoRemitente($apellidoAlternativo);
        $this->setTipoDocumentoRemitente($tipoDocumentoRemitente);
        $this->setNumeroDocumentoRemitente($numeroDocumentoRemitente);
        $this->setMailRemitente($mailRemitente);
        $this->setTelefonoFijoRemitente($telefonoFijoRemitente);
        $this->setTelefonoCelularRemitente($telefonoCelularRemitente);
    }
    
    
    public function setDatosOrigen($provincia = null, $localidad = null, $codigoPostal = null, 
            $calle = null, $numeroDomicilio = null, $piso = null, $departamento = null, $pais = null){
        
        $this->setProvinciaOrigen($provincia);
        $this->setLocalidadOrigen($localidad);
        $this->setCodigoPostalOrigen($codigoPostal);
        $this->setCalleOrigen($calle);
        $this->setNumeroDomicilioOrigen($numeroDomicilio);
        $this->setPisoOrigen($piso);
        $this->setDepartamentoOrigen($departamento);
        $this->setPaisOrigen($pais);
    }
    
    
    
    public function setDatosDestinatario($nombre = null, $apellido = null, $nombreAlternativo = null, $apellidoAlternativo = null, 
            $tipoDeDocumento = null, $numeroDeDocumento = null, $email = null, $telefonoCelular = null, $telefonoFijo = null){
        $this->setNombreDestinatario($nombre);
        $this->setApellidoDestinatario($apellido);
        $this->setNombreAlternativoDestinatario($nombreAlternativo);
        $this->setApellidoAlternativoDestinatario($apellidoAlternativo);
        $this->setTipoDocumentoDestinatario($tipoDeDocumento);
        $this->setNumeroDocumentoDestinatario($numeroDeDocumento);
        $this->setMailDestinatario($email);
        $this->setTelefonoCelularDestinatario($telefonoCelular);
        $this->setTelefonoFijoDestinatario($telefonoFijo);
    }
    
    
    public function setDatosDestino($provincia = null, $localidad = null, $codigoPostal = null, 
            $calle = null, $numeroDomicilio = null, $piso = null, $departamento = null, $pais = null){
        $this->setProvinciaDestino($provincia);
        $this->setLocalidadDestino($localidad);
        $this->setCodigoPostalDestino($codigoPostal);
        $this->setCalleDestino($calle);
        $this->setNumeroDomicilioDestino($numeroDomicilio);
        $this->setPisoDestino($piso);
        $this->setDepartamentoDestino($departamento);
        $this->setPaisDestino($pais);
    }
    
    public function setDatosTransaccion($contrato = null, $idCliente = null){
        
        $this->setContrato($contrato);
        $this->setIdCliente($idCliente);
        
    }
    
    public function setDatosEnvio($valorDeclaradoConIVA = null, $pesoNetoDelEnvioEnGr = null, $volumenDelEnvioEnCm3 = null,
            $categoriaPeso = null, $detalleProductosEntregar = null, $detalleProductosRetirar = null, $sucursalImposicion = null, $sucursalDeRetiro = null,
            $fechasPactadas = null, $tarifa = null){
        
        $this->setValorDeclaradoConIVA($valorDeclaradoConIVA);
        $this->setPesoNetoDelEnvioEnGr($pesoNetoDelEnvioEnGr);
        $this->setVolumenDelEnvioEnCm3($volumenDelEnvioEnCm3);
        $this->setCategoriaPeso($categoriaPeso);
        $this->setDetalleProductosEntregar($detalleProductosEntregar);
        $this->setDetalleProductosRetirar($detalleProductosRetirar);
        $this->setSucursalImposicion($sucursalImposicion);
        $this->setSucursalDeRetiro($sucursalDeRetiro);
        $this->setFechasPactadas($fechasPactadas);
        $this->setTarifa($tarifa);
        
    }
    

    
    function getContrato() {
        return $this->contrato;
    }

    function setContrato($contrato) {
        $this->contrato = $contrato;
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function getValorDeclaradoConIVA() {
        return $this->valorDeclaradoConIVA;
    }

    function setValorDeclaradoConIVA($valorDeclaradoConIVA) {
        $this->valorDeclaradoConIVA = $valorDeclaradoConIVA;
    }

    function getPesoNetoDelEnvioEnGr() {
        return $this->pesoNetoDelEnvioEnGr;
    }

    function setPesoNetoDelEnvioEnGr($pesoNetoDelEnvioEnGr) {
        $this->pesoNetoDelEnvioEnGr = $pesoNetoDelEnvioEnGr;
    }

    function getVolumenDelEnvioEnCm3() {
        return $this->volumenDelEnvioEnCm3;
    }

    function setVolumenDelEnvioEnCm3($volumenDelEnvioEnCm3) {
        $this->volumenDelEnvioEnCm3 = $volumenDelEnvioEnCm3;
    }

    function getCategoriaPeso() {
        return $this->categoriaPeso;
    }

    function setCategoriaPeso($categoriaPeso) {
        $this->categoriaPeso = $categoriaPeso;
    }

    function getDetalleProductosEntregar() {
        return $this->detalleProductosEntregar;
    }

    function setDetalleProductosEntregar($detalleProductosEntregar) {
        $this->detalleProductosEntregar = $detalleProductosEntregar;
    }

    function getDetalleProductosRetirar() {
        return $this->detalleProductosRetirar;
    }

    function setDetalleProductosRetirar($detalleProductosRetirar) {
        $this->detalleProductosRetirar = $detalleProductosRetirar;
    }

    function getSucursalImposicion() {
        return $this->sucursalImposicion;
    }

    function setSucursalImposicion($sucursalImposicion) {
        $this->sucursalImposicion = $sucursalImposicion;
    }

    function getSucursalDeRetiro() {
        return $this->sucursalDeRetiro;
    }

    function setSucursalDeRetiro($sucursalDeRetiro) {
        $this->sucursalDeRetiro = $sucursalDeRetiro;
    }

    function getFechasPactadas() {
        return $this->fechasPactadas;
    }

    function setFechasPactadas($fechasPactadas) {
        $this->fechasPactadas = $fechasPactadas;
    }

    function getNombreRemitente() {
        return $this->nombreRemitente;
    }

    function setNombreRemitente($nombreRemitente) {
        $this->nombreRemitente = $nombreRemitente;
    }

    function getApellidoRemitente() {
        return $this->apellidoRemitente;
    }

    function setApellidoRemitente($apellidoRemitente) {
        $this->apellidoRemitente = $apellidoRemitente;
    }

    function getNombreAlternativoRemitente() {
        return $this->nombreAlternativoRemitente;
    }

    function setNombreAlternativoRemitente($nombreAlternativoRemitente) {
        $this->nombreAlternativoRemitente = $nombreAlternativoRemitente;
    }

    function getApellidoAlternativoRemitente() {
        return $this->apellidoAlternativoRemitente;
    }

    function setApellidoAlternativoRemitente($apellidoAlternativoRemitente) {
        $this->apellidoAlternativoRemitente = $apellidoAlternativoRemitente;
    }

    function getTipoDocumentoRemitente() {
        return $this->tipoDocumentoRemitente;
    }

    function setTipoDocumentoRemitente($tipoDocumentoRemitente) {
        $this->tipoDocumentoRemitente = $tipoDocumentoRemitente;
    }

    function getNumeroDocumentoRemitente() {
        return $this->numeroDocumentoRemitente;
    }

    function setNumeroDocumentoRemitente($numeroDocumentoRemitente) {
        $this->numeroDocumentoRemitente = $numeroDocumentoRemitente;
    }

    function getMailRemitente() {
        return $this->mailRemitente;
    }

    function setMailRemitente($mailRemitente) {
        $this->mailRemitente = $mailRemitente;
    }

    function getTelefonoFijoRemitente() {
        return $this->telefonoFijoRemitente;
    }

    function setTelefonoFijoRemitente($telefonoFijoRemitente) {
        $this->telefonoFijoRemitente = $telefonoFijoRemitente;
    }

    function getTelefonoCelularRemitente() {
        return $this->telefonoCelularRemitente;
    }

    function setTelefonoCelularRemitente($telefonoCelularRemitente) {
        $this->telefonoCelularRemitente = $telefonoCelularRemitente;
    }

    function getProvinciaOrigen() {
        return $this->provinciaOrigen;
    }

    function setProvinciaOrigen($provinciaOrigen) {
        $this->provinciaOrigen = $provinciaOrigen;
    }

    function getLocalidadOrigen() {
        return $this->localidadOrigen;
    }

    function setLocalidadOrigen($localidadOrigen) {
        $this->localidadOrigen = $localidadOrigen;
    }

    function getCodigoPostalOrigen() {
        return $this->codigoPostalOrigen;
    }

    function setCodigoPostalOrigen($codigoPostalOrigen) {
        $this->codigoPostalOrigen = $codigoPostalOrigen;
    }

    function getCalleOrigen() {
        return $this->calleOrigen;
    }

    function setCalleOrigen($calleOrigen) {
        $this->calleOrigen = $calleOrigen;
    }

    function getNumeroDomicilioOrigen() {
        return $this->numeroDomicilioOrigen;
    }

    function setNumeroDomicilioOrigen($numeroDomicilioOrigen) {
        $this->numeroDomicilioOrigen = $numeroDomicilioOrigen;
    }

    function getPisoOrigen() {
        return $this->pisoOrigen;
    }

    function setPisoOrigen($pisoOrigen) {
        $this->pisoOrigen = $pisoOrigen;
    }

    function getDepartamentoOrigen() {
        return $this->departamentoOrigen;
    }

    function setDepartamentoOrigen($departamentoOrigen) {
        $this->departamentoOrigen = $departamentoOrigen;
    }

    function getPaisOrigen() {
        return $this->paisOrigen;
    }

    function setPaisOrigen($paisOrigen) {
        $this->paisOrigen = $paisOrigen;
    }
        
    function getNombreDestinatario() {
        return $this->nombreDestinatario;
    }

    function setNombreDestinatario($nombreDestinatario) {
        $this->nombreDestinatario = $nombreDestinatario;
    }

    function getApellidoDestinatario() {
        return $this->apellidoDestinatario;
    }

    function setApellidoDestinatario($apellidoDestinatario) {
        $this->apellidoDestinatario = $apellidoDestinatario;
    }

    function getNombreAlternativoDestinatario() {
        return $this->nombreAlternativoDestinatario;
    }

    function setNombreAlternativoDestinatario($nombreAlternativoDestinatario) {
        $this->nombreAlternativoDestinatario = $nombreAlternativoDestinatario;
    }

    function getApellidoAlternativoDestinatario() {
        return $this->apellidoAlternativoDestinatario;
    }

    function setApellidoAlternativoDestinatario($apellidoAlternativoDestinatario) {
        $this->apellidoAlternativoDestinatario = $apellidoAlternativoDestinatario;
    }

    function getTipoDocumentoDestinatario() {
        return $this->tipoDocumentoDestinatario;
    }

    function setTipoDocumentoDestinatario($tipoDocumentoDestinatario) {
        $this->tipoDocumentoDestinatario = $tipoDocumentoDestinatario;
    }

    function getNumeroDocumentoDestinatario() {
        return $this->numeroDocumentoDestinatario;
    }

    function setNumeroDocumentoDestinatario($numeroDocumentoDestinatario) {
        $this->numeroDocumentoDestinatario = $numeroDocumentoDestinatario;
    }

    function getMailDestinatario() {
        return $this->mailDestinatario;
    }

    function setMailDestinatario($mailDestinatario) {
        $this->mailDestinatario = $mailDestinatario;
    }

    function getTelefonoFijoDestinatario() {
        return $this->telefonoFijoDestinatario;
    }

    function setTelefonoFijoDestinatario($telefonoFijoDestinatario) {
        $this->telefonoFijoDestinatario = $telefonoFijoDestinatario;
    }

    function getTelefonoCelularDestinatario() {
        return $this->telefonoCelularDestinatario;
    }

    function setTelefonoCelularDestinatario($telefonoCelularDestinatario) {
        $this->telefonoCelularDestinatario = $telefonoCelularDestinatario;
    }

    function getProvinciaDestino() {
        return $this->provinciaDestino;
    }

    function setProvinciaDestino($provinciaDestino) {
        $this->provinciaDestino = $provinciaDestino;
    }

    function getLocalidadDestino() {
        return $this->localidadDestino;
    }

    function setLocalidadDestino($localidadDestino) {
        $this->localidadDestino = $localidadDestino;
    }

    function getCodigoPostalDestino() {
        return $this->codigoPostalDestino;
    }

    function setCodigoPostalDestino($codigoPostalDestino) {
        $this->codigoPostalDestino = $codigoPostalDestino;
    }

    function getCalleDestino() {
        return $this->calleDestino;
    }

    function setCalleDestino($calleDestino) {
        $this->calleDestino = $calleDestino;
    }

    function getNumeroDomicilioDestino() {
        return $this->numeroDomicilioDestino;
    }

    function setNumeroDomicilioDestino($numeroDomicilioDestino) {
        $this->numeroDomicilioDestino = $numeroDomicilioDestino;
    }

    function getPisoDestino() {
        return $this->pisoDestino;
    }

    function setPisoDestino($pisoDestino) {
        $this->pisoDestino = $pisoDestino;
    }

    function getDepartamentoDestino() {
        return $this->departamentoDestino;
    }

    function setDepartamentoDestino($departamentoDestino) {
        $this->departamentoDestino = $departamentoDestino;
    }
    
    function getPaisDestino() {
        return $this->paisDestino;
    }

    function setPaisDestino($paisDestino) {
        $this->paisDestino = $paisDestino;
    }
    
    function getTarifa() {
        return $this->tarifa;
    }

    function setTarifa($tarifa) {
        $this->tarifa = $tarifa;
    }
        
    public function getWebserviceIndex() {
        return 'generar_envio_con_datos_de_impresion_y_remitente';
    }
}
