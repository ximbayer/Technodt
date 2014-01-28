<?php

namespace Technodt\Model\Entity;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

 class Log implements InputFilterAwareInterface
 {
     public $idLog;
     public $fecha;
     public $hora;
     public $tipoLogIdTipoLog;
     public $usuarioPersonaIdPersona;
     public $usuarioPersonaDocumento;
     public $usuarioPersonaTipoDocumentoIdTipoDocumento;
     public $usuarioTipoUsuarioIdTipoUsuario;
     
     protected $inputFilter;  

     public function exchangeArray($data)
     {
         $this->idLog                                       = (!empty($data['id_log'])) ? $data['id_log'] : null;
         $this->fecha                                       = (!empty($data['fecha'])) ? $data['fecha'] : null;
         $this->hora                                        = (!empty($data['hora'])) ? $data['hora'] : null;
         $this->tipoLogIdTipoLog                            = (!empty($data['tipo_log_id_tipo_log'])) ? $data['tipo_log_id_tipo_log'] : null;
         $this->usuarioPersonaIdPersona                     = (!empty($data['usuario_persona_id_persona'])) ? $data['usuario_persona_id_persona'] : null;
         $this->usuarioPersonaDocumento                     = (!empty($data['usuario_persona_documento'])) ? $data['usuario_persona_documento'] : null;
         $this->usuarioPersonaTipoDocumentoIdTipoDocumento  = (!empty($data['usuario_persona_tipo_documento_id_tipo_documento'])) ? $data['usuario_persona_tipo_documento_id_tipo_documento'] : null;
         $this->usuarioTipoUsuarioIdTipoUsuario             = (!empty($data['usuario_tipo_usuario_id_tipo_usuario'])) ? $data['usuario_tipo_usuario_id_tipo_usuario'] : null;
     }
     
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'tipo_documento',
                 'required' => true,
             ));

             $inputFilter->add(array(
                 'name'     => 'documento',
                 'required' => true,
                 'validators'  => array(
                     array(
                         'name'    => 'Int',
                         ),
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 7,
                             'max'      => 8,
                         ),
                     ),
                 ),  
             ));

             $inputFilter->add(array(
                 'name'     => 'password',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }

