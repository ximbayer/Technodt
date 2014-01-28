<?php

namespace Technodt\Model\Entity;

class TipoUsuario
 {
     public $personaIdPersona;
     public $personaDocumento;
     public $personaTipoDocumentoIdTipoDocumento;
     public $tipoUsuarioIdTipoUsuario;
     public $email;
     public $password;

     public function exchangeArray($data)
     {
         $this->personaIdPersona                    = (!empty($data['persona_id_persona'])) ? $data['persona_id_persona'] : null;
         $this->personaDocumento                    = (!empty($data['persona_documento'])) ? $data['persona_documento'] : null;
         $this->personaTipoDocumentoIdTipoDocumento = (!empty($data['persona_tipo_documento_id_tipo_documento'])) ? $data['persona_tipo_documento_id_tipo_documento'] : null;
         $this->tipoUsuarioIdTipoUsuario            = (!empty($data['tipo_usuario_id_tipo_usuario'])) ? $data['tipo_usuario_id_tipo_usuario'] : null;
         $this->email                               = (!empty($data['email'])) ? $data['email'] : null;
         $this->password                            = (!empty($data['password'])) ? $data['password'] : null;
     }
 }