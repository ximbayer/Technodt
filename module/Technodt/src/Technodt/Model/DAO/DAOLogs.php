<?php
namespace Technodt\Model\DAO;

use Zend\Db\TableGateway\TableGateway; 
use Technodt\Model\Entity\Log;
 class DAOLogs
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getLog($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_log' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveLog(Log $log)
     {
         $data = array(
            'fecha'                                            => $log->fecha,
            'hora'                                             => $log->hora,
            'tipo_log_id_tipo_log'                             => $log->tipoLogIdTipoLog,
            'usuario_persona_id_persona'                       => $log->usuarioPersonaIdPersona,
            'usuario_persona_documento'                        => $log->usuarioPersonaDocumento,
            'usuario_persona_tipo_documento_id_tipo_documento' => $log->usuarioPersonaTipoDocumentoIdTipoDocumento,
            'usuario_tipo_usuario_id_tipo_usuario'             => $log->usuarioTipoUsuarioIdTipoUsuario,
         );

         $id = (int) $log->idLog;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getLog($id)) {
                 $this->tableGateway->update($data, array('id_log' => $id));
             } else {
                 throw new \Exception('Log id does not exist');
             }
         }
     }

     public function deleteLog($id)
     {
         $this->tableGateway->delete(array('id_log' => (int) $id));
     }
 }