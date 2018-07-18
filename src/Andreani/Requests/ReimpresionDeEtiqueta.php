<?php

namespace Andreani\Requests;

use Andreani\Resources\WebserviceRequest;

class ReimpresionDeEtiqueta implements WebserviceRequest{

    public $numeroDeEnvio;

    public function getNumeroDeEnvio() {
        return $this->numeroDeEnvio;
    }

    public function setNumeroDeEnvio($numeroDeEnvio) {
        $this->numeroDeEnvio = $numeroDeEnvio;
        return $this;
    }

    public function getWebserviceIndex() {
        return 'reimpresion_etiquetas';
    }

}
