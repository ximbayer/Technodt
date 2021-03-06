<?php
namespace Technodt\Model\DAO;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\TableGateway\AbstractTableGateway;
 use Zend\Db\TableGateway\Feature; 
 use Zend\Db\Sql\Sql;
 use Zend\Db\Adapter\Adapter;

 class DAOUsuarios
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

     public function getUsuario($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('persona_id_persona' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
	}

	public function getNombreUsuario($id)
	{
	/*$select = $this->tableGateway->getSql()->select()
		                  ->join('persona', 'usuario.persona_id_persona=persona.id_persona')
                          ->where('usuario.persona_id_persona = ?', $id);*/
        
        $adapter=$this->tableGateway->getAdapter();
        $tablePersona = new TableGateway('persona', $adapter, new Feature\RowGatewayFeature('id_persona'));
        $results = $tablePersona->select(array('id_persona' => $id));
        $persona = $results->current();
        return $persona;
	}
     
     public function getUsuarioByDocumento($documento)
     {
         $documento  = (int) $documento;
         $rowset = $this->tableGateway->select(array('persona_documento' => $documento));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $documento");
         }
         return $row;
     }

     public function saveUsuario(Usuario $usuario)
     {
         $data = array(
         'persona_id_persona' => $this->personaIdPersona,
         'persona_documento' => $this->personaDocumento,
         'persona_tipo_documento_id_tipo_documento' => $this->personaTipoDocumentoIdTipoDocumento,
         'tipo_usuario_id_tipo_usuario' => $this->tipoUsuarioIdTipoUsuario,
         'email' => $this->email,
         'password' => $this->password,
         );

         $id = (int) $usuario->personaIdPersona;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getUsuario($id)) {
                 $this->tableGateway->update($data, array('persona_id_persona' => $id));
             } else {
                 throw new \Exception('Usuario id does not exist');
             }
         }
     }

     public function deleteUsuario($id)
     {
         $this->tableGateway->delete(array('persona_id_persona' => (int) $id));
     }
 }