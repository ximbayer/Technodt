<?php

namespace Technodt\Model\Entity;

class TipoDocumento
 {
     public $idTipoDocumento;
     public $tipo;

     public function exchangeArray($data)
     {
         $this->idTipoDocumento = (!empty($data['id_tipo_documento'])) ? $data['id_tipo_documento'] : null;
         $this->tipo            = (!empty($data['tipo'])) ? $data['tipo'] : null;
     }
 }