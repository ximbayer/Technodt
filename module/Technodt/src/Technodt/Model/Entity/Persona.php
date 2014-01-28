<?php

namespace Technodt\Model\Entity;

class Persona
 {
     public $idPersona;
     public $documento;
     public $tipoDocumentoIdTipoDocumento;
     public $nombres;
     public $apellido;
     public $sexo;
     public $localidadIdLocalidad;
     public $direccionIdDireccion;

     public function exchangeArray($data)
     {
         $this->idPersona                    = (!empty($data['id_persona'])) ? $data['id_persona'] : null;
         $this->documento                    = (!empty($data['documento'])) ? $data['documento'] : null;
         $this->tipoDocumentoIdTipoDocumento = (!empty($data['tipo_documento_id_tipo_documento'])) ? $data['tipo_documento_id_tipo_documento'] : null;
         $this->nombres                      = (!empty($data['nombres'])) ? $data['nombres'] : null;
         $this->apellido                     = (!empty($data['apellido'])) ? $data['apellido'] : null;
         $this->sexo                         = (!empty($data['sexo'])) ? $data['sexo'] : null;
         $this->localidadIdLocalidad         = (!empty($data['localidad_id_localidad'])) ? $data['localidad_id_localidad'] : null;
         $this->direccionIdDireccion         = (!empty($data['direccion_id_direccion'])) ? $data['direccion_id_direccion'] : null;
     }
 }