<?php

namespace Technodt\Model\Entity;

class TipoUsuario
 {
     public $idTipoUsuario;
     public $tipo;

     public function exchangeArray($data)
     {
         $this->idTipoUsuario = (!empty($data['id_tipo_usuario'])) ? $data['id_tipo_usuario'] : null;
         $this->tipo            = (!empty($data['tipo'])) ? $data['tipo'] : null;
     }
 }