<?php

namespace Technodt\Model\Entity;

class FechaTorneo
 {
     public $idFechaTorneo;
     public $fechaCerrada;
     public $ordenFecha;
     public $vedaDesde;
     public $vedaHasta;

     public function exchangeArray($data)
     {
         $this->idFechaTorneo = (!empty($data['id_fecha_torneo'])) ? $data['id_fecha_torneo'] : null;
         $this->fechaCerrada = (!empty($data['fecha_cerrada'])) ? $data['fecha_cerrada'] : null;
         $this->ordenFecha = (!empty($data['orden_fecha'])) ? $data['orden_fecha'] : null;
         $this->vedaDesde = (!empty($data['veda_desde'])) ? $data['veda_desde'] : null;
         $this->vedaHasta = (!empty($data['veda_hasta'])) ? $data['veda_hasta'] : null;
     }
 }