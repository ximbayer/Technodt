<?php

namespace Technodt\Model\Entity;

class Partido
 {
     public $IdPartido;
     public $suspendido;
     public $descripcion;
     public $resultadoLocal;
     public $resultadoVisitante;
     public $fechaTorneoIdFechaTorneo;
     public $clubIdClubLocal;
     public $clubIdClubVisitante;

     public function exchangeArray($data)
     {
         $this->idPartido                = (!empty($data['id_partido'])) ? $data['id_partido'] : null;
         $this->suspendido               = (!empty($data['suspendido'])) ? $data['suspendido'] : null;
         $this->descripcion              = (!empty($data['descripcion'])) ? $data['descripcion'] : null;
         $this->resultadoLocal           = (!empty($data['resultado_local'])) ? $data['resultado_local'] : null;
         $this->resultadoVisitante       = (!empty($data['resultado_visitante'])) ? $data['resultado_visitante'] : null;
         $this->fechaTorneoIdFechaTorneo = (!empty($data['fechaTorneo_id_fecha_torneo'])) ? $data['fechaTorneo_id_fecha_torneo'] : null;
         $this->clubIdClubLocal          = (!empty($data['club_id_club_local'])) ? $data['club_id_club_local'] : null;
         $this->clubIdClubVisitante      = (!empty($data['club_id_club_visitante'])) ? $data['club_id_club_visitante'] : null;
     }
 }