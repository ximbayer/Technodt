<?php
namespace Technodt\Model\Entity;

class Calificacion
 {
     public $fechaTorneoIdFechaTorneo;
     public $futbolistaIdFutbolista;
     public $golesConvertidos;
     public $figura;
     public $calificacionPeriodista;
     public $amarillas;
     public $rojas;
     public $penalesConvertivos;
     public $penalesErrados;
     public $golesEnContra;
     public $minimoJugado;

     public function exchangeArray($data)
     {
         $this->fechaTorneoIdFechaTorneo = (!empty($data['fecha_torneo_id_fecha_torneo'])) ? $data['fecha_torneo_id_fecha_torneo'] : null;
         $this->futbolistaIdFutbolista   = (!empty($data['futbolista_id_futbolista'])) ? $data['futbolista_id_futbolista'] : null;
         $this->golesConvertidos         = (!empty($data['goles_convertidos'])) ? $data['goles_convertidos'] : null;
         $this->figura                   = (!empty($data['figura'])) ? $data['figura'] : null;
         $this->calificacionPeriodista   = (!empty($data['calificacion_periodista'])) ? $data['calificacion_periodista'] : null;
         $this->amarillas                = (!empty($data['amarillas'])) ? $data['amarillas'] : null;
         $this->rojas                    = (!empty($data['rojas'])) ? $data['rojas'] : null;
         $this->penalesConvertidos       = (!empty($data['penales_convertidos'])) ? $data['penales_convertidos'] : null;
         $this->penalesErrados           = (!empty($data['penales_errados'])) ? $data['penales_errados'] : null;
         $this->golesEnContra            = (!empty($data['goles_en_contra'])) ? $data['goles_en_contra'] : null;
         $this->minimoJugado             = (!empty($data['minimo_jugado'])) ? $data['minimo_jugado'] : null;
     }
 }