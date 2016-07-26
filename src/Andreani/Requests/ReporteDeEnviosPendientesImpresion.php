<?php

namespace Andreani\Requests;

use Andreani\Resources\WebserviceRequest;

class ReporteDeEnviosPendientesImpresion implements WebserviceRequest{

    protected $idCliente;

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
        return $this;
    }

    public function getWebserviceIndex() {
        return 'reporte_de_envios_pendientes_impresion';
    }

}