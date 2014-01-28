<?php

namespace Technodt\Model\Entity;

class TipoLog
 {
     public $idTipoLog;
     public $descripcion;

     public function exchangeArray($data)
     {
         $this->idTipoLog = (!empty($data['id_tipo_log'])) ? $data['id_tipo_log'] : null;
         $this->descripcion            = (!empty($data['descripcion'])) ? $data['descripcion'] : null;
     }
 }