<?php

namespace Andreani\Requests;

use Andreani\Resources\WebserviceRequest;

class ObtenerEstadoDistribucionBatch implements WebserviceRequest{

    protected $codigoDeCliente;
    protected $referenciaExterna = array();
    protected $numeroDeEnvio = array();

    public function getCodigoDeCliente() {
        return (string) $this->codigoDeCliente;
    }

    public function setCodigoDeCliente($codigoDeCliente) {
        $this->codigoDeCliente = $codigoDeCliente;
        return $this;
    }

    public function getReferenciaExterna($index = 0) {
        return (string) $this->referenciaExterna[$index];
    }

    public function setReferenciaExterna($referenciaExterna, $index) {
        $this->referenciaExterna[$index] = $referenciaExterna;
        return $this;
    }

    public function appendReferenciaExterna($referenciaExterna) {
        $this->referenciaExterna[] = $referenciaExterna;
        return $this;
    }

    public function getNumeroDeEnvio($index = 0) {
        return (string) $this->numeroDeEnvio[$index];
    }

    public function setNumeroDeEnvio($numeroDeEnvio, $index) {
        $this->numeroDeEnvio[$index] = $numeroDeEnvio;
        return $this;
    }

    public function appendNumeroDeEnvio($numeroDeEnvio) {
        $this->numeroDeEnvio[] = $numeroDeEnvio;
        return $this;
    }

    public function count() {
        return count($this->numeroDeEnvio);
    }

    public function getWebserviceIndex() {
        return 'estado_distribucion_batch';
    }

}
