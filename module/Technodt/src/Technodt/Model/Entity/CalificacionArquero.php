<?php

namespace Technodt\Model\Entity;

class CalificacionArquero
 {
     public $calificacionFutbolistaIdFutbolista;
     public $calificacionFechaTorneoIdFechaTorneo;
     public $golesRecibidos;
     public $penalesAtajados;

     public function exchangeArray($data)
     {
         $this->calificacionFutbolistaIdFutbolista = (!empty($data['calificacion_futbolista_id_futbolista'])) ? $data['calificacion_futbolista_id_futbolista'] : null;
         $this->calificacionFechaTorneoIdFechaTorneo = (!empty($data['calificacion_fecha_torneo_id_fecha_torneo'])) ? $data['calificacion_fecha_torneo_id_fecha_torneo'] : null;
         $this->golesRecibidos   = (!empty($data['goles_recibidos'])) ? $data['goles_recibidos'] : null;
         $this->penalesAtajados         = (!empty($data['penales_atajados'])) ? $data['penales_atajados'] : null;
     }
 }