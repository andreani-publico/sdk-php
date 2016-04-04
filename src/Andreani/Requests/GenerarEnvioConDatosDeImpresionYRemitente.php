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
    protected $fechaDesde;
    protected $fechaHasta;
    
    // Sobre el remitente
    protected $nombreRemitente;
    protected $apellidoRemitente;
    protected $tipoDocumentoRemitente;
    protected $numeroDocumentoRemitente;
    protected $mailRemitente;
    protected $telefonoFijoRemitente;
    protected $telefonoCelularRemitente;
    protected $provinciaRemitente;
    protected $localidadRemitente;
    protected $codigoPostalRemitente;
    protected $calleRemitente;
    protected $numeroDomicilioRemitente;
    protected $pisoRemitente;
    protected $departamentoRemitente;
    
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
    protected $provinciaDestinatario;
    protected $localidadDestinatario;
    protected $codigoPostalDestinatario;
    protected $calleDestinatario;
    protected $numeroDomicilioDestinatario;
    protected $pisoDestinatario;
    protected $departamentoDestinatario;

    
    
    public function setDatosRemitente($nombreRemitente = null, $apellidoRemitente = null, $tipoDocumentoRemitente = null, $numeroDocumentoRemitente = null,
            $mailRemitente = null, $telefonoFijoRemitente = null, $telefonoCelularRemitente = null, $provinciaRemitente = null, $localidadRemitente = null,
            $codigoPostalRemitente = null, $calleRemitente = null, $numeroDomicilioRemitente = null, $pisoRemitente = null, $departamentoRemitente = null){
        
        $this->setNombreRemitente($nombreRemitente);
        $this->setApellidoRemitente($apellidoRemitente);
        $this->setTipoDocumentoRemitente($tipoDocumentoRemitente);
        $this->setNumeroDocumentoRemitente($numeroDocumentoRemitente);
        $this->setMailRemitente($mailRemitente);
        $this->setTelefonoFijoRemitente($telefonoFijoRemitente);
        $this->setTelefonoCelularRemitente($telefonoCelularRemitente);
        $this->setProvinciaRemitente($provinciaRemitente);
        $this->setLocalidadRemitente($localidadRemitente);
        $this->setCodigoPostalRemitente($codigoPostalRemitente);
        $this->setCalleRemitente($calleRemitente);
        $this->setNumeroDomicilioRemitente($numeroDomicilioRemitente);
        $this->setPisoRemitente($pisoRemitente);
        $this->setDepartamentoRemitente($departamentoRemitente);
    }
    
    
    
    public function setDatosDestinatario($nombre = null, $apellido = null, $nombreAlternativo = null, $apellidoAlternativo = null, $tipoDeDocumento = null, $numeroDeDocumento = null, $email = null, $telefonoCelular = null, $telefonoFijo = null){
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
    
    public function setDatosTransaccion($contrato = null, $idCliente = null){
        
        $this->setContrato($contrato);
        $this->setIdCliente($idCliente);
        
    }
    
    public function setDatosEnvio($valorDeclaradoConIVA = null, $pesoNetoDelEnvioEnGr = null, $volumenDelEnvioEnCm3 = null,
            $categoriaPeso = null, $detalleProductosEntregar = null, $detalleProductosRetirar = null, $sucursalImposicion = null, $sucursalDeRetiro = null,
            $fechaDesde = null, $fechaHasta = null){
        
        $this->setValorDeclaradoConIVA($valorDeclaradoConIVA);
        $this->setPesoNetoDelEnvioEnGr($pesoNetoDelEnvioEnGr);
        $this->setVolumenDelEnvioEnCm3($volumenDelEnvioEnCm3);
        $this->setCategoriaPeso($categoriaPeso);
        $this->setDetalleProductosEntregar($detalleProductosEntregar);
        $this->setDetalleProductosRetirar($detalleProductosRetirar);
        $this->setSucursalImposicion($sucursalImposicion);
        $this->setSucursalDeRetiro($sucursalDeRetiro);
        $this->setFechaDesde($fechaDesde);
        $this->setFechaHasta($fechaHasta);
        
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

    function getFechaDesde() {
        return $this->fechaDesde;
    }

    function setFechaDesde($fechaDesde) {
        $this->fechaDesde = $fechaDesde;
    }

    function getFechaHasta() {
        return $this->fechaHasta;
    }

    function setFechaHasta($fechaHasta) {
        $this->fechaHasta = $fechaHasta;
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

    function getProvinciaRemitente() {
        return $this->provinciaRemitente;
    }

    function setProvinciaRemitente($provinciaRemitente) {
        $this->provinciaRemitente = $provinciaRemitente;
    }

    function getLocalidadRemitente() {
        return $this->localidadRemitente;
    }

    function setLocalidadRemitente($localidadRemitente) {
        $this->localidadRemitente = $localidadRemitente;
    }

    function getCodigoPostalRemitente() {
        return $this->codigoPostalRemitente;
    }

    function setCodigoPostalRemitente($codigoPostalRemitente) {
        $this->codigoPostalRemitente = $codigoPostalRemitente;
    }

    function getCalleRemitente() {
        return $this->calleRemitente;
    }

    function setCalleRemitente($calleRemitente) {
        $this->calleRemitente = $calleRemitente;
    }

    function getNumeroDomicilioRemitente() {
        return $this->numeroDomicilioRemitente;
    }

    function setNumeroDomicilioRemitente($numeroDomicilioRemitente) {
        $this->numeroDomicilioRemitente = $numeroDomicilioRemitente;
    }

    function getPisoRemitente() {
        return $this->pisoRemitente;
    }

    function setPisoRemitente($pisoRemitente) {
        $this->pisoRemitente = $pisoRemitente;
    }

    function getDepartamentoRemitente() {
        return $this->departamentoRemitente;
    }

    function setDepartamentoRemitente($departamentoRemitente) {
        $this->departamentoRemitente = $departamentoRemitente;
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

    function getProvinciaDestinatario() {
        return $this->provinciaDestinatario;
    }

    function setProvinciaDestinatario($provinciaDestinatario) {
        $this->provinciaDestinatario = $provinciaDestinatario;
    }

    function getLocalidadDestinatario() {
        return $this->localidadDestinatario;
    }

    function setLocalidadDestinatario($localidadDestinatario) {
        $this->localidadDestinatario = $localidadDestinatario;
    }

    function getCodigoPostalDestinatario() {
        return $this->codigoPostalDestinatario;
    }

    function setCodigoPostalDestinatario($codigoPostalDestinatario) {
        $this->codigoPostalDestinatario = $codigoPostalDestinatario;
    }

    function getCalleDestinatario() {
        return $this->calleDestinatario;
    }

    function setCalleDestinatario($calleDestinatario) {
        $this->calleDestinatario = $calleDestinatario;
    }

    function getNumeroDomicilioDestinatario() {
        return $this->numeroDomicilioDestinatario;
    }

    function setNumeroDomicilioDestinatario($numeroDomicilioDestinatario) {
        $this->numeroDomicilioDestinatario = $numeroDomicilioDestinatario;
    }

    function getPisoDestinatario() {
        return $this->pisoDestinatario;
    }

    function setPisoDestinatario($pisoDestinatario) {
        $this->pisoDestinatario = $pisoDestinatario;
    }

    function getDepartamentoDestinatario() {
        return $this->departamentoDestinatario;
    }

    function setDepartamentoDestinatario($departamentoDestinatario) {
        $this->departamentoDestinatario = $departamentoDestinatario;
    }
        
    public function getWebserviceIndex() {
        return 'generar_envio_con_datos_de_impresion_y_remitente';
    }
}
