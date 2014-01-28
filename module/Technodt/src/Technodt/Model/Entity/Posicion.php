<?php

namespace Technodt\Model\Entity;

class Posicion
 {
     public $idPosicion;
     public $posicion;
     
     public function exchangeArray($data)
     {
         $this->idPosicion  = (!empty($data['id_posicion'])) ? $data['id_posicion'] : null;
         $this->posicion    = (!empty($data['posicion'])) ? $data['posicion'] : null;
     }
 }