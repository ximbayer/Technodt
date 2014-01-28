<?php
namespace Album\Model\DAO;

 use Zend\Db\TableGateway\TableGateway; 

 class DAOEquiposFantasia
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

     public function getEquipoFantasia($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_equipo_fantasia' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveEquipoFantasia(EquipoFantasia $equipoFantasia)
     {
         $data = array(
         'id_equipo_fantasia' => $this->idEquipoFantasia,
         'nombre' => $this->nombre,
         'costo_equipo' => $this->costoEquipo,
         'usuario_persona_id_persona' => $this->usuarioPersonaIdPersona,
         'usuario_persona_documento' => $this->usuarioPersonaDocumento,
         'usuario_persona_tipo_documento_id_tipo_documento' => $this->usuarioPersonaTipoDocumentoIdTipoDocumento,
         'usuario_tipo_usuario_id_tipo_usuario' => $this->usuarioTipoUsuarioIdTipoUsuario,
         );

         $id = (int) $log->idEquipoFantasia;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getEquipoFantasia($id)) {
                 $this->tableGateway->update($data, array('id_equipo_fantasia' => $id));
             } else {
                 throw new \Exception('EquipoFantasia id does not exist');
             }
         }
     }

     public function deleteLog($id)
     {
         $this->tableGateway->delete(array('id_equipo_fantasia' => (int) $id));
     }
 }