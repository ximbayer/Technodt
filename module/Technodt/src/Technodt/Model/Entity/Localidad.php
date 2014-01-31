<?php

namespace Technodt\Model\Entity;

class Localidad
 {
     public $idLocalidad;
     public $nombre;
     public $provinciaIdProvincia;

     public function exchangeArray($data)
     {
         $this->idLocalidad = (!empty($data['id_localidad'])) ? $data['id_localidad'] : null;
         $this->nombre = (!empty($data['nombre'])) ? $data['nombre'] : null;
         $this->provinciaIdProvincia = (!empty($data['provincia_id_provincia'])) ? $data['provincia_id_provincia'] : null;
     }
 }