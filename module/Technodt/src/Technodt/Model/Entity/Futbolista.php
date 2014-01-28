<?php

namespace Technodt\Model\Entity;

class Futbolista
 {
     public $idFutbolista;
     public $nombres;
     public $apellido;
     public $nroCamiseta;
     public $cotizacion;
     public $posicionIdPosicion;
     public $clubIdClub;

     public function exchangeArray($data)
     {
         $this->idFutbolista       = (!empty($data['id_futbolista'])) ? $data['id_futbolista'] : null;
         $this->nombres            = (!empty($data['nombres'])) ? $data['nombres'] : null;
         $this->apellido           = (!empty($data['apellido'])) ? $data['apellido'] : null;
         $this->nroCamiseta        = (!empty($data['nro_camiseta'])) ? $data['nro_camiseta'] : null;
         $this->cotizacion         = (!empty($data['cotizacion'])) ? $data['cotizacion'] : null;
         $this->posicionIdPosicion = (!empty($data['posicion_id_posicion'])) ? $data['posicion_id_posicion'] : null;
         $this->clubIdClub         = (!empty($data['club_id_club'])) ? $data['club_id_club'] : null;
     }
 }