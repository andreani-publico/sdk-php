<?php

namespace Andreani\Consultas;

class Trazabilidad{
    
    protected $numeroDePieza;
    protected $numeroDeEnvio;
    protected $codigoDeCliente;
    
    public function getNumeroDePieza() {
        return $this->numeroDePieza;
    }

    public function setNumeroDePieza($numeroDePieza) {
        $this->numeroDePieza = $numeroDePieza;
        return $this;
    }

    public function getNumeroDeEnvio() {
        return $this->numeroDeEnvio;
    }

    public function setNumeroDeEnvio($numeroDeEnvio) {
        $this->numeroDeEnvio = $numeroDeEnvio;
        return $this;
    }

    public function getCodigoDeCliente() {
        return $this->codigoDeCliente;
    }

    public function setCodigoDeCliente($codigoDeCliente) {
        $this->codigoDeCliente = $codigoDeCliente;
        return $this;
    }

}