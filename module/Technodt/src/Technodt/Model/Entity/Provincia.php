<?php

namespace Technodt\Model\Entity;

class Persona
 {
     public $idProvincia;
     public $nombre;

     public function exchangeArray($data)
     {
         $this->idProvincia                    = (!empty($data['id_provincia'])) ? $data['id_provincia'] : null;
         $this->nombre                      = (!empty($data['nombre'])) ? $data['nombre'] : null;
     }
 }