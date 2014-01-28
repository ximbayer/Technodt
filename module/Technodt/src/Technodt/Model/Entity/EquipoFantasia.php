<?php

namespace Technodt\Model\Entity;

class EquipoFantasia
 {
     public $idEquipoFantasia;
     public $nombre;
     public $totalCalificacion;
     public $costoEquipo;
     public $usuarioPersonaIdPersona;
     public $usuarioPersonaDocumento;
     public $usuarioPersonaTipoDocumentoIdTipoDocumento;
     public $usuarioTipoUsuarioIdTipoUsuario;

     public function exchangeArray($data)
     {
         $this->idEquipoFantasia = (!empty($data['id_equipo_fantasia'])) ? $data['id_equipo_fantasia'] : null;
         $this->nombre = (!empty($data['nombre'])) ? $data['nombre'] : null;
         $this->costoEquipo = (!empty($data['costo_equipo'])) ? $data['costo_equipo'] : null;
         $this->usuarioPersonaIdPersona = (!empty($data['usuario_persona_id_persona'])) ? $data['usuario_persona_id_persona'] : null;
         $this->usuarioPersonaDocumento = (!empty($data['usuario_persona_documento'])) ? $data['usuario_persona_documento'] : null;
         $this->usuarioPersonaTipoDocumentoIdTipoDocumento = (!empty($data['usuario_persona_tipo_documento_id_tipo_documento'])) ? $data['usuario_persona_tipo_documento_id_tipo_documento'] : null;
         $this->usuarioTipoUsuarioIdTipoUsuario = (!empty($data['usuario_tipo_usuario_id_tipo_usuario'])) ? $data['usuario_tipo_usuario_id_tipo_usuario'] : null;
     }
 }