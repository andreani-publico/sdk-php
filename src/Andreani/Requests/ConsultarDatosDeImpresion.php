<?php

namespace Andreani\Requests;

use Andreani\Resources\WebserviceRequest;

class ConsultarDatosDeImpresion implements WebserviceRequest{
    
    protected $numeroAndreani;

    public function getNumeroAndreani()
    {
        return $this->numeroAndreani;
    }

    public function setNumeroAndreani($numeroAndreani)
    {
        $this->numeroAndreani = $numeroAndreani;

        return $this;
    }

    public function getWebserviceIndex() {
        return 'consultar_datos_de_impresion';
    }
}